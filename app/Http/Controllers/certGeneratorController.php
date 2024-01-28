<?php

namespace App\Http\Controllers;
use App\Models\User;
use Aws\S3\S3Client;
use Elibyy\TCPDF\Facades\TCPDF;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use \ConvertApi\ConvertApi;
use App\Http\Controllers\awsController as Aws;
use App\Http\Controllers\dropboxController as dropBox;

class certGeneratorController extends Controller
{
    public function returnCert(){
        return view('IrishCert');
    }

    public function createIrishCert(Request $request){

        $data = $request->all();
        $user = User::find($data['id'] );

        $Name_X = 90;
        $Name_Y = 70;
        $pdf = new Fpdi();
        $filename = public_path('/PDF/IrishCert.pdf');
        $pdf->addPage('Portrait','A4');
        $pdf->SetDisplayMode('fullpage','default');
        $pdf->setSourceFile($filename);
        $tplIdx =  $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        // use the imported page and place it at position 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx, 1, 1, 210);
        $pdf->SetFont('Arial', '', 18);
        $pdf->SetXY(75, 37);
        $pdf->Write(0, $user->courseModule); //Course Name


        $pdf->SetXY(50, 57);
        $pdf->AddFont('Monotype Corsiva', '', 'Monotype Corsiva.php');
        $pdf->SetFont('Monotype Corsiva', '', 12);
        //Needs to be this size so the course name can fit in
        //         $pdf->Write(0, 'Cert Number: '.$user->id);
        $pdf->SetXY(90, 65);
        $pdf->Write(0, $user->name); //Student Name
        $pdf->SetXY(157, 47);
        $pdf->Write(0, $user->species_specific_1); //Student Name
        $pdf->SetXY(175, 260);
        $pdf->Write(0, 'Scan to verify'); //Student Name
        $pdf->Output(public_path($user->id.".pdf"), 'F');
        $Aws = new Aws();

        ConvertApi::setApiSecret('nzgmPZ4vkWnV4kXj');
        $result = ConvertApi::convert('png', ['File' => public_path(''.$user->id.'.svg')]);
        $result->getFile()->save( public_path(''.$user->id.'.png'));
        $pdf2 = new Fpdi();
        $pdf2->addPage('Portrait','A4');
        $pdf2->SetDisplayMode('fullpage','default');
        $pdf2->setSourceFile(public_path($user->id.".pdf"));
        $tplIdx2 =  $pdf2->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf2->useTemplate($tplIdx2, 1, 1, 210);
        $pdf2->SetFont('Arial', '', 18);
        $pdf2->Image(public_path(''.$user->id.'.png'),170, 220, 30);
        $pdf2->Output(public_path($user->id.".pdf"), 'F');
        $awsFilename = $user->id.".pdf";

        echo $Aws->awsPutFile($awsFilename, $awsFilename) ;



    }

    public function returnLegalCert(){
        return view('LegalCert');
    }

    public function createLegalCert(Request $request) {
        $data = $request->all();
        $user = User::find($data['id'] );
        $pdf = new Fpdi();
        $filename = public_path('/PDF/legal cert.pdf');
        $pdf->addPage('Portrait','A4');
        $pdf->SetDisplayMode('fullpage','default');
        $pdf->setSourceFile($filename);
        $tplIdx =  $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf->useTemplate($tplIdx, 1, 1, 210);
        $Name_X = 90;
        $Name_Y = 107;
        $pdf->AddFont('Monotype Corsiva', '', 'Monotype Corsiva.php');
        $pdf->SetFont('Monotype Corsiva', '', 12);
        $Aws = new Aws();

        $pdf->SetXY(74, 37);
        $pdf->Write(0, $user->name); //Course Name
        $pdf->SetXY(161, 48.5);
        $pdf->Write(0,  $user->species_specific_1); //Type of handling
        $pdf->SetXY(10, 60);
        $pdf->SetFont('Times', '', 12);
        $pdf->Write(0, 'Cert Number: '.$user->id); //Student Name
        $pdf->SetXY($Name_X, $Name_Y);
        $pdf->Write(0, $user->name); //Student Name
        $pdf->Output(public_path("".$user->id." Legal.pdf"), 'F');
        $awsFilename = public_path("".$user->id." Legal.pdf");
        $user->aws_link = $Aws->awsPutFile($filename, $awsFilename);
        $user->save();
        echo $Aws->awsPutFile($filename, $awsFilename) ;


    }

    public function returnDay1() {
        return view('createDay1Cert');
    }

    public function createDay1Cert(Request $request) {
        $data = $request->all();
        $user = User::find($data['id'] );
        $pdf = new Fpdi();
        $filename = public_path('/PDF/Day 1.pdf');
        $pdf->addPage('Portrait','A4');
        $pdf->SetDisplayMode('fullpage','default');
        $pdf->setSourceFile($filename);
        $tplIdx =  $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf->useTemplate($tplIdx, 1, 1, 210);
        $Name_X = 90;
        $Name_Y = 107;
        $pdf->AddFont('Monotype Corsiva', '', 'Monotype Corsiva.php');
        $pdf->SetFont('Monotype Corsiva', '', 12);
        $Aws = new Aws();

        $pdf->SetXY(74, 37);
        $pdf->Write(0, $user->name); //Course Name
        $pdf->SetXY(161, 48.5);
        $pdf->Write(0,  $user->species_specific_1); //Type of handling
        $pdf->SetXY(10, 60);
        $pdf->SetFont('Times', '', 12);
        $pdf->Write(0, 'Cert Number: '.$user->id); //Student Name
        $pdf->SetXY($Name_X, $Name_Y);
        $pdf->Write(0, $user->name); //Student Name
        $pdf->Output(public_path("".$user->id." Day 1.pdf"), 'F');
        $awsFilename = public_path("".$user->id." Day 1.pdf");
        $user->aws_link = $Aws->awsPutFile($filename, $awsFilename);
        $user->save();
        echo $Aws->awsPutFile($filename, $awsFilename);
    }

    public function returnDay2() {
        return view('createDay2Cert');
    }


    public function createDay2Cert(Request $request) {
        $data = $request->all();
        $user = User::find($data['id'] );
        $pdf = new Fpdi();
        $filename = public_path('/PDF/Day 2 Cert.pdf');
        $pdf->addPage('Portrait','A4');
        $pdf->SetDisplayMode('fullpage','default');
        $pdf->setSourceFile($filename);
        $tplIdx =  $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf->useTemplate($tplIdx, 1, 1, 210);
        $Name_X = 90;
        $Name_Y = 107;
        $pdf->AddFont('Monotype Corsiva', '', 'Monotype Corsiva.php');
        $pdf->SetFont('Monotype Corsiva', '', 12);
        $Aws = new Aws();

        $pdf->SetXY(74, 37);
        $pdf->Write(0, $user->name); //Course Name
        $pdf->SetXY(161, 48.5);
        $pdf->Write(0,  $user->species_specific_1); //Type of handling
        $pdf->SetXY(10, 60);
        $pdf->SetFont('Times', '', 12);
        $pdf->Write(0, 'Cert Number: '.$user->id); //Student Name
        $pdf->SetXY($Name_X, $Name_Y);
        $pdf->Write(0, $user->name); //Student Name
        $pdf->Output(public_path("".$user->id." Day 2.pdf"), 'F');
        $awsFilename = public_path("".$user->id." Day 2.pdf");
        $user->aws_link = $Aws->awsPutFile($filename, $awsFilename);
        $user->save();
        echo $Aws->awsPutFile($filename, $awsFilename) ;
    }



}
