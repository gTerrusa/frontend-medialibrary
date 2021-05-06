<?php


namespace GTerrusa\FrontendMedialibrary;


use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasFrontendMedia
{
    public function getFrontendMediaAttribute(): Collection
    {
        // get all media
        $media = $this->media ?? collect([]);

        // return if empty
        if ($media->isEmpty()) {
            return $media;
        }

        // group media by collection name
        $mediaCollections = $media->groupBy('collection_name');

        // return mapped media collection
        return $mediaCollections->map(function ($media, $collection_name) {

            // $media should be a collection of Media
            return $media->map(function (Media $m) {
                $conversions = [];

                if (isset($m->custom_properties['generated_conversions'])) {
                    $conversionNames = array_keys($m->custom_properties['generated_conversions']);
                    foreach ($conversionNames as $name) {
                        $conversions[$name] = $m->getFullUrl($name) ?? '';
                    }
                }

                return [
                    'src' => $m->getFullUrl() ?? '',
                    'conversions' => collect($conversions),
                    'custom_properties' => collect($m->custom_properties ?? [])->except('generated_conversions'),
                    'order_column' => $m->order_column
                ];
            })
            ->sortBy('order_column');
        });
    }
}
