<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plate',
        'available',
        'km',
        'modelos_id'
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function rules()
    {
        return [
            'modelos_id' => 'exists:modelos,id',
            'placa' => 'required',
            'disponivel' => 'required',
            'km' => 'required'
        ];
    }
}
