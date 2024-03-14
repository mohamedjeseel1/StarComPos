<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Amouts extends Model
{

    use HasApiTokens;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
    'invice_number', 'discount', 'netAmt', 'payment', 'balance', 'created_at'
    ];

    use HasFactory;

}
