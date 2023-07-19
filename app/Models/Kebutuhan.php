<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kebutuhan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')

                ->orwhere('kondisi', 'like', '%' . $search . '%')
                ->orwhere('harga', 'like', '%' . $search . '%')
                ->orwhere('jumlah', 'like', '%' . $search . '%');
        });
    }
}
