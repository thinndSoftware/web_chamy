<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'category_id';
    // protected $fillable = ['category_id','category_name','parent_id','slug'];
    protected $fillable = ['category_name','parent_id','slug'];

}
