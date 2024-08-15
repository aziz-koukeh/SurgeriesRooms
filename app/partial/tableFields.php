<?php
namespace App\partial;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Auth;

use App\Models\Employee;
use App\Models\Device;

class tableFields
{

    public function fields($myArrayFeild)
    {
        $current_page =Route::currentRouteName();
        if ($myArrayFeild) {
            $fieldContant='';
            $fieldContant.= '
            <div class="btn-group dropend" style="display: block;">
                <a type="button" class="text-dark w-100 /*bg-light py-0 px-1 rounded-circle btn-circle shadow-sm*/" style="text-decoration: unset"  data-bs-toggle="dropdown" aria-expanded="false">
                    <p class="text-xs mb-0 d-inline-flex" >'.$myArrayFeild->surgery_name.'</p>
                    <hr class="divider divider-dark my-0 py-0 w-100">
                    <span class="text-xs" >'.$myArrayFeild->doctor_name.'</span>
                    <hr class="divider divider-dark my-0 w-100">
                    <p class="text-xs mb-0 d-inline-flex" style="text-align: center;direction: ltr" >'.Carbon::parse($myArrayFeild->surgery_time)->format('h:ia').' - '.Carbon::parse($myArrayFeild->surgery_term)->format('h:ia').'</p>
                    <hr class="divider divider-dark my-0 w-100">
                    ';
                    if ($myArrayFeild->assistant_surgeon) {
                        $fieldContant.= '
                        <span class="badge bg-info p-2">
                            <i class="fa-solid fa-user fa-lg"></i>
                        </span>
                        ';
                    }
                    if ($myArrayFeild->anesthesia_technician) {
                        $fieldContant.= '
                        <span class="badge bg-success p-2">
                            <i class="fa-solid fa-user fa-lg"></i>
                        </span>
                        ';
                    }
                    foreach ($myArrayFeild->SurgeryDevices as $item){
                        if ($item->device_name == 'قوسي') {
                            $fieldContant.= '
                            <span class="badge bg-danger p-2">
                                <i class="fa-solid fa-magnet fa-rotate-90 fa-lg"></i>
                            </span>
                            ';
                        } elseif ($item->device_name == 'تنظير') {
                            $fieldContant.= '
                            <span class="badge bg-dark p-2">
                            <i class="fa-solid fa-desktop fa-lg"></i>
                            </span>
                            ';
                        } elseif ($item->device_name == 'ضاغط الدم') {
                            $fieldContant.= '
                            <span class="badge bg-warning p-2">
                            <i class="fa-solid fa-weight-scale fa-lg"></i>
                            </span>
                            ';
                        }

                    }






                    $fieldContant.= '
                </a>
                <ul class="dropdown-menu" style="text-align:right">
                ';

                    if ($myArrayFeild->assistant_surgeon){
                        $fieldContant.= '
                        <li><a class="dropdown-item text-xs"  type="button">- المساعد: '.$myArrayFeild->assistant_surgeon.'</a></li>
                        ';
                    }
                    if ($myArrayFeild->anesthesia_technician){
                        $fieldContant.= '
                        <li><a class="dropdown-item text-xs"  type="button">- الفني: '.$myArrayFeild->anesthesia_technician.'</a></li>
                        ';
                    }
                    if  ($myArrayFeild->SurgeryDevices){
                        $space = '<li><a class="dropdown-item text-xs"  type="button">- الأجهزة: ';
                        foreach ($myArrayFeild->SurgeryDevices as $item){
                            $fieldContant.= $space. $item->device_name ;
                            $space = ' - ';
                        }

                        $fieldContant.= '</a></li>   ';
                    }
                    if ($myArrayFeild->surgery_info){
                    $fieldContant.= '
                    <p class="text-xs text-center p-0 m-0"  type="button">ملاحظات:</p>
                    <li><a class="dropdown-item text-xs"  type="button">'.$myArrayFeild->surgery_info.'</a></li>
                    ';
                    }
                    if (Auth::check()) {
                        if ((Auth::user()->grade != 'user' || Auth::guest()) && $current_page != 'showSurgeries' ) {
                            $fieldContant.='
                            <hr class="divider divider-info my-1 w-100" />
                            <li class=" d-inline-flex w-100 text-center " style="justify-content:space-between"><a class="dropdown-item text-xs " style="float:right" href='.route('editSurgery',$myArrayFeild->surgery_slug).' type="button"><i class="fa-regular text-info fa-pen-to-square fa-lg  rounded-circle btn-circle shadow-sm"></i></a>
                            <a class="dropdown-item text-xs" style="float:left"  data-bs-toggle="modal" data-bs-target="#deletemyArrayFeild'.$myArrayFeild->surgery_slug.'" type="button"><i class="fa-solid text-danger fa-trash fa-lg  rounded-circle btn-circle shadow-sm"></i></a></li>
                            ';
                        }
                    }
                $fieldContant.= '
                </ul>
            </div>';
            if (Auth::check()) {
                if ((auth()->user()->grade != 'user' || Auth::guest())&& $current_page != 'showSurgeries' ) {
                    $fieldContant.='

                    <!-- Modal -->
                    <div class="modal fade" id="deletemyArrayFeild'.$myArrayFeild->surgery_slug.'" style="direction: ltr" tabindex="-1" aria-labelledby="deletemyArrayFeildLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body py-5 ">
                            <p style="text-align:center;direction:rtl">هل أنت متأكد من حذف عملية '.$myArrayFeild->surgery_name.' للطبيب '.$myArrayFeild->doctor_name.' ؟؟</p>
                            </div>
                            <div class="modal-footer py-1">
                                <a href="'.route('deleteSurgery',$myArrayFeild->surgery_slug).'" type="button" class="btn btn-danger">تأكيد</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    ';
                }
            }

        }


        return $fieldContant;
    }
    public function addfield( $row, $Feild , $date  )
    {
        $employees1=Employee::where('employee_speciality','مساعد جراح')->get();
        $employees2=Employee::where('employee_speciality','فني تخدير')->get();
        $devices1=Device::where('device_name','قوسي')->count();
        $devices2=Device::where('device_name','تنظير')->count();
        $devices3=Device::where('device_name','ضاغط الدم')->count();

        $current_page =Route::currentRouteName();
        $bladeForm='';
        if ($date->format('Y-m-d') >= Carbon::today()->format('Y-m-d')) {
            if (Auth::check()) {
                if ((Auth::user()->grade != 'user' || Auth::guest()) && $current_page != 'showSurgeries' ) {
                    $bladeForm = '
                        <!-- Button trigger modal -->
                        <a class="bg-light py-0 px-1 btn rounded-circle btn-circle shadow-sm" type="button" data-bs-toggle="modal" data-bs-target="#add'. $row.$Feild.'">

                            إضافة
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="add'. $row.$Feild.'" style="direction: ltr" tabindex="-1" aria-labelledby="add'. $row.$Feild.'Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title w-100 text-center" id="add'. $row.$Feild.'Label">إضافة عملية</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="'. route('storeSurgery' ).'" style="direction: rtl">
                                    ' . csrf_field() . '
                                    <div class="form-row">
                                        <div class="form-floating col-6 mb-3">
                                            <input class="form-control "name="surgery_name" type="text" required/>
                                            <label>اسم العملية:</label>
                                        </div>
                                        <div class="form-floating col-6 mb-3">
                                            <input class="form-control " name="doctor_name" type="text" required  />
                                            <label>اسم الطبيب:</label>
                                        </div>
                                    </div>
                                    <div class="row" style="--bs-gutter-x: 0.5rem;">
                                        <div class="form-floating col-sm-6 mb-3">
                                            <select  class="form-control " name="surgery_room"  >
                                                <option ';
                                                if ($Feild == 0 ){ $bladeForm.=' selected ';}
                                                $bladeForm.=' value="room_1">العمليات 1</option>
                                                <option';
                                                if ($Feild == 1 ){$bladeForm.=' selected ';}
                                                $bladeForm.=' value="room_2">العمليات 2</option>
                                                <option';
                                                if ($Feild == 2){$bladeForm.=' selected ';}
                                                $bladeForm.=' value="room_3">العمليات 3</option>
                                                <option';
                                                if ($Feild == 3 ){$bladeForm.=' selected ';}
                                                $bladeForm.=' value="room_b">العظمية</option>
                                                <option';
                                                if ($Feild == 4 ){$bladeForm.=' selected ';}
                                                $bladeForm.=' value="room_h">القلبية</option>
                                            </select>
                                            <label>غرفة العمليات:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-row">
                                                <div class="form-floating col-4 mb-3">
                                                    <input class="form-control " type="number" min="1" max="10" name="surgery_term" />
                                                    <label>المدة:</label>
                                                </div>
                                                <div class="form-floating col-8 mb-3">
                                                    <input class="form-control "  min="'.Carbon::today()->format("Y-m-d\TH:i").'"  type="datetime-local" name="surgery_time" value="'.Carbon::parse($date)->format('Y-m-d') .' ' .$row .':00:00" required />
                                                    <label>وقت العملية:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="--bs-gutter-x: 0.5rem;">
                                        <div class="col-sm-6 ">
                                            <div class="form-row">
                                                <div class="form-floating col-6 mb-3" >
                                                    <select class="form-control" name="assistant_surgeon">
                                                        <option value=""></option> ';
                                                        foreach ($employees1 as $employee1){
                                                            $bladeForm.= '<option value="'.$employee1->employee_name.'">'.$employee1->employee_name.'</option> ';
                                                        }
                                                        $bladeForm.= '
                                                    </select>
                                                    <label>مساعد الجراح:</label>
                                                </div>

                                                <div class="form-floating col-6 mb-3">
                                                    <select class="form-control" name="anesthesia_technician">
                                                        <option value=""></option>';

                                                        foreach ($employees2 as $employee2){
                                                            $bladeForm.= ' <option value="'.$employee2->employee_name.'">'.$employee2->employee_name.'</option> ';
                                                        }

                                                        $bladeForm.= '
                                                    </select>
                                                    <label>فني التخدير:</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-floating col-sm-6 mb-3">
                                                <div class="card px-1 form-control"  style="display: -webkit-inline-box ;height: 58px;width: 100%;direction:rtl">
                                                ';
                                                if ($devices1 >0){
                                                $bladeForm.= '
                                                        <div class="custom-control custom-checkbox custom-control-inline" style="direction: ;text-align:right">
                                                            <input type="checkbox" id="device1" name="surgery_device[]"  value="قوسي" class="custom-control-input">
                                                            <label class="text-xs text-dark font-weight-bold custom-control-label" for="device1" >جهاز قوسي</label>
                                                        </div>
                                                        ';
                                                }
                                                if ($devices2 >0){
                                                $bladeForm.= '
                                                    <div class="custom-control custom-checkbox custom-control-inline" style="direction: ;text-align:right">
                                                        <input type="checkbox" id="device2" name="surgery_device[]" value="تنظير" class="custom-control-input">
                                                        <label class="text-xs text-dark font-weight-bold custom-control-label" for="device2s" >جهاز تنظير</label>
                                                    </div>
                                                    ';
                                                }
                                                if ($devices3 >0){
                                                $bladeForm.= '
                                                    <div class="custom-control custom-checkbox custom-control-inline" style="direction: ;text-align:right">
                                                        <input type="checkbox" id="device3" name="surgery_device[]"  value="ضاغط الدم" class="custom-control-input">
                                                        <label class="text-xs text-dark font-weight-bold custom-control-label" for="device3" >جهاز كاروي</label>
                                                    </div>
                                                    ';
                                                }
                                                $bladeForm.= '
                                                </div>
                                            <label>أدوات العملية:</label>
                                        </div>

                                    </div>

                                    <div class="form-floating col-md-12 mb-3">
                                            <input class="form-control" name="surgery_info" type="text" />
                                            <label>ملاحظات العملية:</label>
                                        </div>
                                    <div class="d-grid"><button class="btn btn-primary btn-md" type="submit">إضافة عملية</button></div>
                                </form>
                                </div>

                            </div>
                            </div>
                        </div>
                    ';
                }
            }
        }

        $compiledBladeForm = Blade::compileString($bladeForm);
        return $compiledBladeForm;
    }
    public function fieldsContants($data)
    {

    }
    public function fieldslimit(array $fieldslimit , $hourRow, $roomColum ,$value)
    {

        $fieldslimit[$hourRow][$roomColum]=$value;
        for ($i = $fieldslimit[$hourRow][$roomColum] -1 ; $i > 0 ; $i-- ) {
            ++$hourRow;
            $fieldslimit[$hourRow][$roomColum] = 0;

        }
        return $fieldslimit;
    }
    public function showRow( $feildLocation )
    {
        $showRow=[];
        for ($i = 0 ; $i <= 23 ; ++$i ) {
            $showRow[$i] = 0;
        }

        foreach ($feildLocation as $key => $value) {
            $i = $key;
            $show = 0;
            foreach ($value as $key2 => $value2) {
                if ($value2 ==  0 || $value2 >=  2) {
                    $show=1 ;
                }
            }

            if ( $show == 1) {
                $showRow[$i] = 1 ;
            }
        }
        return $showRow;

    }
    public function feildsValues($surgeries  )
    {
        $feildLocations=[];

        for ($hourRow = 0 ; $hourRow <= 23 ; ++$hourRow ) {
            for ($roomCol = 0 ; $roomCol <= 4 ; ++$roomCol ) {
                $feildLocations[$hourRow][$roomCol] = [];
            }

        }


        $feildLimit=[];

        for ($i = 0 ; $i <= 23 ; ++$i ) {
            for ($j = 0 ; $j <= 4 ; ++$j ) {
                $feildLimit[$i][$j] = 1;
            }

        }


        foreach ($surgeries as $item) {

            $check=Carbon::parse($item->surgery_time)->format('H');
            if ($check == 0 && $item->surgery_room =='room_1') {
                $feildLocations[0][0]=$item;
                $rowSpan0_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 0, 0 ,$rowSpan0_0 );
            } elseif($check == 0 && $item->surgery_room =='room_2') {
                $feildLocations[0][1]=$item;
                $rowSpan0_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 0, 1 ,$rowSpan0_1 );
            } elseif($check == 0 && $item->surgery_room =='room_3') {
                $feildLocations[0][2]=$item;
                $rowSpan0_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 0, 2 ,$rowSpan0_2 );
            } elseif($check == 0 && $item->surgery_room =='room_b') {
                $feildLocations[0][3]=$item;
                $rowSpan0_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 0, 3 ,$rowSpan0_3 );
            } elseif($check == 0 && $item->surgery_room =='room_h') {
                $feildLocations[0][4]=$item;
                $rowSpan0_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 0, 4 ,$rowSpan0_4 );
            }
            elseif ($check == 1 && $item->surgery_room =='room_1') {
                $feildLocations[1][0]=$item;
                $rowSpan1_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 1, 0 ,$rowSpan1_0 );
            } elseif($check == 1 && $item->surgery_room =='room_2') {
                $feildLocations[1][1]=$item;
                $rowSpan1_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 1, 1 ,$rowSpan1_1 );
            } elseif($check == 1 && $item->surgery_room =='room_3') {
                $feildLocations[1][2]=$item;
                $rowSpan1_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 1, 2 ,$rowSpan1_2 );
            } elseif($check == 1 && $item->surgery_room =='room_b') {
                $feildLocations[1][3]=$item;
                $rowSpan1_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 1, 3 ,$rowSpan1_3 );
            } elseif($check == 1 && $item->surgery_room =='room_h') {
                $feildLocations[1][4]=$item;
                $rowSpan1_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 1, 4 ,$rowSpan1_4 );
            }
            elseif ($check == 2 && $item->surgery_room =='room_1') {
                $feildLocations[2][0]=$item;
                $rowSpan2_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 2, 0 ,$rowSpan2_0 );
            } elseif($check == 2 && $item->surgery_room =='room_2') {
                $feildLocations[2][1]=$item;
                $rowSpan2_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 2, 1 ,$rowSpan2_1 );
            } elseif($check == 2 && $item->surgery_room =='room_3') {
                $feildLocations[2][2]=$item;
                $rowSpan2_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 2, 2 ,$rowSpan2_2 );
            } elseif($check == 2 && $item->surgery_room =='room_b') {
                $feildLocations[2][3]=$item;
                $rowSpan2_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 2, 3 ,$rowSpan2_3 );
            } elseif($check == 2 && $item->surgery_room =='room_h') {
                $feildLocations[2][4]=$item;
                $rowSpan2_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 2, 4 ,$rowSpan2_4 );
            }
            elseif ($check == 3 && $item->surgery_room =='room_1') {
                $feildLocations[3][0]=$item;
                $rowSpan3_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 3, 0 ,$rowSpan3_0 );
            } elseif($check == 3 && $item->surgery_room =='room_2') {
                $feildLocations[3][1]=$item;
                $rowSpan3_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 3, 1 ,$rowSpan3_1 );
            } elseif($check == 3 && $item->surgery_room =='room_3') {
                $feildLocations[3][2]=$item;
                $rowSpan3_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 3, 2 ,$rowSpan3_2 );
            } elseif($check == 3 && $item->surgery_room =='room_b') {
                $feildLocations[3][3]=$item;
                $rowSpan3_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 3, 3 ,$rowSpan3_3 );
            } elseif($check == 3 && $item->surgery_room =='room_h') {
                $feildLocations[3][4]=$item;
                $rowSpan3_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 3, 4 ,$rowSpan3_4 );
            }
            elseif ($check == 4 && $item->surgery_room =='room_1') {
                $feildLocations[4][0]=$item;
                $rowSpan4_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 4, 0 ,$rowSpan4_0 );
            } elseif($check == 4 && $item->surgery_room =='room_2') {
                $feildLocations[4][1]=$item;
                $rowSpan4_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 4, 1 ,$rowSpan4_1 );
            } elseif($check == 4 && $item->surgery_room =='room_3') {
                $feildLocations[4][2]=$item;
                $rowSpan4_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 4, 2 ,$rowSpan4_2 );
            } elseif($check == 4 && $item->surgery_room =='room_b') {
                $feildLocations[4][3]=$item;
                $rowSpan4_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 4, 3 ,$rowSpan4_3 );
            } elseif($check == 4 && $item->surgery_room =='room_h') {
                $feildLocations[4][4]=$item;
                $rowSpan4_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 4, 4 ,$rowSpan4_4 );
            }
            elseif ($check == 5 && $item->surgery_room =='room_1') {
                $feildLocations[5][0]=$item;
                $rowSpan5_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 5, 0 ,$rowSpan5_0 );
            } elseif($check == 5 && $item->surgery_room =='room_2') {
                $feildLocations[5][1]=$item;
                $rowSpan5_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 5, 1 ,$rowSpan5_1 );
            } elseif($check == 5 && $item->surgery_room =='room_3') {
                $feildLocations[5][2]=$item;
                $rowSpan5_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 5, 2 ,$rowSpan5_2 );
            } elseif($check == 5 && $item->surgery_room =='room_b') {
                $feildLocations[5][3]=$item;
                $rowSpan5_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 5, 3 ,$rowSpan5_3 );
            } elseif($check == 5 && $item->surgery_room =='room_h') {
                $feildLocations[5][4]=$item;
                $rowSpan5_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 5, 4 ,$rowSpan5_4 );
            }
            elseif ($check == 6 && $item->surgery_room =='room_1') {
                $feildLocations[6][0]=$item;
                $rowSpan6_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 6, 0 ,$rowSpan6_0 );
            } elseif($check == 6 && $item->surgery_room =='room_2') {
                $feildLocations[6][1]=$item;
                $rowSpan6_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 6, 1 ,$rowSpan6_1 );
            } elseif($check == 6 && $item->surgery_room =='room_3') {
                $feildLocations[6][2]=$item;
                $rowSpan6_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 6, 2 ,$rowSpan6_2 );
            } elseif($check == 6 && $item->surgery_room =='room_b') {
                $feildLocations[6][3]=$item;
                $rowSpan6_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 6, 3 ,$rowSpan6_3 );
            } elseif($check == 6 && $item->surgery_room =='room_h') {
                $feildLocations[6][4]=$item;
                $rowSpan6_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 6, 4 ,$rowSpan6_4 );
            }
            elseif ($check == 7 && $item->surgery_room =='room_1') {
                $feildLocations[7][0]=$item;
                $rowSpan7_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 7, 0 ,$rowSpan7_0 );
            } elseif($check == 7 && $item->surgery_room =='room_2') {
                $feildLocations[7][1]=$item;
                $rowSpan7_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 7, 1 ,$rowSpan7_1 );
            } elseif($check == 7 && $item->surgery_room =='room_3') {
                $feildLocations[7][2]=$item;
                $rowSpan7_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 7, 2 ,$rowSpan7_2 );
            } elseif($check == 7 && $item->surgery_room =='room_b') {
                $feildLocations[7][3]=$item;
                $rowSpan7_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 7, 3 ,$rowSpan7_3 );
            } elseif($check == 7 && $item->surgery_room =='room_h') {
                $feildLocations[7][4]=$item;
                $rowSpan7_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 7, 4 ,$rowSpan7_4 );
            }
            elseif ($check == 8 && $item->surgery_room =='room_1') {
                $feildLocations[8][0]=$item;
                $rowSpan8_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 8, 0 ,$rowSpan8_0 );
            } elseif($check == 8 && $item->surgery_room =='room_2') {
                $feildLocations[8][1]=$item;
                $rowSpan8_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 8, 1 ,$rowSpan8_1 );
            } elseif($check == 8 && $item->surgery_room =='room_3') {
                $feildLocations[8][2]=$item;
                $rowSpan8_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 8, 2 ,$rowSpan8_2 );
            } elseif($check == 8 && $item->surgery_room =='room_b') {
                $feildLocations[8][3]=$item;
                $rowSpan8_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 8, 3 ,$rowSpan8_3 );
            } elseif($check == 8 && $item->surgery_room =='room_h') {
                $feildLocations[8][4]=$item;
                $rowSpan8_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 8, 4 ,$rowSpan8_4 );
            }
            elseif ($check == 9 && $item->surgery_room =='room_1') {
                $feildLocations[9][0]=$item;
                $rowSpan9_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 9, 0 ,$rowSpan9_0 );
            } elseif($check == 9 && $item->surgery_room =='room_2') {
                $feildLocations[9][1]=$item;
                $rowSpan9_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 9, 1 ,$rowSpan9_1 );
            } elseif($check == 9 && $item->surgery_room =='room_3') {
                $feildLocations[9][2]=$item;
                $rowSpan9_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 9, 2 ,$rowSpan9_2 );
            } elseif($check == 9 && $item->surgery_room =='room_b') {
                $feildLocations[9][3]=$item;
                $rowSpan9_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 9, 3 ,$rowSpan9_3 );
            } elseif($check == 9 && $item->surgery_room =='room_h') {
                $feildLocations[9][4]=$item;
                $rowSpan9_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 9, 4 ,$rowSpan9_4 );
            }
            elseif ($check == 10 && $item->surgery_room =='room_1') {
                $feildLocations[10][0]=$item;
                $rowSpan10_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 10, 0 ,$rowSpan10_0);
            } elseif($check == 10 && $item->surgery_room =='room_2') {
                $feildLocations[10][1]=$item;
                $rowSpan10_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 10, 1 ,$rowSpan10_1);
            } elseif($check == 10 && $item->surgery_room =='room_3') {
                $feildLocations[10][2]=$item;
                $rowSpan10_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 10, 2 ,$rowSpan10_2);
            } elseif($check == 10 && $item->surgery_room =='room_b') {
                $feildLocations[10][3]=$item;
                $rowSpan10_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 10, 3 ,$rowSpan10_3);
            } elseif($check == 10 && $item->surgery_room =='room_h') {
                $feildLocations[10][4]=$item;
                $rowSpan10_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 10, 4 ,$rowSpan10_4);
            }
            elseif ($check == 11 && $item->surgery_room =='room_1') {
                $feildLocations[11][0]=$item;
                $rowSpan11_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 11, 0 ,$rowSpan11_0);
            } elseif($check == 11 && $item->surgery_room =='room_2') {
                $feildLocations[11][1]=$item;
                $rowSpan11_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 11, 1 ,$rowSpan11_1);
            } elseif($check == 11 && $item->surgery_room =='room_3') {
                $feildLocations[11][2]=$item;
                $rowSpan11_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 11, 2 ,$rowSpan11_2);
            } elseif($check == 11 && $item->surgery_room =='room_b') {
                $feildLocations[11][3]=$item;
                $rowSpan11_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 11, 3 ,$rowSpan11_3);
            } elseif($check == 11 && $item->surgery_room =='room_h') {
                $feildLocations[11][4]=$item;
                $rowSpan11_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 11, 4 ,$rowSpan11_4);
            }
            elseif ($check == 12 && $item->surgery_room =='room_1') {
                $feildLocations[12][0]=$item;
                $rowSpan12_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 12, 0 ,$rowSpan12_0);
            } elseif($check == 12 && $item->surgery_room =='room_2') {
                $feildLocations[12][1]=$item;
                $rowSpan12_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 12, 1 ,$rowSpan12_1);
            } elseif($check == 12 && $item->surgery_room =='room_3') {
                $feildLocations[12][2]=$item;
                $rowSpan12_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 12, 2 ,$rowSpan12_2);
            } elseif($check == 12 && $item->surgery_room =='room_b') {
                $feildLocations[12][3]=$item;
                $rowSpan12_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 12, 3 ,$rowSpan12_3);
            } elseif($check == 12 && $item->surgery_room =='room_h') {
                $feildLocations[12][4]=$item;
                $rowSpan12_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 12, 4 ,$rowSpan12_4);
            }
            elseif ($check == 13 && $item->surgery_room =='room_1') {
                $feildLocations[13][0]=$item;
                $rowSpan13_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 13, 0 ,$rowSpan13_0);
            } elseif($check == 13 && $item->surgery_room =='room_2') {
                $feildLocations[13][1]=$item;
                $rowSpan13_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 13, 1 ,$rowSpan13_1);
            } elseif($check == 13 && $item->surgery_room =='room_3') {
                $feildLocations[13][2]=$item;
                $rowSpan13_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 13, 2 ,$rowSpan13_2);
            } elseif($check == 13 && $item->surgery_room =='room_b') {
                $feildLocations[13][3]=$item;
                $rowSpan13_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 13, 3 ,$rowSpan13_3);
            } elseif($check == 13 && $item->surgery_room =='room_h') {
                $feildLocations[13][4]=$item;
                $rowSpan13_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 13, 4 ,$rowSpan13_4);
            }
            elseif ($check == 14 && $item->surgery_room =='room_1') {
                $feildLocations[14][0]=$item;
                $rowSpan14_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 14, 0 ,$rowSpan14_0);
            } elseif($check == 14 && $item->surgery_room =='room_2') {
                $feildLocations[14][1]=$item;
                $rowSpan14_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 14, 1 ,$rowSpan14_1);
            } elseif($check == 14 && $item->surgery_room =='room_3') {
                $feildLocations[14][2]=$item;
                $rowSpan14_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 14, 2 ,$rowSpan14_2);
            } elseif($check == 14 && $item->surgery_room =='room_b') {
                $feildLocations[14][3]=$item;
                $rowSpan14_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 14, 3 ,$rowSpan14_3);
            } elseif($check == 14 && $item->surgery_room =='room_h') {
                $feildLocations[14][4]=$item;
                $rowSpan14_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 14, 4 ,$rowSpan14_4);
            }
            elseif ($check == 15 && $item->surgery_room =='room_1') {
                $feildLocations[15][0]=$item;
                $rowSpan15_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 15, 0 ,$rowSpan15_0);
            } elseif($check == 15 && $item->surgery_room =='room_2') {
                $feildLocations[15][1]=$item;
                $rowSpan15_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 15, 1 ,$rowSpan15_1);
            } elseif($check == 15 && $item->surgery_room =='room_3') {
                $feildLocations[15][2]=$item;
                $rowSpan15_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 15, 2 ,$rowSpan15_2);
            } elseif($check == 15 && $item->surgery_room =='room_b') {
                $feildLocations[15][3]=$item;
                $rowSpan15_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 15, 3 ,$rowSpan15_3);
            } elseif($check == 15 && $item->surgery_room =='room_h') {
                $feildLocations[15][4]=$item;
                $rowSpan15_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 15, 4 ,$rowSpan15_4);
            }
            elseif ($check == 16 && $item->surgery_room =='room_1') {
                $feildLocations[16][0]=$item;
                $rowSpan16_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 16, 0 ,$rowSpan16_0);
            } elseif($check == 16 && $item->surgery_room =='room_2') {
                $feildLocations[16][1]=$item;
                $rowSpan16_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 16, 1 ,$rowSpan16_1);
            } elseif($check == 16 && $item->surgery_room =='room_3') {
                $feildLocations[16][2]=$item;
                $rowSpan16_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 16, 2 ,$rowSpan16_2);
            } elseif($check == 16 && $item->surgery_room =='room_b') {
                $feildLocations[16][3]=$item;
                $rowSpan16_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 16, 3 ,$rowSpan16_3);
            } elseif($check == 16 && $item->surgery_room =='room_h') {
                $feildLocations[16][4]=$item;
                $rowSpan16_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 16, 4 ,$rowSpan16_4);
            }
            elseif ($check == 17 && $item->surgery_room =='room_1') {
                $feildLocations[17][0]=$item;
                $rowSpan17_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 17, 0 ,$rowSpan17_0);
            } elseif($check == 17 && $item->surgery_room =='room_2') {
                $feildLocations[17][1]=$item;
                $rowSpan17_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 17, 1 ,$rowSpan17_1);
            } elseif($check == 17 && $item->surgery_room =='room_3') {
                $feildLocations[17][2]=$item;
                $rowSpan17_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 17, 2 ,$rowSpan17_2);
            } elseif($check == 17 && $item->surgery_room =='room_b') {
                $feildLocations[17][3]=$item;
                $rowSpan17_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 17, 3 ,$rowSpan17_3);
            } elseif($check == 17 && $item->surgery_room =='room_h') {
                $feildLocations[17][4]=$item;
                $rowSpan17_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 17, 4 ,$rowSpan17_4);
            }
            elseif ($check == 18 && $item->surgery_room =='room_1') {
                $feildLocations[18][0]=$item;
                $rowSpan18_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 18, 0 ,$rowSpan18_0);
            } elseif($check == 18 && $item->surgery_room =='room_2') {
                $feildLocations[18][1]=$item;
                $rowSpan18_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 18, 1 ,$rowSpan18_1);
            } elseif($check == 18 && $item->surgery_room =='room_3') {
                $feildLocations[18][2]=$item;
                $rowSpan18_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 18, 2 ,$rowSpan18_2);
            } elseif($check == 18 && $item->surgery_room =='room_b') {
                $feildLocations[18][3]=$item;
                $rowSpan18_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 18, 3 ,$rowSpan18_3);
            } elseif($check == 18 && $item->surgery_room =='room_h') {
                $feildLocations[18][4]=$item;
                $rowSpan18_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 18, 4 ,$rowSpan18_4);
            }
            elseif ($check == 19 && $item->surgery_room =='room_1') {
                $feildLocations[19][0]=$item;
                $rowSpan19_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 19, 0 ,$rowSpan19_0);
            } elseif($check == 19 && $item->surgery_room =='room_2') {
                $feildLocations[19][1]=$item;
                $rowSpan19_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 19, 1 ,$rowSpan19_1);
            } elseif($check == 19 && $item->surgery_room =='room_3') {
                $feildLocations[19][2]=$item;
                $rowSpan19_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 19, 2 ,$rowSpan19_2);
            } elseif($check == 19 && $item->surgery_room =='room_b') {
                $feildLocations[19][3]=$item;
                $rowSpan19_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 19, 3 ,$rowSpan19_3);
            } elseif($check == 19 && $item->surgery_room =='room_h') {
                $feildLocations[19][4]=$item;
                $rowSpan19_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 19, 4 ,$rowSpan19_4);
            }
            elseif ($check == 20 && $item->surgery_room =='room_1') {
                $feildLocations[20][0]=$item;
                $rowSpan20_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 20, 0 ,$rowSpan20_0);
            } elseif($check == 20 && $item->surgery_room =='room_2') {
                $feildLocations[20][1]=$item;
                $rowSpan20_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 20, 1 ,$rowSpan20_1);
            } elseif($check == 20 && $item->surgery_room =='room_3') {
                $feildLocations[20][2]=$item;
                $rowSpan20_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 20, 2 ,$rowSpan20_2);
            } elseif($check == 20 && $item->surgery_room =='room_b') {
                $feildLocations[20][3]=$item;
                $rowSpan20_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 20, 3 ,$rowSpan20_3);
            } elseif($check == 20 && $item->surgery_room =='room_h') {
                $feildLocations[20][4]=$item;
                $rowSpan20_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 20, 4 ,$rowSpan20_4);
            }
            elseif ($check == 21 && $item->surgery_room =='room_1') {
                $feildLocations[21][0]=$item;
                $rowSpan21_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 21, 0 ,$rowSpan21_0);
            } elseif($check == 21 && $item->surgery_room =='room_2') {
                $feildLocations[21][1]=$item;
                $rowSpan21_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 21, 1 ,$rowSpan21_1);
            } elseif($check == 21 && $item->surgery_room =='room_3') {
                $feildLocations[21][2]=$item;
                $rowSpan21_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 21, 2 ,$rowSpan21_2);
            } elseif($check == 21 && $item->surgery_room =='room_b') {
                $feildLocations[21][3]=$item;
                $rowSpan21_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 21, 3 ,$rowSpan21_3);
            } elseif($check == 21 && $item->surgery_room =='room_h') {
                $feildLocations[21][4]=$item;
                $rowSpan21_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 21, 4 ,$rowSpan21_4);
            }
            elseif ($check == 22 && $item->surgery_room =='room_1') {
                $feildLocations[22][0]=$item;
                $rowSpan22_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 22, 0 ,$rowSpan22_0);
            } elseif($check == 22 && $item->surgery_room =='room_2') {
                $feildLocations[22][1]=$item;
                $rowSpan22_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 22, 1 ,$rowSpan22_1);
            } elseif($check == 22 && $item->surgery_room =='room_3') {
                $feildLocations[22][2]=$item;
                $rowSpan22_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 22, 2 ,$rowSpan22_2);
            } elseif($check == 22 && $item->surgery_room =='room_b') {
                $feildLocations[22][3]=$item;
                $rowSpan22_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 22, 3 ,$rowSpan22_3);
            } elseif($check == 22 && $item->surgery_room =='room_h') {
                $feildLocations[22][4]=$item;
                $rowSpan22_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 22, 4 ,$rowSpan22_4);
            }
            elseif ($check == 23 && $item->surgery_room =='room_1') {
                $feildLocations[23][0]=$item;
                $rowSpan23_0 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 23, 0 ,$rowSpan23_0);
            } elseif($check == 23 && $item->surgery_room =='room_2') {
                $feildLocations[23][1]=$item;
                $rowSpan23_1 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 23, 1 ,$rowSpan23_1);
            } elseif($check == 23 && $item->surgery_room =='room_3') {
                $feildLocations[23][2]=$item;
                $rowSpan23_2 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 23, 2 ,$rowSpan23_2);
            } elseif($check == 23 && $item->surgery_room =='room_b') {
                $feildLocations[23][3]=$item;
                $rowSpan23_3 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 23, 3 ,$rowSpan23_3);
            } elseif($check == 23 && $item->surgery_room =='room_h') {
                $feildLocations[23][4]=$item;
                $rowSpan23_4 =Carbon::parse($item->surgery_term)->format('H') - $check +1;
                $feildLimit =tableFields::fieldslimit($feildLimit , 23, 4 ,$rowSpan23_4);
            }
            // var_dump($feildLimit);

        }
        // dd($feildLocations);
        return ['feildLocations'=> $feildLocations ,'feildLimit'=>$feildLimit] ;

    }
}
