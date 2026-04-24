<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'user_id', 'programme_id', 'university_id',
        'full_name', 'email', 'phone', 'nationality', 'gender',
        'date_of_birth', 'personal_statement', 'highest_qualification',
        'status', 'admin_notes', 'reviewed_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'reviewed_at'   => 'datetime',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $application) {
            if (empty($application->reference)) {
                $application->reference = 'SIZA-' . date('Y') . '-' . strtoupper(Str::random(5));
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending'      => 'gray',
            'under_review' => 'blue',
            'accepted'     => 'green',
            'rejected'     => 'red',
            default        => 'gray',
        };
    }
}
