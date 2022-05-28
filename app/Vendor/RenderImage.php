<?php

namespace App\Vendor;

use App\Models\GalleryItem;
use Faker\Provider\Image;

class RenderImage
{


    public static function render($path, $width, $height)
    {

        $image = Image::image($path, $width, $height);
dd($image);


    }

    public static function renderThumb(GalleryItem $item, $width, $height)
    {

    }
}
