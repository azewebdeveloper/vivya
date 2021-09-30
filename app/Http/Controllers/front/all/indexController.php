<?php

namespace App\Http\Controllers\front\all;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Book::paginate(8);
        return view('front.all.index',['data' => $data]);
    }

    public function discount()
    {
        $data = Book::where('prePrice','!=','null')->paginate(8);
        return view('front.all.index',['data' => $data]);
    }
}
