<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;
    protected $fillable = ['name', 'subscription_plan_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function subscription_plan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
