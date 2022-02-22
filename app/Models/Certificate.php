<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Certificate extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'certificates';

    protected $fillable = [
        'nama_document',
        'category_id',
        'path',
        'upload_by',
        'created_at',
    ];

    protected $hidden = [
        'path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
