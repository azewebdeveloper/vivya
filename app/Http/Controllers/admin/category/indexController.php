<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\mHelper;
use App\Category;
use App\Helper\imageUpload;
use File;

class indexController extends Controller
{
    public function index()
    {
        $data = Category::paginate(10);
        return view('admin.category.index',['data'=> $data]);
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1,90000),'category_img',$request->file('image'));

        $insert = Category::create($all);
        if ($insert)
        {
            return redirect()->back()->with('status', 'Kateqoriya Uğurla əlavə olundu');
        }else
        {
            return redirect()->back()->with('status', 'Xəta baş verdi');
        }
    }

    public function edit($id)
    {
        $c = Category::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Category::where('id', '=', $id)->get();
            return view('admin.category.edit', ['data' => $data]);
        }else
        {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Category::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Category::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,90000), 'category_img', $request->file('image'), $data, 'image');
            $update = Category::where('id', '=', $id)->update($all);
            if ($update)
            {
                return redirect()->back()->with('status', 'Kateqoriya Uğurla Düzənləndi');
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
        $c = Category::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = Category::where('id', '=', $id)->get();
            File::delete(public_path($w[0]['image']));
            $r = public_path($w[0]['image']);
            $newPath = str_replace('small','large', $r);
            File::delete($newPath);
            Category::where('id', '=', $id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }
}
