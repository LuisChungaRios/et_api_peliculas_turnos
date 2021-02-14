<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hour;
use App\Repositories\HourRepository;
use App\Utils\Responses;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * @var HourRepository
     */
    private $hourRepository;

    public function __construct(HourRepository $hourRepository)
    {
        $this->hourRepository = $hourRepository;
    }

    public function index()
    {
        return Responses::success("show films", [
            'data' => $this->hourRepository->getAll()
        ]);
    }

    public function store(Request $request)
    {
        $this->hourRepository->store($request);
    }

    public function show(Hour $hour)
    {
        return Responses::success("show film", [
            'data' => $hour
        ]);
    }


    public function update(Request $request, Hour $hour)
    {
        $this->hourRepository->update($hour, $request);
    }


    public function destroy(Hour $hour)
    {
        $this->hourRepository->delete($hour);

        return Responses::success('success delete film');

    }
}
