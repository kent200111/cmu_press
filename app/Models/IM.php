<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IM extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'title',
        'college',
        'category_id',
        'publisher',
        'edition',
        'isbn',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'im_authors');
    }
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
    public function purchases()
    {
        return $this->hasManyThrough(Purchase::class, Batch::class);
    }
}