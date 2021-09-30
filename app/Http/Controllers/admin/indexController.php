<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $w = User::paginate(10);
        return view('admin.index',['data' => $w]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function delete($id)
    {
        $c = User::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = User::where('id', '=', $id)->get();
            User::where('id', '=', $id)->delete();
            return redirect()->back();
        }else
        {
            return redirect('/');
        }
    }

}
