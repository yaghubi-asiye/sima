<?php

namespace Modules\Satellite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Satellite\Entities\Sfloat;
use Modules\Satellite\Repositories\FactorRepository;
use Modules\Satellite\Http\Requests\FactorRequest;

class FactorController extends Controller
{
    private $factors;
    public function __construct(FactorRepository $factors)
    {
        $this->factors = $factors;
    }

    public function index()
    {
        $floats = Sfloat::all();
        $data = $this->factors->all();
        return view('satellite::factors.index', compact('data', 'floats'));
    }

    public function store(FactorRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->factors->insert($data);
        $this->factors->sessionFlash();
        return redirect()->route('sfloatfactor.index');
    }

    public function prepareData($request): array
    {
        $date = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date);
        return [
            'all_price' => $request->all_price,
            'unit_price' => $request->unit_price,
            'date' => $date,
            'number' => $request->number,
            'sfloat_id' => $request->sfloat_id,
            'user_id' => auth()->user()->id,
        ];
    }
}
