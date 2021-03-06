<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Mail\Reporte;
use App\Models\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;

class ProductosController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$producto = Producto::get();
        //$producto = Auth::user()->productos;
        $producto = Producto::with('etiquetas')->with('user.codigo')->get();
        
       
        return view('productos.productos',compact('producto'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = Etiqueta::all();
        return view('productos.agregar_producto',compact('etiquetas'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'url'=>'required',
            'tipo'=>'required',
            'etiqueta_id'=>'required',
        ]);
        	
         
        $request->merge(['user_id'=>Auth::id()]);
        $producto = Producto::create($request->all());
        $producto->etiquetas()->attach($request->etiqueta_id);
        
        //$user = Auth::user();
        //$user->productos()->save($producto);
        return redirect('/productos')->with(['mensaje' => 'creacion correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.showproductos',compact('producto'));
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
         Gate::authorize('administra',$producto);

        $etiquetas = Etiqueta::all();
        return view('productos.agregar_producto',compact('producto', 'etiquetas'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        Gate::authorize('administra',$producto);
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'url'=>'required',
            'tipo'=>'required',
            'etiqueta_id'=>'required',
        ]);
        
        Producto::where('id',$producto->id)->update($request->except(['_token','_method','btnagregar', 'etiqueta_id']));
        $producto->etiquetas()->sync($request->etiqueta_id);

        //$producto->nombre = $request->nombre;
        //$producto->precio = $request->precio;
        //$producto->tipo = $request->tipo;
        //$producto->url = $request->url;
        //$producto->save();
       

        return redirect('/productos')->with(['mensaje' => 'Editado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        Gate::authorize('administra',$producto);
       $producto->delete();
       return redirect('/productos')->with(['mensaje' => 'Eliminado correctamente']);
    }

    public function enviarProductos()
    {
        Mail::to(Auth::user()->email)->send(new Reporte());
        return redirect()->back()->with(['mensaje' => 'Enviado correctamente']);

    }
    
}
