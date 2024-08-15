<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Surgery;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function showSurgeries($date)
    {
        $date= Carbon::parse($date);
        if (Auth::check()) {
            $surgeries = Surgery::whereDate('surgery_time',Carbon::parse($date)->format('Y-m-d'))
            ->get();
            // dd($surgeries);

            return view('surgeries.showSurgery', compact('surgeries','date'));
        }else{
            $min= Carbon::today()->subDay() ;
            $max= Carbon::today()->addDay() ;
            $day =Carbon::parse($date);
            if ($day >= $min    && $day <= $max ) {
                $surgeries = Surgery::whereDate('surgery_time',Carbon::parse($date)->format('Y-m-d'))
                ->get();
                // dd($surgeries);
                return view('surgeries.showSurgery', compact('surgeries','date'));
            } else {
                return redirect('/')->with([
                    'MainAlertMessage'=>'فشل  !!',
                    'AlertMessage'=>' لا يمكن الوصول إلى هذا الجدول .',
                    'alert_type_A'   =>'danger',
                ]);

            }
        }
    }


}
