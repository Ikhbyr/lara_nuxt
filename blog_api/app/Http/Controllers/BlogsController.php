<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogsResource;
use App\BLogs;
use Illuminate\Http\Request;

class BLogsController extends Controller
{
    protected $detail;

    public function __construct(BlogDetail $detail){
        $this->detail = $detail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BlogsResource(Blog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new TaskDetailResource($this->detail::store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BLogs  $bLogs
     * @return \Illuminate\Http\Response
     */
    public function show(BLogs $bLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BLogs  $bLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(BLogs $bLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BLogs  $bLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BLogs $bLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BLogs  $bLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(BLogs $bLogs)
    {
        //
    }
}
