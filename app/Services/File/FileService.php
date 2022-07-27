<?php

namespace App\Services\File;

use App\Models\Coach;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Program;
use App\Traits\FileServiceHelper;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class FileService
{
    use FileServiceHelper;

    private $config;

    public function __construct()
    {
        $this->config = config('images');
    }

    public function addProgramCoverImage(Program $program, UploadedFile $file)
    {
        $path = sprintf($this->config['program']['cover_image']['store-path'] , $program->id);
        $this->makeDirectory($path);
        $fileName = $this->generateName($file);
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
        $this->makeDirectory($path);
        $fileName = $this->generateName($file);
        Image::make($file)->save($path . '/'. $fileName);

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['lesson']['cover_image']['save-path'], $lesson->id, $fileName)
        ]);
    }

    public function updateProgramCoverImage(Program $program, UploadedFile $file)
    {
        $path = sprintf($this->config['program']['cover_image']['store-path'] , $program->id);
        $fileName = $this->generateName($file);
        Image::make($file)->save($path . '/'. $fileName);
        File::where('id', $program->cover_id)->delete();

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['program']['cover_image']['save-path'], $program->id, $fileName)
        ]);
    }

    public function updateLessonCoverImage(Lesson $lesson, UploadedFile $file)
    {
        $path = sprintf($this->config['lesson']['cover_image']['store-path'] , $lesson->id);
        $fileName = $this->generateName($file);
        Image::make($file)->save($path . '/'. $fileName);
        File::where('id', $lesson->cover_image_id)->delete();

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['lesson']['cover_image']['store-path'], $lesson->id, $fileName)
        ]);
    }

    public function addCoachProfileImage(Coach $coach, UploadedFile $file)
    {
        $path = sprintf($this->config['coach']['profile_picture']['store-path'] , $coach->id);
        $this->makeDirectory($path);
        $fileName = $this->generateName($file);
        Image::make($file)->save($path . '/'. $fileName);

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['coach']['profile_picture']['save-path'], $coach->id, $fileName)
        ]);
    }

    public function updateCoachProfileImage(Coach $coach, UploadedFile $file)
    {
        $path = sprintf($this->config['coach']['profile_picture']['store-path'] , $coach->id);
        $this->makeDirectory($path);
        $fileName = $this->generateName($file);
        Image::make($file)->save($path . '/'. $fileName);
        File::where('id', $coach->profile_picture_id)->delete();

        return File::create([
            'size' => $file->getSize(),
            'name' => $fileName,
            'type' => $file->getMimeType(),
            'full_path' => sprintf($this->config['coach']['profile_picture']['save-path'], $coach->id, $fileName)
        ]);
    }


}
