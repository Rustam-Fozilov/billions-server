<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Value;

class ValueService
{
    public function findOrCreate($value, $attribute_id)
    {
        $result = Value::where('name', '=', json_encode($value))->pluck('id');

        if ($result->isEmpty()) {
            $attribute = Attribute::find($attribute_id);

            return $attribute->values()->create([
                'name' => $value
            ])->id;
        }

        return $result[0];
    }
}
