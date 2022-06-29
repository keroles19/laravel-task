<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageProcess
{


    protected function saveImage($image = null, $path = '', $old = null, $width = 80, $height = 80)
    {
        if ($image) {
            $name = $this->getName($path, $old, $image);

           Image::make($image)
                ->save(storage_path('app/public/'.$path.'/'.$name));
            return $name;
        }
    }


    protected function getName(mixed $path, mixed $old, mixed $image): string
    {

        if ($old != null && File::exists(public_path('storage/' . $path .'/'. $old))) {
            File::delete(public_path('storage/' . $path .'/'. $old));
        }
        $name = time().'.'.$image->getClientOriginalExtension();
        return $name;
    }


}
