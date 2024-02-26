<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'im_id',
        'name',
        'production_date',
        'production_cost',
        'price',
        'quantity',
    ];
    public function im()
    {
        return $this->belongsTo(IM::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}