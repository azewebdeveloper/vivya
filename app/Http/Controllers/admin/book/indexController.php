<?php

namespace App\Http\Controllers\admin\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Editor;
use App\makinghouse;
use App\Book;
use App\Helper;
use App\Category;
use File;
use App\Helper\mHelper;
use App\Helper\imageUpload;

class indexController extends Controller
{
    public function index()
    {
        $data = Book::paginate(10);
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $editor = Editor::all();
        $makinghouse = makinghouse::all();
        $category = Category::all();
        return view('admin.book.create', ['editor' => $editor, 'makinghouse' => $makinghouse, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = Helper\mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1, 90000), 'book_img', $request->file('image'));

        $gallery = $request->file('gallery');
        $all['editorid'] = json_encode($all['editorid']);


        if ($gallery != null) {
            $path = [];
            foreach ($gallery as $image) {
                array_push($path, imageUpload::singleUpload(rand(1, 90000), 'book_img', $image));
            }
            $all['gallery'] = json_encode($path);
        }

        $insert = Book::create($all);
        if ($insert) {
            return redirect()->back()->with('status', 'Məhsul Əlavə Olundu');
        } else {
            return redirect()->back()->with('status', 'Xəta baş verdi');
        }
    }

    public function edit($id)
    {
        $c = Book::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Book::where('id', '=', $id)->get();
            $editor = Editor::all();
            $makinghouse = makinghouse::all();
            $category = Category::all();
            return view('admin.book.edit', ['data' => $data, 'editor' => $editor, 'makinghouse' => $makinghouse, 'category' => $category]);
        } else {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Book::where('id', '=', $id)->count();
        if ($c!=0) {
            $data = Book::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $gallery = $request->file('gallery');
            if ($gallery != null) {
                $path = [];
                foreach ($gallery as $image) {
                    array_push($path, imageUpload::uploadGallery(rand(1, 90000), 'book_img', $image, $data,'gallery'));
                }
                $all['gallery'] = json_encode($path);
            }
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,90000), 'book_img', $request->file('image'), $data, 'image');
            $update = Book::where('id', '=', $id)->update($all);
            if ($update)
            {
                return redirect()->back()->with('status', 'Məhsul uğurla düzənləndi');
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

        $c = Book::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = Book::where('id', '=', $id)->get();
            $delGallery = $w[0]['gallery'];
            if ($delGallery != null) {
                $convertArr = json_decode($delGallery);
                foreach ($convertArr as $key => $value ) {
                    File::delete(public_path($value));
                    $r = public_path($value);
                    $newPath = str_replace('small','large', $r);
                    File::delete($newPath);
                }
            }
            File::delete(public_path($w[0]['image']));
            $r = public_path($w[0]['image']);
            $newPath = str_replace('small','large', $r);
            File::delete($newPath);
            Book::where('id', '=', $id)->delete();
            return redirect()->back();
        }else
        {
            return redirect('/');
        }

    }

    public function adminIndex()
    {
        if (strip_tags($_GET['q']) != '')
        {
            $q = strip_tags($_GET['q']);
            $data = Book::where('name','like','%' .$q. '%')->paginate(8);
            return view('admin.book.search',['data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }
}
