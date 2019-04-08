<?php


if (! function_exists('getFirstPicture')) {

    function getFirstPicture($id)
    {
        $product = App\Product::find($id);
        if($product->pictures()) {
            return $product->pictures()->orderBy('order')->first();
        }

        return false;
    }
}