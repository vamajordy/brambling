<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property int $id
 */
final class Dictionary extends Model
{
    use HasFactory;

    protected $table = 'dictionaries';

    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }
}
