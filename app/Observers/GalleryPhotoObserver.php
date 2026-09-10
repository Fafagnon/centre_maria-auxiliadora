<?php

namespace App\Observers;

use App\Models\GalleryPhoto;
use App\Services\ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class GalleryPhotoObserver
{
    public function saved(GalleryPhoto $photo): void
    {
        if ($photo->isDirty('image_path') && !empty($photo->image_path)) {
            ImageOptimizer::optimize($photo->image_path, maxWidth: 1200, quality: 80);
        }
    }

    public function deleted(GalleryPhoto $photo): void
    {
        if (!empty($photo->image_path) && Storage::disk('public')->exists($photo->image_path)) {
            Storage::disk('public')->delete($photo->image_path);
        }
    }
}
