<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ["name_specialty"];
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
