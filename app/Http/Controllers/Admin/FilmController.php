<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Repositories\FilmRepository;
use App\Utils\Responses;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    /**
     * @var FilmRepository
     */
    private $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function index()
    {
        return Responses::success("show films", [
            'data' => $this->filmRepository->getAll()
        ]);
    }



    public function store(Request $request)
    {
       $film = $this->filmRepository->store($request);
        return Responses::success("success create", [
            'data' => $film
        ]);
    }

    public function show(Film $film)
    {
        return Responses::success("show film", [
            'data' => $film
        ]);
    }


    public function update(Request $request, Film $film)
    {
        $filmUpdated = $this->filmRepository->update($film, $request);
        return Responses::success("success create", [
            'data' => $filmUpdated
        ]);
    }


    public function destroy(Film $film)
    {
       $this->filmRepository->delete($film);

        return Responses::success('success delete film');

    }
}
