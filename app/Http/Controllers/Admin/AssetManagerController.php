<?php

namespace App\Http\Controllers\Admin;

use Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BuilderModuleRequest;

class AssetManagerController extends Controller
{
	// when there is a post to /admin/server/filemgn.php or /admin/server/upload.php, this method will deal with the request rather than trying to load the file.
	// note: may need to add the following line to the nginx config in the location ~ \.php$ block after "include fastcgi_params;":
	// fastcgi_param SCRIPT_FILENAME $document_root/index.php;

    // these files just echo the values instead of returning so we must execute the php and return the std out.
    // $file could be filemgn.php or upload.php
    public function file($file)
    {
        ob_start();
        require(public_path("/admin_assets/plugins/innovamgrpro/server/".$file));
        return ob_get_clean();
    }

    public function manage()
    {
    	return view('admin/asset-manager.assetmain');
    }

    public function saveImages(BuilderModuleRequest $request)
    {
        $count = $request->input('count');
        $file = $request->input('hidname-' . $count) . "." . $request->input('hidtype-' . $count);
        Storage::put('uploads/asset-manager/images/' . $file, base64_decode( $request->input('hidimg-' . $count) ));

        return "<html><body onload=\"parent.document.getElementById('img-" . $count . "').setAttribute('src', '/storage/uploads/asset-manager/images/" . $file . "');  parent.document.getElementById('img-" . $count . "').removeAttribute('id') \"></body></html>";
    }

    public function saveLargeImages(BuilderModuleRequest $request)
    {
        $count = $request->input('count');
        $file = $request->input('hidname-' . $count) . "." . $request->input('hidtype-' . $count);
        Storage::put('uploads/asset-manager/large-images/' . $file, base64_decode( $request->input('hidimg-' . $count) ));

        return "<html><body onload=\"parent.document.getElementById('img-" . $count . "').setAttribute('src', '/storage/uploads/asset-manager/large-images/" . $file . "');  parent.document.getElementById('img-" . $count . "').removeAttribute('id') \"></body></html>";
    }

    public function saveModuleImages(BuilderModuleRequest $request)
    {
        $path = $request->file('fileImage')->store('uploads/asset-manager/sliders');

        return "<html><body onload=\"parent.sliderImageSaved('/storage/" . $path . "')\"></body></html>";
    }
}
