<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeEmail;
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
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'courseModule' => ['required', 'string'],
            'MobileNumber' => ['required', 'string'],
            'lectureHandouts' => ['required', 'string'],
            'collegeChoice' => ['required', 'string'],
            'department' => ['required', 'string'],
            'supplyBooks' => ['required', 'string'],
            'methodofPayment' => ['required', 'string'],






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

        $user = User::create([
            'name' => $data['name'],
            'courseModule' => $data['courseModule'],
            'MobileNumber' => $data['MobileNumber'],
            'lectureHandouts' => $data['lectureHandouts'],
            'department' => $data['department'],
            'supplyBooks' => $data['supplyBooks'],
            'methodofPayment' => $data['methodofPayment'],
            'addressLine1' => $data['addressLine1'],
            'addressLine2' => $data['addressLine2'],
            'Country' => $data['Country'],
            'eirCode' => $data['eirCode'],
            'module_0' => 0,
            'module_1' => 0,
            'module_2' => 0,
            'module_3' => 0,
            'module_4' => 0,
            'email' => $data['email'],
            'collegeChoice' => $data['collegeChoice'],
            'password' => Hash::make($data['password']),
            'cert_Uploaded'=> 0,
            'aws_link' => 0,
            'course_module' => $data['courseModule'],
            'course_name' => $data['courseModule'],
            'pain_module' => '',
            'uk_legal' => '',
            'species_specific_1' => '',
            'species_specific_2' => '',
            'species_specific' => '',
            'student_comments' => '',
            'handling' => '',
            'date_of_exam' => '',
            'date_of_uk_exam' => '',
            'comment_on_results' => '',
            'invoice_number' => '',
            'date_of_course' => '',
            'final_price' => '',
            'terms_and_conditions' => '',
        ]);
        Mail::to($user['email'])->send(new WelcomeEmail($user));


        return $user;

    }




}
