<?php

namespace App\Http\Controllers;


use App\Message;
use App\Events\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$project = "etax";

    	//Validate first if email already exist
    	$members = DB::connection('mysql3')->table('members')
    				->where('email', Auth::user()->email)
    				->get();

    	$get_ID = "";
    	if($members->count()){
    		$get_ID = $members[0]->id;
    	}else{
    		$get_ID = DB::connection('mysql3')->table('members')->insertGetId(
	    		array('first_name' => Auth::user()->first_name , 'last_name' => Auth::user()->last_name, 'email' => Auth::user()->email)
	    	);
    	}
    	
    	//return $get_ID;
    	$get_project = DB::connection('mysql3')->table('projects')
    					->where('name', $project)
    					->get();

    	//insert message to cht database    	
    	$message = Message::create([
    		'member_id'	=> $get_ID,
    		'project_id'	=> $get_project[0]->id,
    		'message' => $request->message,
            'sender' => 'member',
    	]);

        $getMember = DB::connection('mysql3')->table('members')
                    ->where('id', $get_ID)
                    ->get();

    	broadcast(new Chat($getMember[0],$message))->toOthers();

    }

    public function fetch()
    {
        $project = "etax";

        $members = DB::connection('mysql3')->table('members')
                    ->where('email', Auth::user()->email)
                    ->get();
        
        $get_project = DB::connection('mysql3')->table('projects')
                        ->where('name', $project)
                        ->get();

        $messages = "";
        if($members->count()){
            $messages = DB::connection('mysql3')->table('messages')
                    ->where('member_id', $members[0]->id)
                    ->where('project_id', $get_project[0]->id)
                    ->get();
        }

        return $messages;
    }
}
