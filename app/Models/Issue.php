<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'uuid',
        'slug'
    ];

    /**
     * @return MorphMany
     */
    public function waitingRoomContents()
    {
        return $this->morphMany(Image::class, 'imageble');
    }
    /**
     * issue
     *
     * @return HasMany
     */
    public function category(): HasMany
    {
        return $this->hasMany(IssueCategory::class, 'issue_id', 'id');
    }
    /**
     * issue
     *
     * @return HasMany
     */
    public function sub_category(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'issue_id', 'id');
    }
}
