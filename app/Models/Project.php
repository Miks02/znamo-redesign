<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'project_link',
        'user_id',
        'year_of_creation',
        'year_of_redesign',
        'image_path',
        'active_updating',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
