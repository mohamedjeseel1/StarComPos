<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stocks extends Model
{
    use HasApiTokens;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name', 'branch', 'supplier', 'quantity', 'unit', 'price', 'price_sel', 'discount', 'warranty', 'barcode', 'alert'
    ];
    use HasFactory;
}
