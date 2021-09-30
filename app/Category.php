<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    static public function getField($id, $field)
    {
        $c = Category::where('id', '=', $id)->count();
        if ($c != 0)
        {
            $w = Category::where('id', '=', $id)->get();
            return $w[0][$field];
        }else
        {
            return 'Kateqoriya Silinib';
        }
    }
}
