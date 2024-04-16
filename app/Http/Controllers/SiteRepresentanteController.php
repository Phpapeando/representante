<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRepresentanteRequest;
use Illuminate\Http\Request;
use App\Models\SiteRepresentante;

class SiteRepresentanteController extends Controller
{
    public function index(){

        return view('representante.representante');

    }

    public function store(SiteRepresentanteRequest $request){

        
        // Retirando a mascara do celular
        $telefoneOriginal = $request->celular;
        $telefoneFormatado = preg_replace("/[^0-9]/", "", $telefoneOriginal);

        // Retirando a mascara do cep
        $cepOriginal = $request->cep;
        $cepFormatado = preg_replace("/[^0-9]/", "", $cepOriginal);

        $data = SiteRepresentante::create($request->all());

        $data->celular = $telefoneFormatado;
        $data->cep = $cepFormatado;

        if($data->save()) {
            
            return redirect()->route('representante-documentos-contact')->with('id', $data->id);
        } else {
            return redirect()->route('representante-index-contact')->with('error', 'Erro ao enviar o formulário, por geltileza tente novamente...');
        }

    }
}
