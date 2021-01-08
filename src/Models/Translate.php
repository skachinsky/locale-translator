<?php

namespace Skachinsky\LocaleTranslator\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property int $row_id
 * @property string $locale
 * @property string $value
 * @method static Builder|Translate newModelQuery()
 * @method static Builder|Translate newQuery()
 * @method static Builder|Translate query()
 * @method static Builder|Translate whereId($value)
 * @method static Builder|Translate whereRowId($value)
 * @method static Builder|Translate whereType($value)
 * @method static Builder|Translate whereLocale($value)
 * @method static Builder|Translate whereValue($value)
 * @mixin \Eloquent
 *
 */
class Translate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type', 'row_id', 'locale', 'value'
    ];
}
