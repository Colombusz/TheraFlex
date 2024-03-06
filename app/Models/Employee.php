<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Employee extends Authenticatable
{
    protected $fillable = [
        'address',
        'fname',
        'lname',
        'phoneNum',
        'username',
        'password',
        'images',
    ];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
