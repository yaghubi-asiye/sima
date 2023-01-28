<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Project\Http\Requests\SheetStoreRequest;
use Modules\Project\Repositories\SheetRepository;

class SheetController extends Controller
{
    private $sheets;
    public function __construct(SheetRepository $sheets)
    {
        $this->sheets = $sheets;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|View
     */
    public function index()
    {
        $data = $this->sheets->getBy('user_id', auth()->id());
        return view('project::sheets.index', compact('data'));
    }

    public function store(SheetStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->sheets->insert($data);
        $this->sheets->sessionFlash();
        return redirect()->route('sheet.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('project::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function prepareData($request): array
    {
        $rows = $request->input('row');

        foreach ($rows as $row)
        {

            $objects[] = [
                'user_id' => auth()->id(),
                'description' => $row['description'],
                'day' => $row['day'],
                'date' => $row['date'],
                'subject' => $row['subject'],
                'result' => $row['result'],
                'start_time' => $row['start_time'],
                'end_time' => $row['end_time'],
            ];
        }
        return $objects;
    }
}
