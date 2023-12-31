<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title', 'company', 'description', 'tags','location', 'website', 'email', 'logo'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')->orWhere('description','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}