<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileImageManager extends Controller
{
    public function upload(Request $request)
    {

        $file = $_FILES["input_file"]; //image from user's local directory
        $error = $file["error"];
        if ($error == UPLOAD_ERR_OK) { //Evaluates to false if user has selected from avatar list, true if user selected from local file directory.
            echo $error;
            $userId = Auth::user()->id; //Getting the current user ID
            $arr = explode(".", $file["name"]); //Split the file name and extension
            $extension = end($arr); //Get last item in the list which is the extension

            $destinationPath = 'uploads/' . $userId . '.' . $extension; //Name of file in uploads


            //Move the image to the uploads folder
            if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
                // echo "File Upload Success";
                $user = Auth::user();
                $user->profile_photo = $userId . '.' . $extension; //Set user profile photo field to the image path
                $user->save();

            } else {
                echo "Failed to upload file";
            }
        } else {
            //The user selected an image from the list displayed
            $path = $request->get("avatar"); //Get name of the avatar
            $user = Auth::user();
            $user->profile_photo = $path; //Set user profile photo field to the avatar path
            $user->save();
            // echo $path;
        }
    }


}


