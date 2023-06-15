<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

//str_slug($title, $separator);
class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'describe',
        'status',
    ];

    public function post(){
        return $this-> hasMany(Post::class,'categories_id', 'id');
    }

    public static function createCategory(array $data)
    {
        if (isset($data['status'])) {
            // Checkbox được chọn
            $status = env('STATUS_ACTIVE');
        } else {
            // Checkbox không được chọn
            $status = env('STATUS_NO_ACTIVE');
        }

        $category = new Category;
        $category->title = $data['title'];
        $category->slug = Str::slug($data['title'], '-');
        $category->describe = $data['describe'];
        $category->status= $status;
        $category->save();
        return $category;
    }

    public static function updateCategory(array $data, $id)
    {

        $category = Category::find($id);
        if (isset($data['status'])) {
            // Checkbox được chọn
            $status = env('STATUS_ACTIVE');
        } else {
            // Checkbox không được chọn
            $status = env('STATUS_NO_ACTIVE');
        }

        if ($category) {
            $category->title = $data['title'];
            $category->slug = Str::slug($data['title'], '-');
            $category->describe = $data['describe'];
            $category->status = $status;
            $category->save();

            return $category;
        }
        return false;
    }

}
