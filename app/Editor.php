<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $guarded = [];

    static public function getField($id, $field)
    {
        $c = Editor::where('id', '=', $id)->count();
        if ($c != 0)
        {
            $w = Editor::where('id', '=', $id)->get();
            return $w[0][$field];
        }else
        {
            return 'Yazıçı Silinib';
        }
    }
}
