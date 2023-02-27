<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static $Days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday', 'Sunday');

    public static function fileStore($file, $filePath, $fileName = null, $disk = 'public')
    {
        if ($file != null) {
            $fileName = ($fileName ?? date('YmdHis')) . '.' . $file->extension();
            $fullPath = $filePath . $fileName;
            Storage::disk($disk)->put($fullPath, file_get_contents($file));
            return $fullPath;
        } else {
            return $file;
        }
    }

    public static function fileDelete($fullPath, $disk = 'public')
    {
        if ($fullPath != null) {
            Storage::disk($disk)->delete($fullPath);
        }
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

    /**
     * @param \Carbon\Carbon|string $dateStart 
     * @param \Carbon\Carbon|string $dateEnd 
     * @param bool $showDay
     * 
     * @return string $result
     */
    public static function dateFormatMonthYear($dateStart = null, $dateEnd = null, $showDay = false)
    {
        $dateStart = Carbon::parse($dateStart);
        $dateEnd = Carbon::parse($dateEnd);

        $result = "";
        if ($showDay == true) {
            $result .= $dateStart->format('d') . ' ';
        }
        if ($dateStart->format('m') != $dateEnd->format('m')) {
            $result .= $dateStart->format('F');
            if ($dateStart->format('Y') != $dateEnd->format('Y')) {
                $result .= ' ' . $dateStart->format('Y');
            }
        }
        if ($showDay == true || $dateStart->format('m') != $dateEnd->format('m')) {
            $result .= ' - ';
        }
        if ($showDay == true) {
            $result .= $dateEnd->format('d') . ' ';
        }
        return $result .= $dateEnd->format('F Y');
    }
}
