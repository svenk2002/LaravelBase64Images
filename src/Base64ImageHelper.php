<?php

namespace SvenK\LaravelBase64Images;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

/**
 * ImageHelper
 * 
 * Helper class to store and delete images
 */
class Base64ImageHelper
{
    /**
     * Store an image in the storage
     * 
     * @param mixed $valueBase64
     * @param string $path
     * @param string $saveAs
     */
    public static function store(mixed $valueBase64, string $path, string $saveAs = null): ?string
    {
        if (!Str::contains($valueBase64, 'data')) return $valueBase64;

        $destination_path = $path;

        // Generate a unique filename if not provided
        if (!$saveAs) $saveAs = md5(time()) . uniqid();

        // Open the image using Intervention Image
        $img = Image::read($valueBase64);

        $scaling = config('base64images.scaling');

        if ($scaling) $img->scale($scaling);

        // Save the image in webp format
        $img->toWebp(config('base64images.quality') ?? 80);

        //if the destination path does not exist, create it
        if (!Storage::disk('public')->exists($destination_path)) Storage::disk('public')->makeDirectory($destination_path);

        $img->save(storage_path('app/public/' . $destination_path . '/' . $saveAs . '.webp'));

        return '/storage/' . $destination_path . '/' . $saveAs . '.webp';
    }

    /**
     * Delete an image from the storage
     * 
     * @param string $path
     * @return bool
     */
    public static function delete(string $path): bool
    {
        if (empty($path)) return false;

        if (Str::startsWith($path, '/storage/')) {
            $path = Str::replaceFirst('/storage', '', $path);
        }

        return Storage::disk('public')->delete($path);
    }
}
