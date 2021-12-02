<?php

namespace App\Traits;

trait ImageResizeTrait {

    public function resizeImage($Path) {

        $Width = 250;
        $Height = 150;

        $Path = storage_path("app/" . $Path);


        $img = \Image::make($Path);

        $PathInfo = pathinfo($Path);

        $ResizedFileName = $PathInfo['filename'] . "_{$Width}x{$Height}." . $PathInfo['extension'];


        $img->resize($Width, $Height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(storage_path('app/public/' . $ResizedFileName));

        return "public/" . $ResizedFileName;
    }

}
