<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class AdminHelper
{
    public static function storageFileExist($file_path)
    {
        $file_dir = null;
        if ($file_path) {
            $path_arr = preg_split("/\/storage/", $file_path);
            if (count($path_arr) > 1) {
                $path = "storage" . end($path_arr);
            } else {
                $path = end($path_arr);
            }

            if (File::exists(public_path($path))) {
                $file_dir = $path;
            }
        }
        return $file_dir;
    }

    public static function tableLength($data)
    {
        $html = "<span class='text-muted'>Displaying items from " . $data->currentPage() . " to " . $data->perPage() . " of total " . $data->total() . " items</span>";

        echo $html;
    }
}
