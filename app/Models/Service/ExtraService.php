<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraService extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('images/b-image.png')
            ->useFallbackPath(public_path('images/b-image.png'));
        // ->withResponsiveImages();
    }

    public function registerMediaConversions(Media $media = NULL): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 640, 426)
            ->background('#eeeeee')
            ->sharpen(10)
            ->performOnCollections('images')
            ->watermark('images/big-logo-home2.png')
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkPadding(2)
            ->watermarkHeight(50)
            ->watermarkWidth(50)
            ->quality(80)
            ->nonQueued();
    }

    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
