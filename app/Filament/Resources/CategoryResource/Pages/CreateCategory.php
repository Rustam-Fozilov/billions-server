<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $image = explode('/', $data['image']);
        $link = end($image);

        $model = static::getModel()::create($data);
        $model->image()->create([
            'link' => $link,
        ]);

        return $model;
    }
}
