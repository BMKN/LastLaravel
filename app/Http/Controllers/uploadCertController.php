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
    public function uploadCert(Request $request){
        $creds = DB::table('aws_details')->where('id', 3)->get()->first();

        $data = $request->all();
        $student = User::find($data['student-cert-id']);
        if ($request->hasFile('Cert')) {
            $file = $request->file('Cert');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('/Uploads'), $filename);


            $s3 = new S3Client([
                'region' => 'eu-west-1',
                'version' => 'latest',
                'credentials' => [
                    'key' => $creds->aws_key,
                    'secret' => $creds->aws_secret,
                ]
            ]);
            $result = $s3->putObject([
                'Bucket' => $creds->aws_bucket,
                'Key' => '/Uploads/' . $filename,
                'Body' => fopen(public_path('/Uploads/' . $filename), 'r'),
                'ACL' => 'public-read', //for making the public url
            ]);

            $student = User::find($data['student-cert-id']);
            if ($result['ObjectURL']) {
                $student->cert_Uploaded = 1;
                $student->aws_link = $result['ObjectURL'] ;
                $student->save();
                $successMessage = $filename . ' Has been uploaded Successfully';
                if(isset($data['send-upload-email-cert']) == "1") {
                    Mail::to($student->email)->send(new uploadCertEmail($student));
                    }
                return view('edit')->with('successMessage', $successMessage);


            } else {
                $errorMessage = $filename . ' Has not uploaded yet';
                return view('edit')->with('errorMessage', $errorMessage);

            }


        }



    }
}
