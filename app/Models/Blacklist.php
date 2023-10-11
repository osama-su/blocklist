<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Pest\Laravel\json;

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
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'blacklisted_by');
    }

    public function photos(): Attribute
    {
        return Attribute::make(get: function ($value) {
            return array_map(getImagePath(...), json_decode($value));
        });
    }




}
