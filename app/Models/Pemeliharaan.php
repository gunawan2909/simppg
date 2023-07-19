<?php

namespace App\Models;

use App\Models\ListKebutuhan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeliharaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }


    public function komplain()
    {
        return $this->hasOne(Komplain::class, 'id', 'komplain_id');
    }

    public function listkebutuhan()
    {
        return $this->hasMany(ListKebutuhan::class, 'pemeliharaan_id');
    }



    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('komplain', function ($query) use ($search) {
                $query->whereHas('komponen', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orwhere('lokasi', 'like', '%' . $search . '%');
                })->orwhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            });
        })->when($filters['day'] ?? false, function ($query, $day) {
            $query->whereDay('created_at', $day);
        });;
    }
}
