<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property array $definition
 * @property int $dictionary_id
 */
final class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function dictionary(): BelongsTo
    {
        return $this->belongsTo(Dictionary::class);
    }
}
