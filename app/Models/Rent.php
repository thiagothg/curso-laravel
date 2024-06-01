<?php

namespace App\Models;

use App\Models\App\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'period_start_data',
        'date_final_expected_period',
        'end_date_realized_period',
        'price',
        'initial_km',
        'final_km',
        'client_id',
        'car_id',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function rules()
    {
        return [];
    }
}
