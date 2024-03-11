<?php

namespace App\Models;

use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id', 'service_id', 'service_name', 'date', 'time', 'status','service_provider_id'];
        // Add more fillable attributes as needed


    /**
     * Get the service associated with the booking.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Method to fetch service name based on service_id
    public function getServiceNameAttribute()
    {
        return $this->service->name;
    }

    /**
     * Get the user associated with the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }
  
}
