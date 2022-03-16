<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'classroom_id', 'extra_id', 'slug', 'image'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class, 'extra_id')->withDefault(['nama_extra' => 'Belum ada']);
    }

    public function scopeClassrooms($query)
    {
        return $query->where('classroom_id', '=', 2);
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNamaFormatAttribute()
    {
        return ucwords($this->nama);
    }

    public function getAlamatFormatAttribute()
    {
        return ucwords($this->alamat);
    }
}
