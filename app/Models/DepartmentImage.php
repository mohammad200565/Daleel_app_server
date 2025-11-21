<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentImage extends Model
{
    protected $fillable = [
        'department_id',
        'image_path',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
