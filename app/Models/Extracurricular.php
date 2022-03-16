<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_extra', 'slug'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function setNamaExtraAttribute($value)
    {
        $this->attributes['nama_extra'] = $value;
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNamaExtraFormatAttribute()
    {
        return ucwords($this->nama_extra);
    }
}
