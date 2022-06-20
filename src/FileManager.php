<?php

namespace rik3sh\RBFileManager;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    public static function storeFile(object $request, string $folder) 
    {
        $filename = $folder . '-' . Str::uuid() . '.' . $request->getClientOriginalExtension();

        Storage::disk( config('rbfileconfig.disk') )->putFileAs( $folder, $request, $filename );

        return $filename;
    }
}