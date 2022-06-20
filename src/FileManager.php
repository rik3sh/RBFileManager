<?php

namespace rik3sh\RBFileManager;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    public static function storeFile(object $request, string $folder) 
    {
        $filename = $folder . '-' . Str::uuid() . '.' . $request->getClientOriginalExtension();

        Storage::disk( config('rbfileconfig.disk', 'public') )->putFileAs($folder, $request, $filename);

        return $filename;
    }

    public static function updateFile(object $request, string $folder, string $oldFile = null)
    {
        if (!empty($oldFile)) self::deleteFile($folder, $oldFile);

        $fileName = $folder . '-' . Str::uuid() . '.' . $request->getClientOriginalExtension();
        
        Storage::disk( config('rbfileconfig.disk', 'public') )->putFileAs(
            $folder, $request, $fileName
        );

        return $fileName;
    }

    public static function deleteFile(string $folder, string $filename)
    {
        $filePath = $folder . '/' . $filename;

        if (self::fileExists($folder, $filename)) Storage::disk( config('rbfileconfig.disk', 'public') )->delete($filePath);

        return;
    }


    private function fileExists(string $folder, string $filename)
    {
        $filePath = $folder . '/' . $filename;
        return Storage::disk( config('rbfileconfig.disk', 'public') )->exists($filePath);
    }
}