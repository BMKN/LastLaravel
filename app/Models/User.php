<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'courseModule',
        'MobileNumber',
        'lectureHandouts',
        'collegeChoice',
        'department',
        'supplyBooks',
        'methodofPayment',
        'addressLine1',
        'addressLine2',
        'Country',
        'eirCode',
        'module_0',
        'module_1',
        'module_2',
        'module_3',
        'module_4',
          'course_module',
          'course_name',
          'pain_module',
          'uk_legal' ,
          'species_specific_1' ,
          'species_specific_2',
          'species_specific' ,
          'student_comments' ,
          'handling',
          'date_of_exam' ,
          'date_of_uk_exam',
          'comment_on_results',
          'invoice_number',
          'date_of_course',
          'final_price' ,
          'terms_and_conditions'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
