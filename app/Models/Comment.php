<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'issue_id'
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
     * @return Issue
     */
    public function issue()
    {
        return $this->hasOne(Issue::class, 'id', 'issue_id');
    }
}
