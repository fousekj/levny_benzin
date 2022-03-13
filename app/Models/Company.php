<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Tabulka v databázi spojená s tímto modelem.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * Primárná klíč v databázi
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

}
