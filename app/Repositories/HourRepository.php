<?php


namespace App\Repositories;

use App\Models\Hour;
class HourRepository
{
    public function getAll()
    {
        return Hour::query()->whereActive(true)->latest()->get();
    }

    public function store($data)
    {
        $hour = new Hour();
        $hour->hour = $data->hour;
        $hour->active = $data->active;
        $hour->save();
        return $hour;
    }

    public function update(Hour $hour,$data)
    {
        $hour->hour = $data->hour;
        $hour->active = $data->active;
        $hour->save();
        return $hour;
    }

    public function delete(Hour $hour)
    {
        $hour->active = false;
        $hour->save();
    }


}
