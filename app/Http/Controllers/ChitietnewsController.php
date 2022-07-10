<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class ChitietnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = news::all();
        return json_encode($db);
    }
    public function Get(){
        return news::all();
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
        $db = new news();
        // $db=$request->all();
        $db->id = $request->id;
        $db->id_loai_tin = $request->id_loai_tin;
        $db->numread = $request->numread;
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = $request->image;
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return news::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = news::findorFail($id);
        $db->id = $request->id;
        $db->id_loai_tin = $request->id_loai_tin;
        $db->numread = $request->numread;
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = $request->image;
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        news::findOrFail($id)->delete();
        return "Đã xóa";
    }
}