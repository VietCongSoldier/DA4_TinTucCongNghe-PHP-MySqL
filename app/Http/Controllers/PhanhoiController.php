<?php

namespace App\Http\Controllers;

use App\Models\phanhoi;
use Illuminate\Http\Request;

class PhanhoiController extends Controller
{
    public function index()
    {
        $db = phanhoi::all();
        return json_encode($db);
    }
    public function Get(){
        return phanhoi::all();
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $db = new phanhoi();
        // $db=$request->all();
        $db->id_new = $request->id_new;
        $db->id_tk = $request->id_tk;
        $db->id_sp = $request->id_sp;
        $db->note = $request->note;
        $db->save();
        return $db;
    }
    public function update(Request $request, $id)
    {
        $db = phanhoi::findorFail($id);
        $db->id_new = $request->id_new;
        $db->id_tk = $request->id_tk;
        $db->id_sp = $request->id_sp;
        $db->note = $request->note;
        $db->save();
        return $db;
    }
    public function destroy($id)
    {
        phanhoi::findOrFail($id)->delete();
        return "Đã xóa";
    }
    public function show($id)
    {
        return phanhoi::find($id);
    }
}
