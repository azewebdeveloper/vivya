<?php

namespace App\Http\Controllers\admin\search;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        if (strip_tags($_GET['q']) != '')
        {
            $q = strip_tags($_GET['q']);
            $data = Book::where('name','like','%' .$q. '%')->paginate(8);
            return view('admin.search.index',['data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }
}
