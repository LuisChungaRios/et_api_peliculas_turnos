<?php


namespace App\Repositories;

use App\Models\FilmHour;
class FilmHourRepository
{
    public function getAll()
    {
        return FilmHour::query()->whereActive(true)->latest()->get();
    }

    public function store($data)
    {
        $filmHour = new FilmHour();
        $filmHour->hour_id = $data->hour_id;
        $filmHour->film_id = $data->film_id;
        $filmHour->save();
        return $filmHour;
    }

    public function update(FilmHour $filmHour,$data)
    {
        $filmHour->hour_id = $data->hour_id;
        $filmHour->film_id = $data->film_id;
        $filmHour->save();
        return $filmHour;
    }

    public function delete(FilmHour $filmHour)
    {
            $filmHour->active = false;
            $filmHour->save();

    }


}
