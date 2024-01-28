<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class updateStudentController extends Controller
{
    public function getstudentData(){

        return view('update-student');

    }
    public function updateStudent (Request $request){
        $data = $request->all();
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $lectureHandouts = $data['lectureHandouts'];
        $department = $data['department'];
        $supplyBooks = $data['supplyBooks'];
        $methodofPayment = $data['methodofPayment'];
        $collegeChoice = $data['collegeChoice'];
        $addressLine1 = $data['addressLine1'];
        $addressLine2 = $data['addressLine2'];
        $Country = $data['Country'];
        $eirCode = $data['eirCode'];
        $module0 = $data['module0'];
        $module1 = $data['module1'];
        $module2 = $data['module2'];
        $module3 = $data['module3'];
          $course_module = $data['course_module'];
          $pain_module = $data['pain_module'];
          $uk_legal = $data['uk_legal'];
          $species_specific_1 = $data['species_specific_1'];
          $species_specific_2 = $data['species_specific_2'];
          $course_name = $data['course_name'];
          $species_specific = $data['species_specific'];
          $student_comments = $data['student_comments'];
          $handling = $data['handling'];
          $date_of_exam = $data['date_of_exam'];
          $date_of_uk_exam = $data['date_of_uk_exam'];
          $comment_on_results = $data['comment_on_results'];
          $invoice_number = $data['invoice_number'];
          $date_of_course = $data['date_of_course'];


        $Student = User::find($id);
        $Student->name = $name ;
        $Student->email = $email ;
        $Student->MobileNumber = $mobile ;
        $Student->lectureHandouts = $lectureHandouts ;
        $Student->department = $department ;
        $Student->supplyBooks = $supplyBooks ;
        $Student->methodofPayment = $methodofPayment ;
        $Student->collegeChoice = $collegeChoice ;
        $Student->addressLine1 = $addressLine1 ;
        $Student->addressLine2 = $addressLine2 ;
        $Student->Country = $Country ;
        $Student->eirCode = $eirCode ;
        $Student->Core = $module0 ;
        $Student->Rodent = $module1 ;
        $Student->Rabbit = $module2 ;
        $Student->Large_Animal_Aquatic = $module3 ;
          $Student->course_module = $course_module ;
          $Student->pain_module = $pain_module ;
          $Student->uk_legal = $uk_legal ;
          $Student->species_specific_1 = $species_specific_1 ;
          $Student->species_specific_2 = $species_specific_2 ;
          $Student->course_name = $course_name ;
          $Student->species_specific = $species_specific ;
          $Student->student_comments = $student_comments ;
          $Student->date_of_exam = $date_of_exam ;
          $Student->handling = $handling ;
          $Student->date_of_uk_exam = $date_of_uk_exam ;
          $Student->comment_on_results = $comment_on_results ;
          $Student->invoice_number = $invoice_number ;
          $Student->date_of_course = $date_of_course ;
        $Student->save();


        echo json_encode( $Student );

    }
}
