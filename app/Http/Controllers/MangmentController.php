<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Employee;
use App\Models\Device;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MangmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }





    public function usersMang()
    {
        $users=User::all();

        return view('mangement.userMang',compact('users')) ;
    }
    public function employeesMang()
    {
        $employees = Employee::all();

        return view('mangement.employeesMang',compact('employees')) ;
    }
    public function devicesMang()
    {
        $devices = Device::all();

        return view('mangement.devicesMang',compact('devices')) ;
    }

    public function updateUser(Request $request , $user_slug)
    {
        $user=User::where('user_slug',$user_slug)->first();

        $employee = Employee::where('employee_name',$user->name)->first();
        $text=$request->name;
        if ( $request->user_speciality == 'طبيب تخدير') {
            $photo ='assets/img/2.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->user_speciality == 'طبيب جراح') {
            $photo ='assets/img/1.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->user_speciality == 'مساعد جراح') {
            $photo ='assets/img/4.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ.", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->user_speciality == 'فني تخدير') {
            $photo ='assets/img/5.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->user_speciality == 'إداري') {
            $photo ='assets/img/6.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", 'أ. ', $text);
            }else{
                $newText ='أ. '.$text ;
            }
        } else {
            $photo ='assets/img/5.jpg';
            $newText = $text ;
        }
        if (strstr($text, "أنسة") == true) {
            $photo = 'assets/img/9.jpg';
            $newText = str_replace("أنسة", "", $text);
        }
        // dd( $photo);
        $user->name = $newText ;
        $employee->employee_name = $newText ;
        $user->username = $request->username ;
        $user->user_speciality = $request->user_speciality ;
        $employee->employee_speciality = $request->user_speciality ;
        if ($photo) {
            $user->user_image = $photo ;
            $employee->employee_image = $photo ;
        }
        $user->grade = $request->grade ;
        $user->bio = $request->bio ;
        $employee->employee_bio = $request->bio ;
        if ($request->password) {
            $user->password = Hash::make($request->password) ;
        }
        $user->save();
        $employee->save();


        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح التعديل',
            'AlertMessage'=>' تم تعديل حساب المستخدم '.$user->name,
            'alert_type_A'   =>'info',
        ]);


    }

    public function destroyUser($user_slug)
    {
        $user = User::where('user_slug',$user_slug)->first();
        $employee = Employee::where('employee_name',$user->name)->first();
        $name = $user->name ;
        $username = $user->username ;
        $employee->delete();
        $user->delete();
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح الحذف',
            'AlertMessage'=>' تم حذف حساب المستخدم '.$name.' , اسم الحساب '.$username,
            'alert_type_A'   =>'danger',
        ]);
    }

    // --------------Employee ----------------------


    public function storeEmployee(Request $request)
    {
        $this->validate($request,[
            'employee_name' => 'required',
            // 'employee_image'=> 'nullable',
            'employee_bio'=> 'nullable',
            'employee_speciality'=> 'required',
        ]);
        $text = $request->employee_name;
        if ( $request->employee_speciality == 'طبيب تخدير') {
            $photo ='assets/img/2.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->employee_speciality == 'طبيب جراح') {
            $photo ='assets/img/1.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->employee_speciality == 'مساعد جراح') {
            $photo ='assets/img/4.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ.", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->employee_speciality == 'فني تخدير') {
            $photo ='assets/img/5.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->employee_speciality == 'إداري') {
            $photo ='assets/img/6.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", 'أ. ', $text);
            }else{
                $newText ='أ. '.$text ;
            }
        } else {
            $photo ='assets/img/5.jpg';
            $newText = $text ;
        }
        if (strstr($text, "أنسة") == true) {
            $photo = 'assets/img/9.jpg';
            $newText = str_replace("أنسة", "", $text);
        }


        $employee = Employee::create([
            'employee_slug' => Str::uuid()->toString(),
            'employee_name' => $newText,
            'employee_image'=> $photo ,
            'employee_bio'  =>  $request->employee_bio,
            'employee_speciality'=> $request->employee_speciality,
        ]);
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح',
            'AlertMessage'=>'تم إضافة ملف الموظف '.$newText.' بنجاح ',
            'alert_type_A'   =>'success',
        ]);
    }

    public function updateEmployee(Request $request , $employee_slug)
    {
        $employee = Employee::where('employee_slug',$employee_slug)->first();
        $user = User::where('name',$employee->employee_name)->first();
        $photo= null;

        $text = $request->employee_name;

        if ( $request->employee_speciality == 'طبيب تخدير') {
            $photo ='assets/img/2.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->employee_speciality == 'طبيب جراح') {
            $photo ='assets/img/1.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $request->employee_speciality == 'مساعد جراح') {
            $photo ='assets/img/4.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ.", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->employee_speciality == 'فني تخدير') {
            $photo ='assets/img/5.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $request->employee_speciality == 'إداري') {
            $photo ='assets/img/6.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", 'أ. ', $text);
            }else{
                $newText ='أ. '.$text ;
            }
        } else {
            $photo ='assets/img/5.jpg';
            $newText = $text ;
        }
        if (strstr($text, "أنسة") == true) {
            $photo = 'assets/img/9.jpg';
            $newText = str_replace("أنسة", "", $text);
        }

        if ($photo) {
            $employee->employee_image = $photo ;
            if ($user) {
                $user->user_image = $photo ;
                $user->save();
            }
        }
        $employee->employee_name = $newText ;
        $employee->employee_bio = $request->employee_bio ;
        if ($user) {
            $user->name = $newText ;
            $user->bio = $request->employee_bio ;
            $user->user_speciality = $request->employee_speciality ;
            $user->save();
        }
        $employee->employee_speciality = $request->employee_speciality ;
        $employee->save();


        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح التعديل',
            'AlertMessage'=>' تم تعديل ملف الموظف '.$employee->employee_name,
            'alert_type_A'   =>'info',
        ]);


    }

    public function destroyEmployee($employee_slug)
    {
        $employee = Employee::where('employee_slug',$employee_slug)->first();
        $user = User::where('name',$employee->employee_name)->first();
        $name = $employee->employee_name ;
        $user->delete();
        $employee->delete();
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح الحذف',
            'AlertMessage'=>' تم حذف ملف الموظف '.$name.' بشكل نهائي',
            'alert_type_A'   =>'danger',
        ]);
    }
    public function createAccount(Request $request , $employee_slug)
    {
        $this->validate($request,[
            'username' => 'required',
            'grade'=> 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $employee = Employee::where('employee_slug',$employee_slug)->first();

        $user =User::create([
            'name' =>$employee->employee_name ,
            'username' => $request->username ,
            'user_speciality' => $employee->employee_speciality ,
            'user_slug' => Str::uuid()->toString(),
            'grade' => $request->grade ,
            'user_image' => $employee->employee_image,
            'bio' => $employee->employee_bio,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح',
            'AlertMessage'=>'تم إنشاء حساب للموظف '.$employee->employee_name.' بنجاح ',
            'alert_type_A'   =>'success',
        ]);
    }
    // --------------Employee ----------------------

    // --------------Devices ----------------------


    public function storeDevice(Request $request)
    {
        $this->validate($request,[
            'device_name' => 'required',
            'device_number'=> 'required',
            'device_info'=> 'nullable',
        ]);
        $photo='';
        if ($request->device_name == 'قوسي') {
            $photo = 'assets/img/device2.jpg';
        } elseif ($request->device_name == 'تنظير') {
            $photo = 'assets/img/device1.jpg';
        } elseif ($request->device_name == 'ضاغط الدم') {
            $photo = 'assets/img/device3.jpg';
        }




        $device = Device::create([
            'device_slug' => Str::uuid()->toString(),
            'device_name'  =>  $request->device_name,
            'device_number'=> $request->device_number,
            'device_image'=> $photo,
            'device_info'=> $request->device_info,
            'device_status'=> 1,
        ]);
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح',
            'AlertMessage'=>'تم إضافة جهاز '.$device->device_name.' بنجاح ',
            'alert_type_A'   =>'success',
        ]);
    }

    public function updateDevice(Request $request , $device_slug)
    {
        $device=Device::where('device_slug',$device_slug)->first();

        $device->device_name = $request->device_name ;
        $device->device_number = $request->device_number ;
        $device->device_info = $request->device_info ;
        $device->device_status = $request->device_status ;
        $device->save();


        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح التعديل',
            'AlertMessage'=>' تم تعديل معلومات جهاز ال'.$device->device_name.' بنجاح',
            'alert_type_A'   =>'info',
        ]);


    }

    public function destroyDevice($device_slug)
    {
        $device=Device::where('device_slug',$device_slug)->first();
        $name = $device->device_name ;
        $device->delete();
        return redirect()->back()->with([
            'MainAlertMessage'=>'نجح الحذف',
            'AlertMessage'=>' تم حذف جهاز ال'.$name.' بشكل نهائي',
            'alert_type_A'   =>'danger',
        ]);
    }

    // --------------Devices ----------------------

}
