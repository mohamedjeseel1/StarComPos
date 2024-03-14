<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Returns extends Model
{
    use HasApiTokens;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'product_id', 'supplier_id', 'branch_id', 'customer_id', 'quantity', 'price_sel', 'status'
    ];
    use HasFactory;
}
