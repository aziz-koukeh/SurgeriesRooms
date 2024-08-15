<?php

namespace App\Http\Controllers;

use App\Models\Surgery;
use App\Models\Employee;
use App\Models\Device;
use App\Models\SurgeryDevices;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function surgeryTime()
    {
        $surgerys=Surgery::all();
        foreach ($surgerys as $surgery) {

            $surgeryTerm = Carbon::parse($surgery->surgery_time)->format('H').Carbon::parse($surgery->surgery_time)->format(':59:59');
            $surgery->surgery_term= $surgeryTerm;
            $surgery->save();

        }
        return redirect()->back();
    }

    public function index()
    {

        $surgeries = Surgery::whereDate('surgery_time',date('Y-m-d'))->get();
        $date=Carbon::today();

        $employees1=Employee::where('employee_speciality','مساعد جراح')->get();
        $employees2=Employee::where('employee_speciality','فني تخدير')->get();
        $devices1=Device::where('device_name','قوسي')->count();
        $devices2=Device::where('device_name','تنظير')->count();
        $devices3=Device::where('device_name','ضاغط الدم')->count();

        return view('home', compact('surgeries','date','employees1','employees2','devices1','devices2','devices3'));
    }


    public function surgeriesByDateRouteing(Request $request)
    {
        $date=Carbon::parse($request->date)->format('d-m-Y');
        return redirect()->route('surgeriesByDate', $date);
    }
    public function surgeriesByDate($date)
    {
        $date= Carbon::parse($date);
        if (Auth::check()) {
            $surgeries = Surgery::whereDate('surgery_time',Carbon::parse($date)->format('Y-m-d'))->get();

            $employees1=Employee::where('employee_speciality','مساعد جراح')->get();
            $employees2=Employee::where('employee_speciality','فني تخدير')->get();
            $devices1=Device::where('device_name','قوسي')->count();
            $devices2=Device::where('device_name','تنظير')->count();
            $devices3=Device::where('device_name','ضاغط الدم')->count();


            return view('surgeries.surgeryByDate', compact('surgeries','date','employees1','employees2','devices1','devices2','devices3'));
        }else{
            $min= Carbon::today()->subDay() ;
            $max= Carbon::today()->addDay() ;
            $day =Carbon::parse($date);
            if ($day >= $min    && $day <= $max ) {
                $surgeries = Surgery::whereDate('surgery_time',Carbon::parse($date)->format('Y-m-d'))
                ->get();
                // dd($surgeries);
                return view('surgeries.surgeryByDate', compact('surgeries','date'));
            } else {
                return redirect('/')->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' لا يمكن الوصول إلى هذا الجدول .',
                    'alert_type_A'   =>'danger',
                ]);

            }
        }
        // $date= Carbon::parse($date);
        // $surgeries = Surgery::whereDay('surgery_time',Carbon::parse($date)->format('d'))
        // ->get();
        // // dd($surgeries);

        // return view('surgeries.surgeryByDate', compact('surgeries','date'));
    }

    public function create()
    {
        $employees1=Employee::where('employee_speciality','مساعد جراح')->get();
        $employees2=Employee::where('employee_speciality','فني تخدير')->get();
        $devices1=Device::where('device_name','قوسي')->count();
        $devices2=Device::where('device_name','تنظير')->count();
        $devices3=Device::where('device_name','ضاغط الدم')->count();

        return view('surgeries.createSurgery', compact('employees1','employees2','devices1','devices2','devices3')) ;
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'surgery_name' => 'required',
            'doctor_name'=> 'required',
            'surgery_room'=> 'required',
            'surgery_time'=> 'required',
            'surgery_term'=> 'nullable|numeric',
            'surgery_info'=> 'nullable',
        ]);

    // ---- Create End SurgeryTime --------------
        $surgeryTime = Carbon::parse($request->surgery_time);
        if ($request->surgery_term == null || $request->surgery_term == '1' ) {
            $surgery_term = 1;
        }else{
            $surgery_term = (integer)$request->surgery_term ;
        }
        $endTime= ($surgeryTime->format('H')+$surgery_term -1). $surgeryTime->format(':59:59');
        $endTimeCheck =$surgeryTime->format('H')+$surgery_term -1;
        if ($endTimeCheck > 23) {
            $endTime= '23' . $surgeryTime->format(':59:59');
        }
    // ---- Create End SurgeryTime --------------

    // ---- Check Devices --------------
        $surgeryDevices=[];
        if ($request->surgery_device) {   // تفحص  أصناف الأجهزة المطلوبة
            // صناعة خانات فارغة في القائمة بقيمة صفر
            for ($i = 0 ; $i >= count($request->surgery_device) ; ++$i ) {
                $surgeryDevices[$i] = 0;
            }
            // صناعة خانات فارغة في القائمة بقيمة صفر
            foreach ($request->surgery_device as $key => $device) {
                $i = $key;
                $findDevices=Device::where('device_name',$device)->where('device_status', 1)->get(); // الأستعلام في عن عدد الأجهزة من نفس الجهاز المطلوب
                // dd($findDevices);
                $continue=0 ; // متغير للتخطي في حال وجود جهاز شاغر
                foreach ($findDevices as $device) { // التأكد من كل جهاز من نفس النوع
                    if ($continue == 0) {
                        //    التأكد هل هذا الجهاز محجوز في نس الوقت المطلوب
                        $deviceCheckRangeIn = SurgeryDevices::where('device_id', $device->id)
                            ->whereTime('surgery_time', '<', $surgeryTime->format('H:00:00'))
                            ->whereTime('surgery_term', '>=', $endTime )
                            ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                            ->first();

                        if ($deviceCheckRangeIn) {
                                continue ;
                        }else{
                            $deviceCheckRangeOut = SurgeryDevices::where('device_id', $device->id)
                                ->whereTime('surgery_time', '>', $surgeryTime->format('H:00:00'))
                                ->whereTime('surgery_term', '<', $endTime )
                                ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                ->first();

                            if ($deviceCheckRangeOut) {
                                continue ;
                            }else{
                                $deviceCheckSameTime = SurgeryDevices::where('device_id', $device->id)
                                    ->whereTime('surgery_time', '>=', $surgeryTime->format('H:00:00'))
                                    ->whereTime('surgery_term', '>=', $endTime)
                                    ->whereTime('surgery_time', '<', $endTime)
                                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                    ->first();
                                if ($deviceCheckSameTime) {
                                    continue ;
                                }else{
                                    $deviceCheckSameTerm = SurgeryDevices::where('device_id', $device->id)
                                    ->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
                                    ->whereTime('surgery_term', '<', $endTime)
                                    ->whereTime('surgery_term', '>', $surgeryTime->format('H:00:00'))
                                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                    ->first();
                                    if ($deviceCheckSameTerm){
                                        continue ;
                                    }else{
                                        // في حال كان الجهاز ليس مستخدم يتم وضعه في قائمة الأجهزة المطلوبة
                                        $surgeryDevices[$i] =[
                                            'device_id' => $device->id ,
                                            'device_name' => $device->device_name,
                                            'surgery_time' => $request->surgery_time ,
                                            'surgery_term' => $endTime ,

                                        ];
                                        $continue= 1; // للتخطي إلى الجهاز التالي إذا كان هناك جهاز آخر مطلوب
                                    }

                                }
                            }
                        }
                    }
                }

            }

            if ( count($request->surgery_device) != count($surgeryDevices)) { // في حال فشل حجز الأجهزة
                return redirect()->back()->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' فشل حجز الأجهزة ',
                    'alert_type_A'   =>'danger',
                ]);
            }
        }

    // ---- Check Devices --------------

    // ---- Check surgery --------------

        $surgeryCheckRangeIn = Surgery::where('surgery_room', $request->surgery_room)
        ->whereTime('surgery_time', '<', $surgeryTime->format('H:00:00'))
        ->whereTime('surgery_term', '>=', $endTime )
        ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
        ->first();

        if ($surgeryCheckRangeIn) {

            return redirect()->back()->with([
                'MainAlertMessage'=>'فشل  !!',
                'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت لأنه ضمن وقت عملية '.$surgeryCheckRangeIn->surgery_name.' للطبيب '. $surgeryCheckRangeIn->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckRangeIn->surgery_time)->format('h:i a').' و تنتهي الساعة '. Carbon::parse($surgeryCheckRangeIn->surgery_term)->format('h:i a'),
                'alert_type_A'   =>'danger',
            ]);

        } else {

            $surgeryCheckRangeOut = Surgery::where('surgery_room', $request->surgery_room)
            ->whereTime('surgery_time', '>', $surgeryTime->format('H:00:00'))
            ->whereTime('surgery_term', '<', $endTime )
            ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
            ->first();

            if ($surgeryCheckRangeOut) {

                return redirect()->back()->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت لأنه يتضمن عملية '.$surgeryCheckRangeOut->surgery_name.' للطبيب '. $surgeryCheckRangeOut->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckRangeOut->surgery_time)->format('h:i a').' و تنتهي الساعة '. Carbon::parse($surgeryCheckRangeOut->surgery_term)->format('h:i a'),
                    'alert_type_A'   =>'danger',
                ]);

            } else {

                $surgeryCheckSameTime = Surgery::where('surgery_room', $request->surgery_room)
                ->whereTime('surgery_time', '>=', $surgeryTime->format('H:00:00'))
                ->whereTime('surgery_term', '>=', $endTime)
                ->whereTime('surgery_time', '<', $endTime)
                ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                ->first();

                if ($surgeryCheckSameTime ) {
                    return redirect()->back()->with([
                        'MainAlertMessage'=>'فشل  !!',
                        'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت بسبب وجود عملية '.$surgeryCheckSameTime->surgery_name.' للطبيب '. $surgeryCheckSameTime->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckSameTime->surgery_time)->format('h:i a'),
                        'alert_type_A'   =>'danger',
                    ]);

                } else {

                    $surgeryCheckSameTerm = Surgery::where('surgery_room', $request->surgery_room)
                    ->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
                    ->whereTime('surgery_term', '<', $endTime)
                    ->whereTime('surgery_term', '>', $surgeryTime->format('H:00:00'))
                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                    ->first();

                    if ($surgeryCheckSameTerm) {

                        return redirect()->back()->with([
                            'MainAlertMessage'=>'فشل  !!',
                            'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت بسبب وجود عملية '.$surgeryCheckSameTerm->surgery_name.' للطبيب '. $surgeryCheckSameTerm->doctor_name.' تنتهي الساعة '. Carbon::parse($surgeryCheckSameTerm->surgery_term)->format('h:i a'),
                            'alert_type_A'   =>'danger',
                        ]);

                    }else {
                        /// إذا كان الحجز متاح
                        $surgery = Surgery::create([
                            'surgery_slug' =>Str::uuid()->toString(),
                            'surgery_name' => $request->surgery_name ,
                            'doctor_name' => $request->doctor_name ,
                            'assistant_surgeon' => $request->assistant_surgeon ,
                            'anesthesia_technician' => $request->anesthesia_technician ,
                            'surgery_room' => $request->surgery_room ,
                            'surgery_time' => $request->surgery_time ,
                            'surgery_term' => $endTime ,
                            'surgery_info' => $request->surgery_info ,

                        ]);
                        if ($surgeryDevices != null ) {
                            foreach ($surgeryDevices as $surgeryDevice) {
                                SurgeryDevices::create([
                                    'surgery_id' => $surgery->id,
                                    'device_id' => $surgeryDevice['device_id'],
                                    'device_name' => $surgeryDevice['device_name'],
                                    'surgery_time' => $request->surgery_time,
                                    'surgery_term' => $endTime,
                                ]);
                            }
                        }

                        $roomName;
                        switch ($request->surgery_room) {
                            case 'room_1':
                                $roomName='غرفة عمليات 1';
                                break;
                            case 'room_2':
                                $roomName='غرفة عمليات 2';
                                break;
                            case 'room_3':
                                $roomName='غرفة عمليات 3';
                                break;
                            case 'room_b':
                                $roomName='غرفة العظمية';
                                break;
                            case 'room_h':
                                $roomName='غرفة القلبية';
                                break;
                        }
                        if ($surgery_term == 1 || $surgery_term >= 11) {
                            $hour=' ساعة ';
                            if ($surgery_term == 1) {
                                $surgery_term='';
                            }
                        }elseif ($surgery_term == 2 ) {
                            $hour=' ساعتين ';
                            $surgery_term = '';
                        }elseif ($surgery_term >= 3 &&  $surgery_term <= 10  ) {
                            $hour=' ساعات ';
                        }

                        return redirect()->back()->with([
                            'MainAlertMessage'=>'نجح',
                            'AlertMessage'=>' تم إضافة عملية '.$request->surgery_name. ' لطبيب '. $request->doctor_name . ' '.$roomName. ' الساعة :' .Carbon::parse($request->surgery_time)->format('h:i a') . ' لمدة '. $surgery_term . $hour,
                            'alert_type_A'   =>'success',
                        ]);
                    }
                }
            }
        }
    // ---- Check surgery --------------
    }

    public function edit($surgery_slug)
    {
        $employees1=Employee::where('employee_speciality','مساعد جراح')->get();
        $employees2=Employee::where('employee_speciality','فني تخدير')->get();
        $devices1=Device::where('device_name','قوسي')->count();
        $devices2=Device::where('device_name','تنظير')->count();
        $devices3=Device::where('device_name','ضاغط الدم')->count();
        $surgery = Surgery::where('surgery_slug',$surgery_slug)->first();
        return view('surgeries.editSurgery', compact('surgery','employees1','employees2','devices1','devices2','devices3')) ;
    }


    public function update(Request $request, $surgery_slug)
    {
        $this->validate($request,[
            'surgery_name' => 'required',
            'doctor_name'=> 'required',
            'surgery_room'=> 'required',
            'surgery_time'=> 'required',
            'surgery_term'=> 'required|numeric',
            'surgery_info'=> 'nullable',
        ]);

        $surgery = Surgery::where('surgery_slug',$surgery_slug)->first();

    // ---- Create End SurgeryTime --------------
        $surgeryTime = Carbon::parse($request->surgery_time);
        if ($request->surgery_term == null || $request->surgery_term == '1' ) {
            $surgery_term = 1;
        }else{
            $surgery_term = (integer)$request->surgery_term ;
        }
        $endTime= ($surgeryTime->format('H')+$surgery_term -1). $surgeryTime->format(':59:59');
        $endTimeCheck =$surgeryTime->format('H')+$surgery_term -1;
        if ($endTimeCheck > 23) {
            $endTime= '23' . $surgeryTime->format(':59:59');
        }
    // ---- Create End SurgeryTime --------------

    // ---- Check Devices --------------
        $surgeryDevices=[];
        if ($request->surgery_device) {   // تفحص  أصناف الأجهزة المطلوبة
            // صناعة خانات فارغة في القائمة بقيمة صفر
            for ($i = 0 ; $i >= count($request->surgery_device) ; ++$i ) {
                $surgeryDevices[$i] = 0;
            }
            // صناعة خانات فارغة في القائمة بقيمة صفر
            foreach ($request->surgery_device as $key => $device) {
                $i = $key;
                $findDevices=Device::where('device_name',$device)->where('device_status', 1)->get(); // الأستعلام في عن عدد الأجهزة من نفس الجهاز المطلوب
                // dd($findDevices);
                $continue=0 ; // متغير للتخطي في حال وجود جهاز شاغر
                foreach ($findDevices as $device) { // التأكد من كل جهاز من نفس النوع
                    if ($continue == 0) {
                        //    التأكد هل هذا الجهاز محجوز في نس الوقت المطلوب
                        $deviceCheckRangeIn = SurgeryDevices::where('device_id', $device->id)
                            ->whereTime('surgery_time', '<', $surgeryTime->format('H:00:00'))
                            ->whereTime('surgery_term', '>=', $endTime )
                            ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                            ->first();

                        if ($deviceCheckRangeIn && ($surgery->id != $deviceCheckRangeIn->surgery_id)) {
                                continue ;
                        }else{
                            $deviceCheckRangeOut = SurgeryDevices::where('device_id', $device->id)
                                ->whereTime('surgery_time', '>', $surgeryTime->format('H:00:00'))
                                ->whereTime('surgery_term', '<', $endTime )
                                ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                ->first();

                            if ($deviceCheckRangeOut && ($surgery->id != $deviceCheckRangeOut->surgery_id)) {
                                continue ;
                            }else{
                                $deviceCheckSameTime = SurgeryDevices::where('device_id', $device->id)
                                    ->whereTime('surgery_time', '>=', $surgeryTime->format('H:00:00'))
                                    ->whereTime('surgery_term', '>=', $endTime)
                                    ->whereTime('surgery_time', '<', $endTime)
                                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                    ->first();
                                if ($deviceCheckSameTime && ($surgery->id != $deviceCheckSameTime->surgery_id)) {
                                    continue ;
                                }else{
                                    $deviceCheckSameTerm = SurgeryDevices::where('device_id', $device->id)
                                    ->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
                                    ->whereTime('surgery_term', '<', $endTime)
                                    ->whereTime('surgery_term', '>', $surgeryTime->format('H:00:00'))
                                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                                    ->first();
                                    if ($deviceCheckSameTerm && ($surgery->id != $deviceCheckSameTerm->surgery_id)){
                                        continue ;
                                    }else{
                                        // في حال كان الجهاز ليس مستخدم يتم وضعه في قائمة الأجهزة المطلوبة
                                        $surgeryDevices[$i] =[
                                            'device_id' => $device->id ,
                                            'device_name' => $device->device_name,
                                            'surgery_time' => $request->surgery_time ,
                                            'surgery_term' => $endTime ,

                                        ];
                                        $continue= 1; // للتخطي إلى الجهاز التالي إذا كان هناك جهاز آخر مطلوب
                                    }

                                }
                            }
                        }
                    }
                }

            }

            if ( count($request->surgery_device) != count($surgeryDevices)) { // في حال فشل حجز الأجهزة
                return redirect()->back()->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' فشل حجز الأجهزة ',
                    'alert_type_A'   =>'danger',
                ]);
            }
        }

    // ---- Check Devices --------------

    // ---- Check surgery --------------

        $surgeryCheckRangeIn = Surgery::where('surgery_room', $request->surgery_room)
        ->whereTime('surgery_time', '<', $surgeryTime->format('H:00:00'))
        ->whereTime('surgery_term', '>=', $endTime )
        ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
        ->first();

        if ($surgeryCheckRangeIn && ($surgeryCheckRangeIn->surgery_slug != $surgery_slug)) {

            return redirect()->back()->with([
                'MainAlertMessage'=>'فشل  !!',
                'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت لأنه ضمن وقت عملية '.$surgeryCheckRangeIn->surgery_name.' للطبيب '. $surgeryCheckRangeIn->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckRangeIn->surgery_time)->format('h:i a').' و تنتهي الساعة '. Carbon::parse($surgeryCheckRangeIn->surgery_term)->format('h:i a'),
                'alert_type_A'   =>'danger',
            ]);

        } else {

            $surgeryCheckRangeOut = Surgery::where('surgery_room', $request->surgery_room)
            ->whereTime('surgery_time', '>', $surgeryTime->format('H:00:00'))
            ->whereTime('surgery_term', '<', $endTime )
            ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
            ->first();

            if ($surgeryCheckRangeOut && ($surgeryCheckRangeOut->surgery_slug != $surgery_slug)) {

                return redirect()->back()->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت لأنه يتضمن عملية '.$surgeryCheckRangeOut->surgery_name.' للطبيب '. $surgeryCheckRangeOut->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckRangeOut->surgery_time)->format('h:i a').' و تنتهي الساعة '. Carbon::parse($surgeryCheckRangeOut->surgery_term)->format('h:i a'),
                    'alert_type_A'   =>'danger',
                ]);

            } else {

                $surgeryCheckSameTime = Surgery::where('surgery_room', $request->surgery_room)
                ->whereTime('surgery_time', '>=', $surgeryTime->format('H:00:00'))
                ->whereTime('surgery_term', '>=', $endTime)
                ->whereTime('surgery_time', '<', $endTime)
                ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                ->first();

                if ($surgeryCheckSameTime && ($surgeryCheckSameTime->surgery_slug != $surgery_slug)) {
                    return redirect()->back()->with([
                        'MainAlertMessage'=>'فشل  !!',
                        'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت بسبب وجود عملية '.$surgeryCheckSameTime->surgery_name.' للطبيب '. $surgeryCheckSameTime->doctor_name.' تبدأ الساعة '. Carbon::parse($surgeryCheckSameTime->surgery_time)->format('h:i a'),
                        'alert_type_A'   =>'danger',
                    ]);

                } else {

                    $surgeryCheckSameTerm = Surgery::where('surgery_room', $request->surgery_room)
                    ->whereTime('surgery_time', '<=', $surgeryTime->format('H:00:00'))
                    ->whereTime('surgery_term', '<', $endTime)
                    ->whereTime('surgery_term', '>', $surgeryTime->format('H:00:00'))
                    ->whereDate('surgery_time', $surgeryTime->format('Y-m-d'))
                    ->first();

                    if ($surgeryCheckSameTerm && ($surgeryCheckSameTerm->surgery_slug != $surgery_slug)) {

                        return redirect()->back()->with([
                            'MainAlertMessage'=>'فشل  !!',
                            'AlertMessage'=>' لا يمكن حجز العملية بهذا التوقيت بسبب وجود عملية '.$surgeryCheckSameTerm->surgery_name.' للطبيب '. $surgeryCheckSameTerm->doctor_name.' تنتهي الساعة '. Carbon::parse($surgeryCheckSameTerm->surgery_term)->format('h:i a'),
                            'alert_type_A'   =>'danger',
                        ]);

                    }else {
                        /// إذا كان الحجز متاح
                        $surgery->surgery_name = $request->surgery_name;
                        $surgery->doctor_name = $request->doctor_name;
                        $surgery->assistant_surgeon = $request->assistant_surgeon;
                        $surgery->anesthesia_technician = $request->anesthesia_technician;
                        $surgery->surgery_room = $request->surgery_room;
                        $surgery->surgery_time = $request->surgery_time;
                        $surgery->surgery_term = $endTime;
                        $surgery->surgery_info = $request->surgery_info;
                        $surgery->save();
                        $date=Carbon::parse($request->surgery_time)->format('d-m-Y');
                        // حذف الحجز القديم للأجهزة
                        $oldsurgeryDevices = SurgeryDevices::where('surgery_id',$surgery->id)->get();
                        foreach ($oldsurgeryDevices as $oldsurgery) {
                            $oldsurgery->delete();
                        }
                        if ($surgeryDevices != null ) {
                            foreach ($surgeryDevices as $surgeryDevice) {
                                SurgeryDevices::create([
                                    'surgery_id' => $surgery->id,
                                    'device_id' => $surgeryDevice['device_id'],
                                    'device_name' => $surgeryDevice['device_name'],
                                    'surgery_time' => $request->surgery_time,
                                    'surgery_term' => $endTime,
                                ]);
                            }
                        }
                        // dd($surgeryDevices);
                        return redirect()->route('surgeriesByDate', $date)->with([
                            'MainAlertMessage'=>'نجح',
                            'AlertMessage'=>' نجحت عملية التعديل .',
                            'alert_type_A'   =>'success',
                        ]);
                    }
                }
            }
        }
    // ---- Check surgery --------------

    }


    public function destroy($surgery_slug)
    {
        $surgery = Surgery::where('surgery_slug',$surgery_slug)->first();
        $surgery_name= $surgery->surgery_name;
        $doctor_name= $surgery->doctor_name;
        $surgery->delete();
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح',
            'AlertMessage'=>' تم حذف عملية '.$surgery_name. ' لطبيب '. $doctor_name ,
            'alert_type_A'   =>'success',
        ]);
    }


}
