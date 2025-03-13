<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'book_id',
        'user1_id',
        'loans_date',
        'return_date',
        'status'
    ];

    // Relasi ke tabel books
    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke tabel users
    public function user1s()
    {
        return $this->belongsTo(User1::class);
    }
}
