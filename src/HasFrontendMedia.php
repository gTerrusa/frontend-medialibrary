<?php


namespace GTerrusa\FrontendMedialibrary;


trait HasFrontendMedia
{
    public function getFrontendMediaAttribute()
    {
        // get all media
        $media = $this->media ?? collect([]);

        // group media by collection name
        $mediaCollections = $media->groupBy('collection_name');

        // return mapped media collection
        return $mediaCollections->map(function ($media, $collection_name) {

            // $media should be a collection of Media
            return $media->map(function ($m) {
                // get conversions
                $conversionNames = array_keys($m->custom_properties['generated_conversions']);
                $conversions = [];
                foreach ($conversionNames as $name) {
                    $conversions[$name] = $m->getFullUrl($name) ?? '';
                }

                return [
                    'src' => $m->getFullUrl() ?? '',
                    'conversions' => $conversions,
                    'custom_properties' => $m->custom_properties
                ];
            });
        })->toArray();
    }
}
