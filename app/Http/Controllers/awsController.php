<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;
use Illuminate\Http\Request;

class awsController extends Controller
{
    public function awsPutFile($filename, $awsFilename) {
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

        return $result['ObjectURL'];
    }
}
