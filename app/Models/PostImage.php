<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'post_id',
        'image_path',
    ];
    protected $table='postimages';

    public function post(){
        return $this-> belongsTo('App\Models\Post','post_id','id');
    }


}
