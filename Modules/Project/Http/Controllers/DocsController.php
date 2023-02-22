<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Project\Http\Requests\DocStoreRequest;
use Modules\Project\Repositories\DocRepository;

class DocsController extends Controller
{
    private $docs;
    public function __construct(DocRepository $docs)
    {
        $this->docs = $docs;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|View
     */
    public function index()
    {
        $data = $this->docs->all();
        return view('project::docs.index', compact('data'));
    }

    public function store(DocStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->prepareData($request);
        $this->docs->insert($data);
        $this->docs->sessionFlash();
        return redirect()->route('doc.index');
    }

    public function prepareData($request): array
    {
        $fileName = $this->docs->uploadFile('docs', $request->file('file'));

        $date_start = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date_start);
        return [
            'name' => $request->name,
            'saderKonandeh' => $request->saderKonandeh,
            'user_id' => auth()->user()->id,
            'file' => $fileName,
            'date_start' =>  $date_start,
        ];
    }
}
