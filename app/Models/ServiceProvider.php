<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;
use App\Models\User;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected $table = "service_providers";

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUNameAttribute()
    {
        return $this->user->name ?? null;
    }
    
}


