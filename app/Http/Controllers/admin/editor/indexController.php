<?php

namespace App\Http\Controllers\admin\editor;

use App\Editor;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class indexController extends Controller
{
    public function index()
    {
        $data = Editor::paginate(10);
        return view('admin.editor.index', ['data'=> $data]);
    }

    public function create()
    {
        return view('admin.editor.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $insert = Editor::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status', 'Ölçü Əlavə Olundu');
        }else
        {
            return redirect()->back()->with('status', 'Xəta baş verdi');
        }
    }

    public function edit($id)
    {
        $c = Editor::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Editor::where('id', '=', $id)->get();
            return view('admin.editor.edit', ['data' => $data]);
        }else
        {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Editor::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Editor::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Editor::where('id', '=', $id)->update($all);
            if ($update)
            {
                return redirect()->back()->with('status', 'Ölçü uğurla düzənləndi');
            }else
            {
                return redirect()->back()->with('status', 'Xəta baş verdi');
            }
        }else
        {
            return redirect('/');
        }

    }

    public function delete($id)
    {
        $c = Editor::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = Editor::where('id', '=', $id)->get();
            Editor::where('id', '=', $id)->delete();
            return redirect()->back();
        }else
        {
            return redirect('/');
        }

    }
}
