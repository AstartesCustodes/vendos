<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;


use Validator;

class Core extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDirList()
    {
        echo '<pre>';
        $dst = 'I:\20.02';
        #$file = fopen($dst, "r") or die("bad");
        $files1 = scandir($dst) ;
        print_r($files1);

        echo '</pre>';
       # echo __METHOD__;
    }

    public function getDeviceStat()
    {

        function dir_is_empty($dir) {
            $handle = opendir($dir);
            while (false !== ($entry = readdir($handle))) {
              if ($entry != "." && $entry != "..") {
                closedir($handle);
                return FALSE;
              }
            }
            closedir($handle);
            return TRUE;
          }

        $status = 0 ;
        $attempts = 0;
        $dir = 'I:\te';

        while ($status != 1 && $attempts <= 5)
        {

            if (dir_is_empty($dir)) {
                //echo "the folder is empty"; 
            }
            else{
                $status = 1;
  
            }
            $attempts++;
            sleep(2);        
        }
        echo $status;
    }
    public function file_or_dir($path)
    {
       
        
        // checking whether a file is directory or not 
        if (is_dir($path)) 
            echo ("$path is a directory"); 
        else
            echo ("$path is not a directory");

    }
    public function download($path)
    {
        try
        {
            return response()->download($path);   
        }
        catch (\Exception $e)
        {
            echo "fail";
        }
        
    }

   
}
