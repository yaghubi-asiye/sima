<?php

namespace Modules\Archive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Archive\Entities\Archive;

class ArchiveController extends Controller
{

    public function index($type)
    {
        $archives = Archive::where('type', $type)->get();
        return view('archive::archives', compact('archives', 'type'));

    }

    public function store(Request $request)
    {

        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('storage/archive', $fileName);
        }else{
            $fileName = "nothing";
        }

        $phoneBook = Archive::forceCreate([
            'type' => $request->type,
            'number' => $request->number,
            'file' => 'storage/archive/' .$fileName,
            'meetingDate' => \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date),

        ]);

        $this->responseMessage( 'انجام شد', 'صورتجلسه باموفقیت در سیستم آپدیت شد', 'success');

        return redirect()->back();

    }



    public function update(Request $request, $id)
    {
        $phoneBook = Archive::findOrFail($id);

        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/archive', $attachmentFileName);

            // if (file_exists(($phoneBook->file)))
            //     unlink($phoneBook->contractorFile);

            $phoneBook->file = 'storage/archive/' . $attachmentFileName;

        }

        $phoneBook->number = $request->number;
        $phoneBook->meetingDate = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->date);
        $phoneBook->update();
        $this->responseMessage( 'انجام شد', 'صورتجلسه باموفقیت در سیستم آپدیت شد', 'success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        if (\Auth::user()->id == 6 OR \Auth::user()->id == 36 OR \Auth::user()->id == 48){

            $contract = Archive::findOrFail($id);
            $contract->delete();
            $this->responseMessage('انجام شد', 'صورتجلسه مورد نظر باموفقیت از سیستم حذف شد.','success');

        } else{
            $this->responseMessage( 'خطا', 'شما دسترسی لازم را ندارید', 'error');

        }

        return redirect()->back();
    }


    public function responseMessage( $title, $message, $flash)
    {
        \Session::flash('updateUser', array(
            'flash_title' => $title,
            'flash_message' => $message,
            'flash_level' => $flash,
            'flash_button' => 'بستن'
        ));
    }
}
