<?php

namespace App\Http\Controllers\front\basket;

use App\Helper\basketHelper;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        return view('front.basket.index');
    }

    public function add($id)
    {

        $c = Book::where('id', '=', $id)->count();
        if ($c!=0) {
            $w = Book::where('id', '=', $id)->get();
            if(isset($_GET['qty'])) {
                basketHelper::add($id, $w[0]['price'] * $_GET['qty'], asset($w[0]['image']),$w[0]['name'], $_GET['qty'], $_GET['editorid']);
            }else {
                basketHelper::add($id, $w[0]['price'], asset($w[0]['image']),$w[0]['name'], $w[0]['qty'], $_GET['editorid']);
            }
            return redirect()->back();
        }else
        {
            return redirect()->route('index');
        }
    }

    public function remove($id)
    {
        basketHelper::remove($id);
        return redirect()->back();
    }

    public function complete()
    {
            return view('front.basket.complete');
    }

    public function completeStore(Request $request)
    {
        $request->validate(['name' => 'required', 'phone' => 'required']);
        $address = $request->input('address');
        $phone = $request->input('phone');
        $subway = $request->input('subway');
        $email = $request->input('email');
        $name = $request->input('name');
        $status = $request->input('status');
        $json = json_encode(basketHelper::allList());
        $array = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'subway' => $subway,
            'email' => $email,
            'status' => $status,
            'json' => $json
        ];

        if (basketHelper::countData() != 0)
        {
            $insert = Order::create($array);
            if ($insert)
            {
                Session::forget('basket');
                return redirect()->back()->with('status', 'Sifari??iniz qeyd?? al??nd??. Sizinl?? tezlikl?? ??laq?? saxlan??lacaq');
            }
            else
            {
                return redirect()->back()->with('status', 'Sifari?? zaman?? bir x??ta ba?? verdi. Z??hm??t olmasa xanalar?? do??ru ????kild?? doldurub yenid??n yoxlay??n');
            }
        }
        else
        {
            return redirect()->back()->with('status', 'S??b??tiniz Bo??dur. Z??hm??t olmasa s??b??t?? m??hsul ??lav?? edin');
        }


    }

    public function flush()
    {
        Session::forget('basket');
        return redirect('/');
    }
}
