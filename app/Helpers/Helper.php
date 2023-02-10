<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function fileStore($file, $filePath, $fileName = null, $disk = 'public')
    {
        $fileName = ($fileName ?? date('YmdHis')) . '.' . $file->extension();
        $fullPath = $filePath . $fileName;
        Storage::disk($disk)->put($fullPath, file_get_contents($file));
        return $fullPath;
    }

    public static function fileDelete($fullPath, $disk = 'public')
    {
        Storage::disk($disk)->delete($fullPath);
    }

    public static function fileUpdate($oldFullPath, $file, $filePath, $filename = null, $disk = 'public')
    {
        if ($file != null) {
            self::fileDelete($oldFullPath);
            return self::fileStore($file, $filePath, $filename, $disk);
        } else {
            return $oldFullPath;
        }
    }
}
