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


       // $png = base64_encode($png);
        $pdf->SetXY(50, 57);
        $pdf->AddFont('Monotype Corsiva', '', 'Monotype Corsiva.php');
        $pdf->SetFont('Monotype Corsiva', '', 12);//Needs to be this size so the course name can fit in         $pdf->Write(0, 'Cert Number: '.$user->id);
        $pdf->SetXY(90, 65);
        $pdf->Write(0, $user->name); //Student Name
        $pdf->SetXY(157, 47);
        $pdf->Write(0, $user->species_specific_1); //Student Name
        $pdf->SetXY(175, 260);
        $pdf->Write(0, 'Scan to verify'); //Student Name
        $pdf->Output(public_path("".$user->id.".pdf"), 'F');

        $awsFilename = public_path("".$user->id.".pdf");
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
            'Key' => '/Uploads/' . $filename,
            'Body' => fopen($awsFilename, 'r'),
            'ACL' => 'public-read', //for making the public url
        ]);

        QrCode::size(512)->generate($result['ObjectURL'],public_path(''.$user->id.'.svg'));
        ConvertApi::setApiSecret('SS15Kgvgi8KpVnud');
        $result = ConvertApi::convert('png', ['File' => public_path(''.$user->id.'.svg')]);
        $result->getFile()->save( public_path(''.$user->id.'.png'));
        $pdf2 = new Fpdi();
        $pdf2->addPage('Portrait','A4');
        $pdf2->SetDisplayMode('fullpage','default');
        $pdf2->setSourceFile($user->id.'.pdf');
        $tplIdx2 =  $pdf2->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        // use the imported page and place it at position 10,10 with a width of 100 mm
        $pdf2->useTemplate($tplIdx2, 1, 1, 210);
        $pdf2->SetFont('Arial', '', 18);
        $pdf2->Image(public_path(''.$user->id.'.png'),170, 220, 30);
        $pdf2->Output(public_path("".$user->id.".pdf"), 'F');

        $awsFilename2 = public_path("".$user->id.".pdf");

        $s3 = new S3Client([
            'region' => 'eu-west-1',
            'version' => 'latest',
            'credentials' => [
                'key' => "AKIAIVWODYA4XEWTDUTQ",
                'secret' => "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",
            ]
        ]);
        $result2 = $s3->putObject([
            'Bucket' => 'last-ireland',
            'Key' => $awsFilename2,
            'Body' => fopen($awsFilename2, 'r'),
            'ACL' => 'public-read', //for making the public url
        ]);
        echo $result2['ObjectURL'] ;

    }
}
