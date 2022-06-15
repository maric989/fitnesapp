<?php

namespace App\Services\File;

use App\Models\File;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File as FileFacade;
use Intervention\Image\Facades\Image;

class FileService
{
    private $config;

    public function __construct()
    {
        $this->config = config('images');
    }

    public function addProgramCoverImage(Program $program, UploadedFile $file)
    {
        $path = sprintf($this->config['program']['cover_image']['store-path'] , $program->id);
        FileFacade::makeDirectory($path, 0755, true, true);
        $fileName = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($path . '/'. $fileName);

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['program']['cover_image']['save-path'], $program->id, $fileName)
        ]);
    }

    public function addLessonCoverImage(Lesson $lesson, UploadedFile $file)
    {
        $path = sprintf($this->config['lesson']['cover_image']['store-path'] , $lesson->id);
        FileFacade::makeDirectory($path, 0755, true, true);
        $fileName = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        Image::make($file)->save($path . '/'. $fileName);

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['lesson']['cover_image']['save-path'], $lesson->id, $fileName)
        ]);
    }
}
