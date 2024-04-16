<?php

namespace App\Http\Controllers;

use App\Models\SiteRepresentante;
use App\Models\SiteRepresentanteDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteRepresentanteDocController extends Controller
{
    public function index(Request $request){

        if (!session()->has('id')) {
            return redirect()->route('representante-index-contact')->with('error', 'Erro ao enviar o formulário, por geltileza tente novamente...');
        }

        $id = $request->session()->get('id');

        $representante = SiteRepresentante::Where(['id' => $id])->first();

        //$lista_clientes = EmpresaCliente::Where(['empresa_id' => $empresa_id, 'id' => $id])->first();

        return view('representante.documentos', [
            'representante' => $representante
        ]);

    }

    public function enviar(Request $request, $id){

        
        $image = $request->image;

        if(!empty($image)){

            $documento = new SiteRepresentanteDoc();
            $documento->name = $image->getClientOriginalName();
            $documento->representante_id = $id;

            $documento->save();

            $image->move(public_path().'/images/temp/', $documento->name);

            return response()->json([
                'status' => true,
                'image_id' => $documento->id,
                'message' => 'Imagem enviada com sucesso',
            ]);
        }

    }

    public function destroy(Request $request){

        $filename =  $request->get('filename');
        SiteRepresentanteDoc::where('name',$filename)->delete();
        File::delete(public_path().'/images/temp/'.$filename);
        return "Removido com sucesso";
      
    }

    public function enviarDocumentos(Request $request, $id = null){

        

        $representante = SiteRepresentante::Where(['id' => $id])->first();

        $documentos = SiteRepresentanteDoc::Where(['representante_id' => $representante->id])->get();

        foreach ($documentos as $documento) {
            
            //Os documenos enviados serão salvos na pasta 'uploads' e removidos da pasta 'temp'

            $extArray = explode('.', $documento->name); 
            $ext = last($extArray);
            $novoNome = rand(0,50).'-'.time().'.'.$ext;
            $sPath = public_path().'/images/temp/'.$documento->name; //Diretório da pasta temp 
            $dPath = public_path().'/images/uploads/'.$novoNome;    //Diretório da pasta upload 
            File::copy($sPath, $dPath);                             
            File::delete(public_path().'/images/temp/'.$documento->name);
            File::delete(public_path().'/images/temp/'.$novoNome);
            $documento->update(['name' => $novoNome]);
            //$documento->name = $novoNome;

            SiteRepresentanteDoc::where('id', $documento->id)->update(['name' => $novoNome]);

        }

        return redirect()->route('representante-index-contact')->with('success', $representante->nome);

    }
}
