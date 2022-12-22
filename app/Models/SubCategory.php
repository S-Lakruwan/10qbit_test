<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id'
    ];

    /**
     * category
     *
     * @return Category
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    /**
     * issue
     *
     * @return HasMany
     */
    public function sub_category(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'sub_category_id', 'id');
    }
}
