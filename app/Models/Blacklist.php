<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'photo_one',
        'photo_two',
        'photo_three',
        'photo_four',
        'photo_five',
        'photo_six',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'blacklisted_by');
    }


    protected function photoOne(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }

    protected function photoTwo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }

    protected function photoThree(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }

    protected function photoFour(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }

protected function photoFive(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }

    protected function photoSix(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset(getImagePath($value)),
        );
    }





}
