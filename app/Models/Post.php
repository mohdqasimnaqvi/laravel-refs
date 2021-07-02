<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    protected $with = array('category', 'author');
    public function scopeFilter($posts, array $arr) {
        if(isset($arr['search'])) {
            $searchText = $arr['search'];
            if ($searchText) {
                $posts->where('title', 'like', '%'.$searchText.'%');
            }
        }
        if(isset($arr['category'])) {
            $categorySlug = $arr['category'];
            if ($categorySlug) {
                $posts->whereExists(
                    fn($q) =>
                        $q->from('categories')
                            ->whereColumn('categories.id', 'posts.category_id')
                            ->where('categories.slug', $categorySlug));
            }
        }
        if(isset($arr['author'])) {
            $categorySlug = $arr['author'];
            if ($categorySlug) {
                $posts->whereExists(
                    fn($q) =>
                        $q->from('users')
                            ->whereColumn('users.id', 'posts.category_id')
                            ->where('users.username', $categorySlug));
            }
        }
    }
}
