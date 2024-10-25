<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_pengembalian',
        'status',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo('Book::class');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('User::class');
    }
}
