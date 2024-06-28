<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'company_logo_id'
    ];

    public function company_logo_id(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'company_logo_id', 'id');
    }
}
