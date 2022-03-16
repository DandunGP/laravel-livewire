<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas', 'slug'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function setNamaKelasAttribute($value)
    {
        $this->attributes['nama_kelas'] = $value;
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNamaKelasFormatAttribute()
    {
        return ucwords($this->nama_kelas);
    }
}
