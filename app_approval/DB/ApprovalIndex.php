<?php

namespace AppApproval\DB;

use App\Models\ApprovalDetail;
use App\User;

class ApprovalIndex
{
    public static function index()
    {
        $users = User::where('name', '!=', 'delete user')->get();

        if(auth()->user()->position == 'مدیر عامل')
        {
            $search = 'مدیریت';
            $Proceedings = ApprovalDetail::all();

        }
        else if(auth()->user()->position == 'مدیر فنی')
        {
            $search = 'فنی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر مالی')
        {
            $search = 'مالی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'like', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر بازرگانی')
        {
            $search = 'بازرگانی';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();
        }
        else if(auth()->user()->position == 'مدیر اداری')
        {
            $search = 'اداری';
            $Proceedings = ApprovalDetail::where('eghdamKonande', 'LIKE', '%'.$search.'%')->get();
        }
        else{
            $Proceedings = ApprovalDetail::whereHas('users',  function($q)
            {
                $q->where('user_id', auth()->user()->id);
            })->get();
        }


        return view('dashboards.newparts.Approvals.approval', compact('Proceedings', 'users'));
    }
}
