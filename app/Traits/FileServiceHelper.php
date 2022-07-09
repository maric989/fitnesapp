<?php

namespace App\Traits;

use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Http\UploadedFile;

trait FileServiceHelper
{
    private function makeDirectory(string $path)
    {
        FileFacade::makeDirectory($path, 0755, true, true);
    }

    private function generateName(UploadedFile $file)
    {
        return md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
    }
}
