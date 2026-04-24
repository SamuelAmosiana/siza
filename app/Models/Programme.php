<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id', 'name', 'slug', 'level', 'faculty', 'department',
        'duration_years', 'tuition_fee', 'tuition_currency', 'description',
        'entry_requirements', 'study_mode', 'is_active',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'tuition_fee' => 'decimal:2',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (self $programme) {
            if (empty($programme->slug)) {
                $programme->slug = Str::slug($programme->name);
            }
        });
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getLevelLabelAttribute(): string
    {
        return match ($this->level) {
            'certificate' => 'Certificate',
            'diploma'     => 'Diploma',
            'bachelor'    => "Bachelor's Degree",
            'master'      => "Master's Degree",
            'doctorate'   => 'Doctorate / PhD',
            default       => ucfirst($this->level),
        };
    }

    public function getFormattedFeeAttribute(): string
    {
        if (! $this->tuition_fee) {
            return 'Contact university';
        }

        return number_format($this->tuition_fee, 2) . ' ' . $this->tuition_currency . '/yr';
    }
}
