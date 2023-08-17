<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'blacklisted_by',
        'name',
        'id_number',
        'phone_number',
        'rate',
        'reason',
        'photo_1',
'photo_2',
'photo_3',
'photo_4',
'photo_5',
'photo_6',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'blacklisted_by');
    }

}
