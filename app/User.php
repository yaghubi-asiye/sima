<?php

namespace App;

use App\Models\ApprovalDetail;
use App\Models\Newtdl;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'nationalCode', 'password','name', 'family','groupName','position','mobileNumber','lastLogin','lastAction','twoStepCode','isAdmin','isDataEntry','isDefaulPassword','Active','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function newtdls()
    {
        return $this->belongsToMany(Newtdl::class, 'newtdl_users')->withPivot('statusAssigner','result', 'attachment', 'id', 'status', 'descriptionAssigner');
    }

    public function approvalDetails()
    {
        return $this->belongsToMany(ApprovalDetail::class, 'approval_detail_users')->withPivot('sender_id', 'id', 'sender_status','receiver_status', 'sender_result', 'receiver_result', 'receiver_attachment');
    }



    public function getstatusAssignerPivotAttribute()
    {
        $color =
        [
            'برگشت خورده' => 'danger',
            'رد شده' => 'warning',
            'تایید شده'  => 'success',
            'متوقف'  => 'secondary',
            'بررسی نشده'  => 'info',
        ];
        return $color[$this->pivot->statusAssigner];
    }

    public function getstatusPivotAttribute()
    {
        $color =
        [
            'بررسی نشده' => 'warning',
            'درحال انجام' => 'primary',
            'انجام شده'  => 'success',
            'متوقف'  => 'danger',
        ];
        return $color[$this->pivot->status];
    }

    public function parkings(){
    return $this->hasMany('App\Parking');
    }

    public function tdls(){
    return $this->hasMany('App\Models\Tdl');
    }


    public function ResidenceMembers(){
    return $this->hasMany('App\ResidenceMember');
    }

    public function regulations(){
        return $this->hasMany('App\Models\Regulation');
    }

    public function invoices(){
        return $this->hasMany('App\Models\Invoice');
    }

    public function commissionMajors(){
        return $this->hasMany('App\Models\CommissionMajor');
    }
    public function commissionPartials(){
        return $this->hasMany('App\Models\CommissionPartial');
    }
    public function confirms(){
        return $this->hasMany('App\Models\Confirm');
    }
    public function PurchaseRequestForms(){
        return $this->hasMany('App\Models\PurchaseRequestForm');
    }

    public function timeSheets(){
        return $this->hasMany('App\Models\TimeSheet');
    }

}
