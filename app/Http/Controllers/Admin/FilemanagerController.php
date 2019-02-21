<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilemanagerController extends Controller
{
    public function index()
    {
        $directory = [];
        $files = scandir(public_path('uploads/files/redactor'));
        $i=0;
        foreach($files as $file)
        {
            if($file != '.' && $file != '..')
            {
                $filesize = filesize("uploads/files/redactor/" . $file);
                $f['title'] = $file;
                $f['name'] = $file;
                $f["url"] = "/uploads/files/redactor/" . $file;
                $f["id"] = $i++;
                $f["size"] = round($filesize / 1024 / 1024, 1) . "MB";

                array_push($directory, $f);
            }
        }
        return json_encode($directory);
    }

    public function images()
    {
        $directory = [];
        $files = scandir(public_path('uploads/images/redactor'));
        $i=0;
        foreach($files as $file)
        {
            if($file != '.' && $file != '..')
            {
                $f['title'] = $file;
                $f["url"] = "/uploads/images/redactor/" . $file;
                $f["thumb"] = "/uploads/images/redactor/" . $file;
                $f["id"] = $i++;

                array_push($directory, $f);
            }
        }
        return response()->json($directory);
    }
}
