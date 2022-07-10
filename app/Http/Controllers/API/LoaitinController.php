<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaitin;
class LoaitinController extends Controller
{
   public function index()
    {
        $db = Loaitin::all();
        return json_encode($db);
    }

    public function Get(){
        return Loaitin::all();
    }

    public function store(Request $request)
    {
        $db = new Loaitin();
        // $db=$request->all();
        $db->id = $request->id;
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;
        $db->save();
        return $db;
    }

    public function update(request $request,$id){
        $db = Loaitin::findorFail($id);
        $db->tenloai = $request->tenloai;
        $db->id = $request->id;
        $db->Delet = $request->Delet;
        $db->save();
        return $db;
    }

    public function destroy($id){
        Loaitin::findOrFail($id)->delete();
        return "Đã xóa";
    }

    public function show($id)
    {
        return Loaitin::find($id);
    }
}

