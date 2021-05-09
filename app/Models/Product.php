<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ['title', 'category_id', 'qty', 'price','img'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function auto_categories(){
        return $this->belongsToMany(AutoCategory::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('img')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('img')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->img) {
            return asset("assets/admin/img/no-image.png");
        }
        return asset("uploads/{$this->img}");
    }
}
