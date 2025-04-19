<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormSubmission extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'ip_address',
        'user_agent',
        'metadata',
        'processed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metadata' => 'array',
        'processed_at' => 'datetime',
    ];

    /**
     * Scope a query to only include submissions with a specific status.
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include submissions from the past X hours.
     */
    public function scopeRecentHours($query, $hours = 24)
    {
        return $query->where('created_at', '>', now()->subHours($hours));
    }

    /**
     * Scope a query to only include submissions from a specific IP address.
     */
    public function scopeFromIp($query, $ipAddress)
    {
        return $query->where('ip_address', $ipAddress);
    }
}
