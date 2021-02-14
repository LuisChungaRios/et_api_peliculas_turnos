<?php


namespace App\Repositories;

use App\Models\Hour;
class HourRepository
{
    public function getAll()
    {
        return Hour::query()->latest();
    }

    public function store($data)
    {
        $hour = new Hour();
        $hour->hour = $data->name;
        $hour->save();
        return $hour;
    }

    public function update(Hour $hour,$data)
    {
        $hour->hour = $data->name;
        $hour->save();
    }

    public function delete(Hour $hour)
    {
        $hour->active = false;
    }


}
