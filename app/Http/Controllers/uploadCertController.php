<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use DB;
use App\Mail\uploadCertEmail;
use Mail;
class uploadCertController extends Controller
{
    public function imageUpload()
    {
        return view('uploadcert');
    }
    public function showCertAsUploaded(Request $request){

        $data = $request->all();
        $student = User::find($data['id']);
            if ($data['id']) {
                $student->cert_Uploaded = 1;
                $student->save();

                  //  Mail::to($student->email)->send(new uploadCertEmail($student));

            }
    }
}
