<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index (){
    	$acts = Activity::orderby('id')->get();
    	return view('logs.index',compact('acts'));
    }
    public function show ($id){
		$act = Activity::findOrFail($id);
    	return view('logs.show',compact('act'));
    }

    public function multipleLogs(){
    	return [
    		'bankModel' => 'نظام البنوك',
            'UserModel' => 'نظام المستخدمين'
    	];
    }

    public function eventLogs(){
    	return [
	    	'created' => 'إنشاء',
	    	'updated' => 'تعديل',
	    	'deleted' => 'حذف',
	    	'restored' => 'إسترجاع',
	    	'forceDeleted' => 'حذف نهائى',
	    ];
	}
}
