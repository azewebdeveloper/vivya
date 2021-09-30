<?php

namespace App\Http\Controllers\admin\makinghouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\mHelper;
use App\makinghouse;

class indexController extends Controller

{
    public function index()
    {
        $data = makinghouse::paginate(10);
        return view('admin.makinghouse.index',['data'=> $data]);
    }
    public function create()
    {
        return view('admin.makinghouse.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = makinghouse::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status', 'Uğurla əlavə olundu');
        }else
        {
            return redirect()->back()->with('status', 'Xəta baş verdi');
        }
    }

    public function edit($id)
    {
        $c = makinghouse::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = makinghouse::where('id', '=', $id)->get();
            return view('admin.makinghouse.edit', ['data' => $data]);
        }else
        {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = makinghouse::where('id', '=', $id)->count();
        if ($c!=0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = makinghouse::where('id', '=', $id)->update($all);
            if ($update)
            {
                return redirect()->back()->with('status', 'Uğurla Düzənləndi');
            }else
            {
                return redirect()->back()->with('status', 'Xəta baş verdi');
            }
        }else
        {
            return redirect('/');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $c = makinghouse::where('id', '=', $id)->count();
        if ($c!=0) {
            $delete = makinghouse::where('id', '=', $id)->delete();
            return redirect()->back();
        }else
        {
            return redirect('/');
        }
    }
}
