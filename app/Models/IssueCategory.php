<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'issue_id'
    ];
    /**
     * issue
     *
     * @return Issue
     */
    public function issue()
    {
        return $this->hasOne(Issue::class, 'id', 'issue_id');
    }
    /**
     * category
     *
     * @return Category
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
