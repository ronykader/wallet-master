<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionPlanFactory> */
    use HasFactory;
    protected $fillable = ['name', 'price', 'duration', 'features'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
