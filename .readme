# Laravel Base64 Images

Simply store and delete base64 images in Laravel.

## Installation

1. **Install the package via Composer:**

   ```sh
   composer require svenk/laravel-base64-images
   ```

2. **Publish the configuration file:**

   ```sh
   php artisan vendor:publish --tag=config
   ```

3. **Add the service provider and alias (if not using package auto-discovery):**

   Open `config/app.php` and add the following to the `providers` array:

   ```php
   SvenK\LaravelBase64Images\Base64ImagesServiceProvider::class,
   ```

   Add the following to the `aliases` array:

   ```php
   'Base64ImageHelper' => SvenK\LaravelBase64Images\Facades\Base64ImageHelper::class,
   ```

## Configuration

The configuration file `config/base64images.php` will be published to your application. You can customize the following settings:

```php
return [
    'scaling' => env('BASE64IMAGES_SCALING', null),
    'quality' => env('BASE64IMAGES_QUALITY', 80),
];
```

- `scaling`: The scaling factor for the images.
- `quality`: The quality of the webp images (0-100).

## Usage

### Storing an Image

To store a base64 encoded image:

```php
use SvenK\LaravelBase64Images\Facades\Base64ImageHelper;

$base64Image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAA...'; // Your base64 encoded image string
$path = 'images'; // The directory where the image will be stored
$storedImagePath = Base64ImageHelper::store($base64Image, $path);

echo $storedImagePath; // Outputs the stored image path
```

### Deleting an Image

To delete an image from storage:

```php
use SvenK\LaravelBase64Images\Facades\Base64ImageHelper;

$imagePath = '/storage/images/your-image.webp';
$isDeleted = Base64ImageHelper::delete($imagePath);

if ($isDeleted) {
    echo 'Image deleted successfully.';
} else {
    echo 'Failed to delete image.';
}
```

## What It Does

This package provides a helper class to easily store and delete base64 encoded images in Laravel.

- **Store**: Converts a base64 encoded image to a webp format and saves it to the specified directory. The stored image path is returned.
- **Delete**: Deletes an image from the specified path.

The helper class utilizes the Intervention Image package for image processing and Laravel's Storage facade for file storage operations.

## License

This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author

- svenk2002

