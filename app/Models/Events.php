<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
		'name',
		'description',
		'date',
		'id_user_creator',
		'id_category',
        'status'
    ];

    public function participantes() {
        return $this->hasMany(UserEvent::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
