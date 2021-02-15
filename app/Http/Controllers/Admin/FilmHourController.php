<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilmHourFormRequest;
use App\Models\FilmHour;
use App\Repositories\FilmHourRepository;
use App\Repositories\HourRepository;
use App\Utils\Responses;
use Illuminate\Http\Request;

class FilmHourController extends Controller
{

    /**
     * @var HourRepository
     */
    private $filmHourRepository;

    public function __construct(FilmHourRepository $filmHourRepository)
    {
        $this->filmHourRepository = $filmHourRepository;
    }

    public function index()
    {
        return Responses::success("show hours", [
            'data' => $this->filmHourRepository->getAll()
        ]);
    }

    public function store(FilmHourFormRequest $request)
    {
        if ($this->alreadyExistFilmHour($request->hour_id, $request->film_id)) {
            return Responses::error('Already exist filmHour', 400);
        }
        $filmHour = $this->filmHourRepository->store($request);
        return Responses::success("hour created", [
            'data' => $filmHour
        ]);
    }

    public function show(FilmHour $filmhour)
    {

        return Responses::success("show film hour", [
            'data' => $filmhour
        ]);
    }


    public function update(FilmHourFormRequest $request, FilmHour $filmhour)
    {
        if ($this->filmHourNotEquals($filmhour, $request)) {
            if ($this->alreadyExistFilmHour($request->hour_id, $request->film_id)) {
                return Responses::error('Already exist filmHour', 400);
            }
        }

        $filmHourUpdated = $this->filmHourRepository->update($filmhour, $request);
        return Responses::success("hour updated", [
            'data' => $filmHourUpdated
        ]);

    }


    public function destroy(FilmHour $filmhour)
    {
        $this->filmHourRepository->delete($filmhour);
        return Responses::success('success delete hour');

    }

    private function alreadyExistFilmHour($hourId, $filmId) :bool
    {
        $filmHour = FilmHour::query()->whereHourId($hourId)->whereFilmId($filmId)->first();
        if (! empty($filmHour)) return true;
        return false;
    }

    private function filmHourNotEquals($filmhour, $request)
    {
        return $filmhour->hour_id != $request->hour_id || $filmhour->film_id != $request->film_id;
    }

}
