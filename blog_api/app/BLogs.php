<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BLogs extends Model
{
    //
    public static function store($request){
        $blog = new self;
        $blog->title = $request->input('title');
        $blog->user_id = $request->user()->id;
        $blog->body = $request->input('body');
        $blog->save();
        return $task;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
