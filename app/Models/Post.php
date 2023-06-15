<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Trait\MultiImageTrait;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory,MultiImageTrait;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'categories_id',
        'status',
    ];

    protected $primarykey='id';//khoá chính
    protected $table= 'posts';// tên bảng


    public function user(){
        return $this-> belongsTo('App\Models\User','user_id','id');
    }

    public function category(){
        return $this-> belongsTo('App\Models\Category','categories_id','id');
    }

    public function postimage(){
        return $this-> hasMany(PostImage::class,'post_id', 'id');
    }


    public static function createPost(array $data)
    {

        $post = new Post();
        if ($data['status']==1) {
            // Checkbox được chọn
            $status = 1;
        } else {
            // Checkbox không được chọn
            $status = 0;
        }


        if ($post) {
            $post->title = $data['title'];
            $post->slug = Str::slug($data['title'], '-');
            $post->content = $data['content'];
            $post->categories_id=$data['categories_id'];
            $post->user_id=Auth::user()->id;
            $post->status = $status;
            $post->save();

            return $post;
        }

    }

}
