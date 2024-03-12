<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IMAuthor extends Model
{
    use HasFactory;
    protected $table = 'im_authors';
    protected $fillable = [
        'im_id',
        'author_id',
    ];
    public function instructionalMaterial()
    {
        return $this->belongsTo(IM::class, 'im_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}