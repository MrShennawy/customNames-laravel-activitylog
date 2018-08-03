<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Activitylog\LogsActivity;


class Bank extends Model 
{
    use LogsActivity;

    protected $table = 'banks';
    public $timestamps = true;
    protected $fillable = array('name', 'u_name', 'acc_num', 'iban');
    // LogsActivityData
    protected static $logName = 'bankModel';
    protected static $logAttributes = ['إسم البنك' => 'name', 'إسم الحساب'=>'u_name', 'رقم الحساب'=>'acc_num', 'الايبان'=>'iban'];

}