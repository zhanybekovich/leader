<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_slogan',
        'company_description',
        'company_address',
        'company_phone',
        'company_email',
        'company_logo'
    ];
}
