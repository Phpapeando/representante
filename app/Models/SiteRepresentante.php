<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteRepresentante extends Model
{
    use HasFactory;

    protected $table ='site_representantes';
    protected $fillable = [
        'nome',
        'email',
        'data_nascimento' ,
        'celular',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'complemento',
        'resposta-1',
        'resposta-2',
        'resposta-3',
        'resposta-4',
        'resposta-5',
        'conhecimento',
        'funcionarios',
        'referencia-1',
        'referencia-2',
        'referencia-3',
        

    ];
}
