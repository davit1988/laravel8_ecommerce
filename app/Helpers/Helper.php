<?php


namespace App\Helpers;


class Helper
{
    public static function FileUpload($file, $folder_name)
    {
        $filename = time().rand().'.'.$file->getClientOriginalExtension();
        $location =  public_path().'/uploads/'.$folder_name;
        $file->move($location,$filename);
        return $filename;
    }

}
