<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueSubcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_category_id',
        'issue_id'
    ];
  /**
     * issue
     *
     * @return Issue
     */
    public function category()
    {
        return $this->hasOne(Issue::class, 'id', 'issue_id');
    }
}
