<?php

namespace App\Services;

use App\Models\Coach;
use App\Models\Difficulty;
use App\Models\Focus;
use App\Models\Intensity;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractAdminFacade
{
    public function getIntensity(): Collection
    {
        return Intensity::all();
    }

    public function getDifficulty(): Collection
    {
        return Difficulty::all();
    }

    public function getCoaches(): Collection
    {
        return Coach::all();
    }

    public function getFocuses(): Collection
    {
        return Focus::all();
    }
}
