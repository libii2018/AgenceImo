<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold'
    ] ;

    public function options():BelongsToMany {
        return $this->BelongsToMany(Option::class);
    }

    public function getSlug(): string {
        return Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder, bool $available = true): Builder {
        return $builder->where('sold',$available);
    }

    public function scopeRecent(Builder $builder): Builder {
        return $builder->orderBy('created_at','desc');
    }

    public function password(): Attribute {
        return Attribute::make(
            get: fn (?string $value) => '',
            set: fn (string $value) => Hash::make($value),
        );
    }
}