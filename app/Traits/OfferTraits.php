<?php

namespace App\Traits;

Trait OfferTraits
{
    public function saveImage($photo,$photoPath){
        $fileExtension = $photo->getClientOriginalExtension();
        $fileName = time().'.'.$fileExtension;
        $path = $photoPath;
        $photo->move($path,$fileName);
        return $fileName;
    }
}
