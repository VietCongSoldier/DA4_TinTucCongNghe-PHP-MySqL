<?php

namespace App\Http\Controllers;

use App\Models\doi_tac;
use Illuminate\Http\Request;

class DoitacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = doi_tac::all();
        return json_encode($db);
    }
    public function Get(){
        return doi_tac::all();
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
        $db = new doi_tac();
        $db->id = $request->id;
        $db->ten_dt=$request->ten_dt;
        $db->diachi_dt=$request->diachi_dt;
        $db->email=$request->email;
        $db->sdt=$request->sdt;
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doi_tac  $doi_tac
     * @return \Illuminate\Http\Response
     */
    public function show(doi_tac $doi_tac)
    {
        return doi_tac::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doi_tac  $doi_tac
     * @return \Illuminate\Http\Response
     */
    public function edit(doi_tac $doi_tac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doi_tac  $doi_tac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = doi_tac::findOrFail($id);
        $db->id = $request->id;
        $db->ten_dt=$request->ten_dt;
        $db->diachi_dt=$request->diachi_dt;
        $db->email=$request->email;
        $db->sdt=$request->sdt;
        $db->save();
        return $db;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doi_tac  $doi_tac
     * @return \Illuminate\Http\Response
     */
    public function destroy(doi_tac $doi_tac)
    {
        doi_tac::findOrFail($id)->delete();
        return "Đã xóa";
    }
}
