<?php


namespace App\Repositories;

use App\Models\Film;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FilmRepository
{
    public function getAll()
    {
        return Film::query()->whereActive(true)->latest()->get();
    }

    public function store($data)
    {
        $film = new Film();
        $film->name = $data->name;
        $film->publication_date = $data->publication_date;
        $film->image = $this->uploadImage($data, $film->name);
        $film->save();
        return $film;
    }

    public function update(Film $film,$data)
    {
        $film->name = $data->name;
        $film->publication_date = $data->publication_date;
        $film->image = $this->uploadImage($data,$film->name ,$film->image);
        $film->save();
        return $film;
    }

    public function delete(Film $film)
    {
        $film->active = false;
        $film->save();
    }

    private function uploadImage($data, $name, $defaultName = "")
    {
        if ($data->file('image')) {
            try {
                $file = $data->file('image');
                $name = strtolower(Str::slug($name));
                $filename = $name.'_'.time().'.'.$file->getClientOriginalExtension();
                Storage::disk('films')->put($filename, File::get($file));
                return $filename;
            } catch (\Exception $e) {
                return "";
            }
        }
        return $defaultName;
    }

}
