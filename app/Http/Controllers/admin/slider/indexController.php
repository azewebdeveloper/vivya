<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\imageUpload;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use File;

class indexController extends Controller
{
    public function index()
    {
        $data = Slider::paginate(10);
        return view('admin.slider.index',['data'=> $data]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $all['image'] = imageUpload::singleUpload(rand(1,90000),'slider_img', $request->file('image'));
        if ($all['image'] != '') {
            $insert = Slider::create($all);
            if ($insert)
            {
                return redirect()->back()->with('status', 'Slider Uğurla əlavə olundu');
            }else
            {
                return redirect()->back()->with('status', 'Xəta baş verdi');
            }
        }else {
            return redirect()->back()->with('status', 'Şəkil seçin');
        }
    }

    public function edit($id)
    {
        $c = Slider::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Slider::where('id', '=', $id)->get();
            return view('admin.slider.edit', ['data' => $data]);
        }else
        {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = Slider::where('id', '=', $id)->get();
        $all['image'] = imageUpload::singleUploadUpdate(rand(1,90000),'slider_img', $request->file('image'),$data,'image');
        if ($all['image'] != '') {
            $insert = Slider::where('id', '=', $id)->update($all);
            if ($insert)
            {
                return redirect()->back()->with('status', 'Slider Uğurla əlavə olundu');
            }else
            {
                return redirect()->back()->with('status', 'Xəta baş verdi');
            }
        }else {
            return redirect()->back()->with('status', 'Şəkil seçin');
        }
    }

    public function delete($id)
    {
        $c = Slider::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = Slider::where('id', '=', $id)->get();
            File::delete(public_path($w[0]['image']));
            $r = public_path($w[0]['image']);
            $newPath = str_replace('small','large', $r);
            File::delete($newPath);
            Slider::where('id', '=', $id)->delete();
            return redirect()->back();
        }else
        {
            return redirect('/');
        }
    }
}

