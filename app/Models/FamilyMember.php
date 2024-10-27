<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    /** @use HasFactory<\Database\Factories\FamilyMemberFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'managed_user_id', 'name', 'relationship'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function managedUser()
    {
        return $this->belongsTo(User::class, 'managed_user_id');
    }
}
