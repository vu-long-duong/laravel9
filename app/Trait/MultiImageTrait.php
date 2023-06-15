<?php

namespace App\Trait;

use Illuminate\Support\Facades\Storage;

trait MultiImageTrait
{
    public function saveMultiImages($images, $folder)
    {
        $savedImages = [];

        foreach ($images as $image) {
            $path = $image->store($folder, 'public');
            $savedImages[] = $path;
        }

        return $savedImages;
    }

    public function deleteMultiImages($images)
    {
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }
    }
}
