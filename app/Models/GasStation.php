<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasStation extends Model
{
    use HasFactory;

    /**
     * Tabulka v databázi spojená s tímto modelem.
     *
     * @var string
     */
    protected $table = 'gas_stations';

    /**
     * Primárná klíč v databázi
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * Defaultní atributy
     *
     * @var array
     */
    protected $attributes = [
        'priceDiesel' => 0.0,
        'priceDieselSpecial' => 0.0,
        'pricePetrol' => 0.0,
        'pricePetrolSpecial' => 0,
        'priceLPG' => 0,
        'priceCNG' => 0
    ];

    protected $fillable = [
        'company_id',
        'street',
        'city',
        'priceDiesel',
        'priceDieselSpecial',
        'pricePetrol',
        'pricePetrolSpecial',
        'priceLPG',
        'priceCNG',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Získej Company pomocí cizího klíče
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }


}
