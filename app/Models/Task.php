<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'performer',
        'title',
        'file',
        'period',        
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function taskAreas()
    {
        return $this->hasMany(TaskArea::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
