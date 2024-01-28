<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use \ConvertApi\ConvertApi;
use App\Http\Controllers\awsController as Aws;

class LegalCertGenerator extends Controller
{


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
        echo $Aws->awsPutFile($filename, $awsFilename) ;



    }
}
