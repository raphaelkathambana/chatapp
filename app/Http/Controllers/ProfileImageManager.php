<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileImageManager extends Controller
{
    public function upload(Request $request)
    {

        $file = $_FILES["input_file"];
        $error = $file["error"];
        if ($error == UPLOAD_ERR_OK) {
        $userId = Auth::user()->id;
        $arr = explode(".", $file["name"]);
        $extension = end($arr);
        
        $destinationPath = 'uploads/'. $userId . '.' . $extension;
        
        if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
            echo "File Upload Success";
            $user = Auth::user();
            $user ->profile_photo = $userId . '.' . $extension;
            $user->save();
            
        } else {
            echo "Failed to upload file";
        }
    } else { 
        $path = $request -> get("avatar");
        $user = Auth::user();
        $user ->profile_photo = $path;
        $user->save();
        echo "Upload success";
    }
    }

    
}


