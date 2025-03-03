<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Color extends Model
{
    use HasTranslations;

    public $translatable = ['label'];

    protected $fillable = ['code', 'label', 'hex_code'];
}
