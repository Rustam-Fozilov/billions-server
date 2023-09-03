<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DefaultSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_id',
        'value_id',
        'switch',
    ];

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }

    public function value(): BelongsTo
    {
        return $this->belongsTo(Value::class);
    }
}
