<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komplain extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'komponen_id');
    }

    public function pemeliharaan()
    {
        return $this->hasOne(Pemeliharaan::class, 'komplain_id', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->whereHas('komponen', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orwhere('lokasi', 'like', '%' . $search . '%');
            })->orwhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })->when($filters['day'] ?? false, function ($query, $day) {
            return  $query->whereDay('created_at', $day);
        });
    }
}
