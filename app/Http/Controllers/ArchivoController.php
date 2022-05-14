<?php

namespace App\Http\Controllers;
use App\Models\Archivo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function store(Request $request)
    {
        foreach($request->archivos as $archivo){
            if($archivo->isValid()){
                $nombre_hash = $archivo->store('user');

                $registroArchivo = new Archivo();
                $registroArchivo->user_id='1';
                $registroArchivo->nombre = $archivo->getClientOriginalName();
                $registroArchivo->nombre_hash = $nombre_hash;
                $registroArchivo->mime = $archivo->getClientMimeType();
                $registroArchivo->save();

            }
        }
        return redirect('archivo_agregar')->with('msg','Archivo(s) cargados con exito');
    }
    public function descargar(Archivo $archivo)
    {
        $header = ['content-Type' => $archivo->mine];
        return Storage::download($archivo->nombre_hash, $archivo->nombre, $header);
    }
    public function destroy(Archivo $archivo)
    {
       $archivo->delete();
       return redirect('/archivo_agregar');
    }
}
