<?php

namespace App\Http\Controllers\front\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class indexController extends Controller
{
    public function index($selflink)
    {
        $c = Book::where('selflink', '=', $selflink)->count();
        if ($c != 0) {
            $w = Book::where('selflink', '=', $selflink)->get();
            $v = Book::where('selflink', '=', $selflink)->first();
            $v->viewer++;
            $v->save();
            return view('front.book.index',['data' => $w]);
        } else {
            return redirect('/');
        }
    }
}
