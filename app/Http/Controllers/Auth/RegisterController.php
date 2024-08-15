<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:25'],
            'username' => ['required', 'string', 'max:25'],
            'grade' => ['required', 'string'],
            'bio' => ['nullable', 'string', 'max:25'],
            'user_speciality' => ['nullable', 'string', 'max:25'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $text = $data['name'];

        if ( $data['user_speciality'] == 'طبيب تخدير') {
            $photo ='assets/img/2.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $data['user_speciality'] == 'طبيب جراح') {
            $photo ='assets/img/1.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", 'د. ', $text);
            }elseif (strstr($text, "د.") == true){
                $newText =  $text;
            }else{
                $newText = 'د. '.$text ;
            }
        } elseif ( $data['user_speciality'] == 'مساعد جراح') {
            $photo ='assets/img/4.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ.", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $data['user_speciality'] == 'فني تخدير') {
            $photo ='assets/img/5.jpg';
            if (strstr($text, "أ.") == true) {
                $newText = str_replace("أ. ", '', $text);
            }elseif (strstr($text, "د.") == true){
                $newText = str_replace("د. ", '', $text);
            }else{
                $newText =$text ;
            }
        } elseif ( $data['user_speciality'] == 'إداري') {
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
            'employee_bio'  => $data['bio'] ,
            'employee_speciality'=> $data['user_speciality'] ,
        ]);
        return User::create([
            'name' =>$newText,
            'username' => $data['username'],
            'user_speciality' => $data['user_speciality'],
            'user_slug' => Str::uuid()->toString(),
            'grade' => $data['grade'],
            'user_image' => $photo,
            'bio' => $data['bio'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
