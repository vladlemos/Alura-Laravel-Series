<?php

//importante conhecer essa estrutura
namespace App;
use Illuminate\Database\Eloquent\Model;

//

Class Serie extends Model
{
    // protected $table = 'series' nao precisa colocar pelo default da classe
    public $timestamps = false; // desativa updated at e created at
    protected $fillable = ['nome']; // coloca quais podem ser atualizados em massa
}
