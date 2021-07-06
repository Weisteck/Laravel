<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find()
 */
class Organisation extends Model
{
    use HasFactory;

/*    public bool $incremented = false;
    protected $keyType = 'uuid';*/
    protected $fillable = ['id', 'slug', 'name', 'email', 'tel', 'address', 'type'];

    public function missions(): HasMany
    {
        return $this->hasMany(Mission::class);
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }
}
