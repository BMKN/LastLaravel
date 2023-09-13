<?php

use Illuminate\Support\Facades\Route;
use App\Models\adminSectionController;
use App\Http\Middleware\checkLogin;



/*
|--------------------------------------------------------------------------
| Web Routes
|

|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



//Route::get('/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');



Auth::routes();
//Route::group(['middleware' => "id:1"], function() {
Route::get('/auth/register', [App\Http\Controllers\getRegCourseNamesController::class, 'getCourseNamesReg']);
Route::middleware([checkLogin::class])->group(function(){

    Route::post('/edit', [App\Http\Controllers\adminSectionController::class, 'studentSearch'])->name('studentedit');
    Route::get('/edit', [App\Http\Controllers\getCourseNamesController::class, 'getCourseNames']);


});

        Route::post('/showStudent', [App\Http\Controllers\showStudentController::class, 'returnStudentInfo']);
        Route::get('/showStudent', [App\Http\Controllers\showStudentController::class, 'showStudent']);
        Route::post('/update-student', [App\Http\Controllers\updateStudentController::class, 'updateStudent']);
        Route::get('/update-student', [App\Http\Controllers\updateStudentController::class, 'getstudentData']);
        Route::get('/sms-info', [App\Http\Controllers\getStudentSmsInfoController::class, 'returnSmsInfo']);
        Route::post('/sms-info', [App\Http\Controllers\getStudentSmsInfoController::class, 'getStudentSmsInfo']);
        Route::get('/send-sms', [App\Http\Controllers\sendStudentSMSController::class, 'returnInfo']);
        Route::post('/send-sms', [App\Http\Controllers\sendStudentSMSController::class, 'sendSms']);


        Route::get('/create-sumup', [App\Http\Controllers\creatSumUpLink::class, 'returnSumUp']);
        Route::post('/create-sumup', [App\Http\Controllers\creatSumUpLink::class, 'createSumupLink']);

        //Route::get('/create-sumup', [App\Http\Controllers\getSumupCheckoutId::class, 'returnSumUp']);
        Route::post('/create-sumup-link', [App\Http\Controllers\getSumupCheckoutId::class, 'getStudentId']);
        Route::post('/create-invoice', [App\Http\Controllers\createWaveInvoice::class, 'createInvoice']);

        Route::get('/view-course', [App\Http\Controllers\createCourseController::class, 'createCourseView']);
        Route::post('/view-course', [App\Http\Controllers\createCourseController::class, 'createCourse']);
        Route::post('/createPosts', [App\Http\Controllers\postsController::class, 'createPost']);
        Route::get('/viewPosts', [App\Http\Controllers\getCourseController::class, 'viewPosts']);
        Route::get('/course/{id}', [App\Http\Controllers\getCourseController::class, 'showCourseUrl']);
        Route::post('/csv-export', [App\Http\Controllers\exportCSVController::class, 'getFileLink']);
        Route::post('/student-export', [App\Http\Controllers\showStudentToExportController::class, 'getStudentsToExport']);
        Route::POST('/csv-file', [App\Http\Controllers\exportCSVController::class, 'exportCSV']);
        Route::get('/Personinfo', [App\Http\Controllers\HomeController::class, 'index']);
        Route::get('/personalInfoedit', [App\Http\Controllers\personInfoController::class, 'showPersonalInfo'])->name('shoeStudentsToExport');
        Route::post('/personalInfoedit', [App\Http\Controllers\personInfoController::class, 'editStudentInfo']);
        Route::get('/uploadcert', [App\Http\Controllers\uploadCertController::class, 'imageUpload'])->name('image.upload');
        Route::post('/uploadcert', [App\Http\Controllers\uploadCertController::class, 'uploadCert'])->name('FileUpload');
        Route::post('/IrishCert', [App\Http\Controllers\certGeneratorController::class, 'createIrishCert']);
        Route::get('/IrishCert', [App\Http\Controllers\certGeneratorController::class, 'returnCert']);
        Route::post('/email-mass', [App\Http\Controllers\send_Email_to_course::class, 'createIrishCert']);
        Route::get('/email-mass', [App\Http\Controllers\send_Email_to_course::class, 'returnCert']);
        Route::get('/email-mass', [App\Http\Controllers\getStudentstoEmailController::class, 'getStudents']);
        Route::post('/email-mass', [App\Http\Controllers\getStudentstoEmailController::class, 'showStudentsEmails']);
        Route::get('/sendCourseEmail', [App\Http\Controllers\send_Email_to_course::class, 'sendCourseEmail']);
        Route::post('/sendCourseEmail', [App\Http\Controllers\send_Email_to_course::class, 'sendMassCourseEmail']);
        //email
        Route::get('/update-email', [App\Http\Controllers\customEmailModule::class, 'updateCourseEmailView']);
        Route::post('/update-email', [App\Http\Controllers\customEmailModule::class, 'updateCourseEmailPost']);


//});
Route::get('/GDPR/', [App\Http\Controllers\viewGDPRController::class, 'showGDPR'])->name('GDPR');

Route::get('/last-home/', [App\Http\Controllers\viewRegHome::class, 'showRegHome'])->name('registerHome');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'courses'])->name('homeNotLoggedIn');
Route::get('/home-guest', [App\Http\Controllers\unUnuthorisedUserHome::class, 'courses'])->name('home-guest');


Route::get('/course-search', [App\Http\Controllers\searchCourses::class, 'searchCoursesView']);
Route::post('/course-search', [App\Http\Controllers\searchCourses::class, 'searchCourses']);
Route::post('/course-update', [App\Http\Controllers\updateCourse::class, 'updateCourse']);
