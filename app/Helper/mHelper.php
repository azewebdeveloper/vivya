<?php
namespace App\Helper;

class mHelper
{
    static function permalink($string)
    {
        $find    = array('Ç','Ş','Ğ','Ü','İ','Ö','ç','ş','ğ','ü','ö','ı','+','#','Ə','ə');
        $replace = array('c','s','g','u','i','o','c','s','g','u','o','i','plus','sharp','e','e');
        $string  = strtolower(str_replace($find, $replace, $string));
        $string  = str_replace(' ','-',$string);
        $string  = trim(preg_replace('/\s+/','',$string));
        return $string;
    }

    static function largeImage($image)
    {
        $imageExplode = explode('/',$image);
        $filename = end($imageExplode);
        $key = key($imageExplode);
        unset($imageExplode[$key]);
        return 'images/slider_img/large/' . $filename;
    }

    static function singleImage($image)
    {
        $imageExplode = explode('/',$image);
        $filename = end($imageExplode);
        $key = key($imageExplode);
        unset($imageExplode[$key]);
        return 'images/book_img/large/' . $filename;
    }
}
