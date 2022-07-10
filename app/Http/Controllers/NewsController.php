<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Datetime;
class NewsController extends Controller
{
    public function index()
    {
        $db = news::all();
        return json_encode($db);
    }
    public function Get(){
        return news::all();
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $db = new news();
        // $db=$request->all();
        $db->id_loai_tin = $request->id_loai_tin;
        $db->numread = $request->numread;
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = $request->image;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }
    public function update(Request $request, $id)
    {
        $db = news::findorFail($id);
        $db->id_loai_tin = $request->id_loai_tin;
        $db->numread = $request->numread;
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = $request->image;
        $db->save();
        return $db;
    }
    public function destroy($id)
    {
        news::findOrFail($id)->delete();
        return "Đã xóa";
    }
    public function show($id)
    {
        return news::find($id);
    }
}
