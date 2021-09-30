<?php
namespace App\Helper;
use File;
use Image;
class imageUpload {
    static function singleUpload($name, $directory, $file)
    {
        $rand     = $name;
        $dir      = 'images/'. $directory . '/' . 'small';
        $dirLarge = 'images/'. $directory . '/' . '/large';

        if (!empty($file))
        {
            if (!File::exists($dir))
            {
                File::makeDirectory($dir, 0755, true);
            }
            if (!File::exists($dirLarge))
            {
                File::makeDirectory($dirLarge, 0755, true);
            }

            $filename = $rand. '.' . $file->getClientOriginalExtension();
            $path     = public_path($dir . '/' . $filename);
            $path2    = public_path($dirLarge . '/' . $filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250,250)->save($path);
            return $dir . '/' . $filename;
        }else
        {
            return '';
        }
    }


    static function singleUploadUpdate($name, $directory, $file, $data, $field)
    {
        $rand     = $name;
        $dir      = 'images/'. $directory . '/' . 'small';
        $dirLarge = 'images/'. $directory . '/' . '/large';

        if (!empty($file))
        {
            if (!File::exists($dir))
            {
                File::makeDirectory($dir, 0755, true);
            }
            if (!File::exists($dirLarge))
            {
                File::makeDirectory($dirLarge, 0755, true);
            }


            File::delete(public_path($data[0]['image']));
            $r = public_path($data[0]['image']);
            $newPath = str_replace('small','large', $r);
            File::delete($newPath);
            $filename = $rand. '.' . $file->getClientOriginalExtension();
            $path     = public_path($dir . '/' . $filename);
            $path2    = public_path($dirLarge . '/' . $filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250,250)->save($path);
            return $dir . '/' . $filename;
        }else
        {
            return $data[0][$field];
        }
    }

    static function uploadGallery($name, $directory, $file, $data, $field)
    {
        $rand     = $name;
        $dir      = 'images/'. $directory . '/' . 'small';
        $dirLarge = 'images/'. $directory . '/' . '/large';

        if (!empty($file))
        {
            if (!File::exists($dir))
            {
                File::makeDirectory($dir, 0755, true);
            }
            if (!File::exists($dirLarge))
            {
                File::makeDirectory($dirLarge, 0755, true);
            }

            $galleryPath = json_decode($data[0]['gallery']);
            foreach ($galleryPath as $key => $value) {
                File::delete(public_path($value));
                $r = public_path($value);
                $newPath = str_replace('small','large', $r);
                File::delete($newPath);
            }
            $filename = $rand. '.' . $file->getClientOriginalExtension();
            $path     = public_path($dir . '/' . $filename);
            $path2    = public_path($dirLarge . '/' . $filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250,250)->save($path);
            return $dir . '/' . $filename;
        }else
        {
            return $data[0][$field];
        }
    }
}
