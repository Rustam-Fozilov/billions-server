<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $image = explode('/', $data['photo']);
        $link = end($image);

        $model = static::getModel()::create($data);
        $model->update([
            'photo' => $link,
        ]);

        return $model;
    }
}
