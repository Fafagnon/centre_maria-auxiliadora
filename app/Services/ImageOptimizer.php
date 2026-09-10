<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageOptimizer
{
    /**
     * Resize and compress an image stored on the public disk.
     */
    public static function optimize(string $relativePath, int $maxWidth = 1600, int $quality = 80): void
    {
        try {
            $disk = Storage::disk('public');
            if (!$disk->exists($relativePath)) {
                return;
            }

            $fullPath = $disk->path($relativePath);
            if (!file_exists($fullPath)) {
                return;
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($fullPath);

            // Downscale only if larger than maxWidth while keeping aspect ratio
            if ($image->width() > $maxWidth) {
                $image->scaleDown(width: $maxWidth);
            }

            $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
            if (in_array($extension, ['jpg', 'jpeg'])) {
                $image->toJpeg(quality: $quality)->save($fullPath);
            } elseif ($extension === 'webp') {
                $image->toWebp(quality: $quality)->save($fullPath);
            } elseif ($extension === 'png') {
                $image->toPng()->save($fullPath);
            } else {
                $image->save($fullPath);
            }
        } catch (\Throwable $e) {
            Log::warning("Image optimization failed for {$relativePath}: " . $e->getMessage());
        }
    }
}
