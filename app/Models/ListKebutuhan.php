<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListKebutuhan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function kebutuhan()
    {
        return $this->belongsTo(Kebutuhan::class, 'kebutuhan_id');
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['day'] ?? false, function ($query, $day) {
            return $query->whereDay('created_at', $day);
        });
    }
}
