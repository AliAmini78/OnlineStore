<?php
//name space
namespace Helper;



class FileUpload
{

    /**
     * the file is exist in our storage function
     *
     * @param [string] $File = the file from input
     * @return string
     */
    public static function ExistFile($File)
    {
        $Pic = null;
        if (file_exists($File['tmp_name'])) {
            $Pic = $File;
        }
        return $Pic;
    }


    /**
     * upload img  function
     *
     * @param [string] $Pic = the img item from input
     * @return string =  the img path 
     */
    public static function  ImgUploader($Pic)
    {
        // validate the exist file
        if (!file_exists($Pic['tmp_name'])) {
            $_SESSION['Message'] = "no file founded";
            return;
        }


          // validate the img direction path 
          if (!is_dir('/uploads')) {
            mkdir('/uploads');
        }

        // declare the img path 
        $ImgUrl = './uploads/' .date("his"). $Pic['name'] ;

        
        // add img to the path 
        $result = move_uploaded_file($Pic['tmp_name'], $ImgUrl);


        // validate the upload result
        if ($result) {
            echo ($ImgUrl);
        } else {
            $_SESSION['Message'] = " there is no path for file";
            return;
        }

        return $ImgUrl;
    }


    /**
     * delete file function
     *
     * @param string $FilePath
     * @return redirect 
     */
    public static function DeleteFile($FilePath)
    {
        if (file_exists($FilePath))
            $result = unlink($FilePath);

        if (!$result) {
            $_SESSION['Message'] = "there is no file for delete";
            return;
        }
    }
}
