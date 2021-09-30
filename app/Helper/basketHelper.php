<?php
namespace App\Helper;

use Illuminate\Support\Facades\Session;

class basketHelper {
    static function add($id, $price, $image, $name, $qty, $size)
    {
        $basket = Session::get('basket');

        if ($basket != null) {
            if (array_key_exists($id, $basket)) {
                    $checkSize = $basket[$id]['size'];
                    if ($checkSize == $size) {
                        $newPrice = $basket[$id]['price'] += $price;
                        $newQty = $basket[$id]['qty'] += $qty;
                        $array = [
                            'id' => $id,
                            'name' => $name,
                            'image' => $image,
                            'price' => $newPrice,
                            'qty' => $newQty,
                            'size' => $size,
                        ];
                        Session::put('basket.'. $id ,$array);
                    }else {
                        $array = [
                            'id' => $id,
                            'name' => $name,
                            'image' => $image,
                            'price' => $price,
                            'qty' => $qty,
                            'size' => $size
                        ];
                        Session::put('basket.'. $id . '+1',$array);
                    }
            }
            else {
                $array = [
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'price' => $price,
                    'qty' => $qty,
                    'size' => $size
                ];
                Session::put('basket.'. $id ,$array);
            }
        }
        else {
            $array = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'qty' => $qty,
                'size' => $size
            ];
            Session::put('basket.'. $id ,$array);
        }

    }

    static function countData()
    {
        if (Session::get('basket')) {
            return count(Session::get('basket'));
        }else {
            return 0;
        }

    }

    static function allList() {
        if (Session::get('basket')) {
            $x = Session::get('basket');
            return $x;
        }else {
            return null;
        }


    }

    static function totalPrice() {
        $data = self::allList();
        return collect($data)->sum('price');
    }

    static function remove($id)
    {
        Session::forget('basket.'. $id);
    }
}
