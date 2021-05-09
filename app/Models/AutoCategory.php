<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCategory extends Model
{
    use HasFactory, Sluggable;
    public $timestamps = false;
    protected $fillable = ['title'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
