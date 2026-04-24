<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'type', 'location', 'province', 'description',
        'logo', 'cover_image', 'website', 'phone', 'email',
        'established_year', 'student_count', 'accreditation',
        'is_featured', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
    ];

    // Auto-generate slug from name
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (self $university) {
            if (empty($university->slug)) {
                $university->slug = Str::slug($university->name);
            }
        });
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** Count of active programmes */
    public function activeProgrammesCount(): int
    {
        return $this->programmes()->where('is_active', true)->count();
    }
}
