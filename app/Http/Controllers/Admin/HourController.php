<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HourFormRequest;
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
        return Responses::success("show hours", [
            'data' => $this->hourRepository->getAll()
        ]);
    }

    public function store(HourFormRequest $request)
    {
        $hour = $this->hourRepository->store($request);
        return Responses::success("hour created", [
            'data' => $hour
        ]);
    }

    public function show(Hour $hour)
    {
        return Responses::success("show hour", [
            'data' => $hour
        ]);
    }


    public function update(HourFormRequest $request, Hour $hour)
    {
        $hourUpdated = $this->hourRepository->update($hour, $request);
        return Responses::success("hour updated", [
            'data' => $hourUpdated
        ]);
    }


    public function destroy(Hour $hour)
    {
        $this->hourRepository->delete($hour);
        return Responses::success('success delete hour');

    }
}
