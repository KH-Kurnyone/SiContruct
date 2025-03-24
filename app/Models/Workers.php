<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
}
