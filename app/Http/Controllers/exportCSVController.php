<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Response;
use File;
use DB;
use Aws\S3\S3Client;

class exportCSVController extends Controller
{

    public function getFileLink(){
        return view('csv-file');
    }

    public function exportCSV(Request $request){
        $data = $request->all();
        $students = DB::table('users')->wherein('id', $data['studentToExport'])->get();

        // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly


        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename =  public_path("files/download.csv");

        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "Student Number",
            "Name",
            "Email",
            "Phone",
              "No questions",
              "pain module",
              "result",
              "day 2",
              "exam date day 1",
              "exam date day 2",
              "day 2",
              "exam date day 2",
              "day 2",
              "Cert Issued",
              "Cert Issued",
              "Resit y/n",
              "Passed re sit Y",
              "Exam date",
              "UK Cert",
              "Handling",
              "1st am",
              "1st pm",
              "2nd am",
              "2nd pm",
              "Wildlife  am",
              "Wildlife  pm",
              "Paid",
              "Invoice Number",
              "Large animal sent ",
              "Rodent/aquatic",
              "emailed result",

        ]);

        //adding the data from the array
        foreach ($students as $each_user) {
               if ($each_user->cert_Uploaded) {
                 $certUploaded = 'Yes';
                } else {
                 $certUploaded = 'No';
                }
            fputcsv($handle, [
                $each_user->id,
                $each_user->name,
                $each_user->email,
                $each_user->MobileNumber,
                   '',
                //  $overallResult.' %',
                   '',
                   $each_user->module_0,
                   $each_user->module_1,
                   $each_user->module_2,
                   $each_user->module_3,
                   '',
                   '',
                   '',
                   '',
                   '',
                   '',
                   '',
                   $certUploaded,
            ]);

        }

        $s3 = new S3Client([
            'region' => 'eu-west-1',
            'version' => 'latest',
            'credentials' => [
                'key' => "AKIAIVWODYA4XEWTDUTQ",
                'secret' => "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",
            ]
        ]);
        $result = $s3->putObject([
            'Bucket' => 'last-ireland',
            'Key' => $filename,
            'Body' => fopen($filename, 'r'),
            'ACL' => 'public-read', //for making the public url
        ]);
        echo $result['ObjectURL'];

    }
}
