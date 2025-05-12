<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'phone',
        'age',
        'bloodType',
        'address',
        'city',
        'message',
        'image',
        'medicalCertificate',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
