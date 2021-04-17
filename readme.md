# FrontendMedialibrary

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

FrontendMedialibrary is a trait that makes your the media, on your Laravel models that use Spatie Medialibrary, more easily accessible in frontend frameworks. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require gterrusa/frontendmedialibrary
```

## Usage

Set up your Model

```
class User extends Model implements HasMedia // requires implements HasMedia
{
    // requires InteractsWithMedia
    use InteractsWithMedia, HasFrontendMedia;
    
    /**
     * Spatie medialibrary media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();

        $this->addMediaCollection('user_gallery');
    }

    /**
     * Spatie medialibrary media conversions
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('optimized')
            ->fit(Manipulations::FIT_MAX, 1500, 1500);

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_MAX, 250, 250);
    }
}
```

Example Result:

** HasFrontendMedia will pick up all of your registered collections, conversions, and custom properties automatically. They do not have to be these exact ones. This is just an example of the structure of the output. 

```
>>> $user->frontendMedia;
=> [
     "avatar" => [
       [
         "src" => "http://frontend-medialibrary.local/storage/1/41301408.jpeg",
         "conversions" => [
           "thumb" => "http://frontend-medialibrary.local/storage/1/conversions/41301408-thumb.jpg",
           "optimized" => "http://frontend-medialibrary.local/storage/1/conversions/41301408-optimized.jpg",
         ],
         "custom_properties" => [
           "generated_conversions" => [
             "thumb" => true,
             "optimized" => true,
           ],
           "alt" => "alt tag",
         ],
       ],
     ],
     "user_gallery" => [
       [
         "src" => "http://frontend-medialibrary.local/storage/2/49268400_10155665639226152_4845558111659884544_n.jpg",
         "conversions" => [
           "thumb" => "http://frontend-medialibrary.local/storage/2/conversions/49268400_10155665639226152_4845558111659884544_n-thumb.jpg",
           "optimized" => "http://frontend-medialibrary.local/storage/2/conversions/49268400_10155665639226152_4845558111659884544_n-optimized.jpg",
         ],
         "custom_properties" => [
           "generated_conversions" => [
             "thumb" => true,
             "optimized" => true,
           ],
         ],
       ],
       [
         "src" => "http://frontend-medialibrary.local/storage/3/68544499_10156079858431152_5954628979427115008_n.jpg",
         "conversions" => [
           "thumb" => "http://frontend-medialibrary.local/storage/3/conversions/68544499_10156079858431152_5954628979427115008_n-thumb.jpg",
           "optimized" => "http://frontend-medialibrary.local/storage/3/conversions/68544499_10156079858431152_5954628979427115008_n-optimized.jpg",
         ],
         "custom_properties" => [
           "generated_conversions" => [
             "thumb" => true,
             "optimized" => true,
           ],
         ],
       ],
     ],
   ]
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gterrusa/frontendmedialibrary.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gterrusa/frontendmedialibrary.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gterrusa/frontendmedialibrary/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/gterrusa/frontendmedialibrary
[link-downloads]: https://packagist.org/packages/gterrusa/frontendmedialibrary
[link-travis]: https://travis-ci.org/gterrusa/frontendmedialibrary
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/gterrusa
[link-contributors]: ../../contributors
