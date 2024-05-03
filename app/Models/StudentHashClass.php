<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentHashClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teachers_id', 'id');
    }
    
    public function classroom()
    {
        return $this->belongsTo(User::class, 'classrooms_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(User::class, 'periode_id', 'id');
    }
}
