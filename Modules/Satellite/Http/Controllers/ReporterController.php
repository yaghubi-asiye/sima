<?php

namespace Modules\Satellite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Satellite\Http\Requests\ReporterRequest;
use Modules\Satellite\Repositories\ReporterRepository;
use Modules\Satellite\Entities\Sfloat;

class ReporterController extends Controller
{
    private $reporters;
    public function __construct(ReporterRepository $reporters)
    {
        $this->reporters = $reporters;
    }

    public function index()
    {
        $floats = Sfloat::all();
        $data = $this->reporters->all();
        return view('satellite::reporters.index', compact('data', 'floats'));
    }

    public function store(ReporterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->reporters->insert($data);
        $this->reporters->sessionFlash();
        return redirect()->route('sfloatreporter.index');
    }

    public function prepareData($request): array
    {
        $date = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date);
        return [
            'sfloat_id' => $request->sfloat_id,
            'date' => $date,
            'hour' => $request->hour,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ];
    }
}
