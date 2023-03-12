<?php

namespace Modules\Satellite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Satellite\Repositories\SfloatRepository;
use Modules\Satellite\Entities\Satellite;
use Modules\Satellite\Http\Requests\SfloatStoreRequest;

class SfloatController extends Controller
{
    private $satellites;
    public function __construct(SfloatRepository $satellites)
    {
        $this->satellites = $satellites;
    }

    public function index()
    {
        $data = $this->satellites->getBy('parent_id', 0);
        $satellites = Satellite::all();
        return view('satellite::sfloats.index', compact('data', 'satellites'));
    }

    public function progressList($filter)
    {
        
        // $data = $this->satellites->getByFilter('parent_id', 0, 'status', $filter);
        $data = $this->satellites->getBy('status', $filter);
        $satellites = Satellite::all();
        return view('satellite::sfloats.progressList', compact('data', 'satellites', 'filter'));
    }

    public function store(SfloatStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->satellites->insert($data);
        $this->satellites->sessionFlash();
        return redirect()->route('sfloat.index');
    }

    public function statusUpdate(Request $request, $id)
    {
        if($request->active == '1') 
        {
            if($request->status == 'شناور')
                $status = 'مالی';
            elseif($request->status == 'مالی')
                $status = 'فنی';
            elseif($request->status == 'فنی')
                $status = 'مدیریت';
        } else 
        {
            $status = 'شناور';
        } 
        $model = $this->satellites->find($id);
        $this->satellites->updateStatus($model, $status);
        $this->satellites->sessionFlash();
        return redirect()->back();
    }


    public function prepareData($request): array
    {

        $date_start = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date_start);
        $date_end = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date_end);
        $status = 'شناور';
        return [
            'user_id' => auth()->user()->id,
            'date_start' =>  $date_start,
            'date_end' =>  $date_end,
            'status' =>  $status,
            'parent_id' =>  $request->parent_id,
            'name' => $request->name,
            'satellite_id' => $request->satellite_id,
            'hole_band' => $request->hole_band,
            'upload' => $request->upload,
            'name_service' => $request->name_service,
            'download' =>  $request->download,
        ];
    }
}
