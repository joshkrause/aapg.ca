<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RedactorController extends Controller
{
	/*
	* Images incoming from redactor text area
	*/
    public function uploadImage()
    {

        $UploadDirectory = '/uploads/images/redactor/';
        $file = $_FILES['file'];
        $NewFileName = $this->sanitize($file['name'][0]);
        if(file_exists(public_path() . $UploadDirectory.$NewFileName)) {
            unlink(public_path() . $UploadDirectory.$NewFileName);
        }
        if (move_uploaded_file($file['tmp_name'][0], public_path() . $UploadDirectory . $NewFileName)) {
            $image = $UploadDirectory.$NewFileName;
            $files = array();
            $files['0']['0'] = [
                'url' => $image,
                'id' => 1
            ];
            return response()->json($files);
        }
    }

	/*
	* Files incoming from redactor text area
	*/
    public function uploadFile()
    {
	    $UploadDirectory = '/uploads/files/redactor/';
        $file = $_FILES['file'];
        $NewFileName = $this->sanitize($file['name'][0]);
        if(file_exists(public_path() . $UploadDirectory.$NewFileName)) {
            unlink(public_path() . $UploadDirectory.$NewFileName);
        }
        if (move_uploaded_file($file['tmp_name'][0], public_path() . $UploadDirectory . $NewFileName)) {
            $image = $UploadDirectory.$NewFileName;
            $files = array();
            $files['0']['0'] = [
                'url' => $image,
                'id' => 1
            ];
            return response()->json($files);
        }
    }

    /*
    * When a file is uploaded via redactor, save it with a unique name at the given path
    * file: the incoming uploaded file
    * path: where the file should be saved
    * returns: the name of the file
    */
    public function saveFile($file)
    {
    	$filePath = base_path() . '/public/uploads/files/redactor/';
        $filename = $file->getClientOriginalName();
        $file->move($filePath , $filename);
        return $filename;
    }

    function sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                       "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                       "â€”", "â€“", ",", "<", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

}
