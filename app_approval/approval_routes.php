<?php

use AppApproval\DB\ApprovalIndex;

Route::view('approvals/index', 'Approval::approvals.index', ['approvals' => ApprovalIndex::index()])
    ->name('approvals.index');
Route::get('/tessssssst', function () {
    dd('ok');
});
