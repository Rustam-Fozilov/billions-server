<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ImageService
{
    public function store($image)
    {
        return Http::post(env('IMAGE_SERVER_URL') . '/api/store', [
            'image' => $image
        ]);
    }
}
