<?php

namespace Modules\Approval\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
   public function showReport()
   {
       $users = User::where('name', '!=', 'delete user')->get();


           $search = 'مدیریت';
           $data['manager'] = Approval::all();


           $search = 'فنی';
           $data['fani'] = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();

           $search = 'مالی';
           $data['mali'] = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();

           $search = 'بازرگانی';
           $data['bazargani'] = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();

           $search = 'اداری';
           $data['edari'] = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();

//       else{
//           $data['other'] = ApprovalDetail::whereHas('users',  function($q)
//           {
//               $q->where('user_id', auth()->user()->id);
//           })->get();
//       }


       return view('approval::approvals.reporter', compact('data', 'users'));
   }
}
