<?php

namespace App\Models\Automobile;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicule extends EloquentModel implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'price',
        'model_id',
        'made_year',
        'plate_number',
        'precision',
        'status',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
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

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
