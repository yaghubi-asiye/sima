<?php

namespace Modules\Satellite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Satellite\Repositories\SatelliteRepository;
use Modules\Satellite\Http\Requests\SatelliteStoreRequest;
class SatelliteController extends Controller
{
    private $satellites;
    public function __construct(SatelliteRepository $satellites)
    {
        $this->satellites = $satellites;
    }

    public function index()
    {
        $data = $this->satellites->all();
        return view('satellite::satellites.index', compact('data'));
    }

    public function store(SatelliteStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->satellites->insert($data);
        $this->satellites->sessionFlash();
        return redirect()->route('satellite.index');
    }

    public function prepareData($request): array
    {
        return [
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ];
    }

}
