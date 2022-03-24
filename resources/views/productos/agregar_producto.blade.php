<x-layout>
  @isset($producto)
        <div class="banner-top">
                <div class="container">
                    <h3 >Editar Producto</h3>
                    <h4><a href="inicio">Inicio</a><label>/</label>Editar Producto</h4>
                    <div class="clearfix"> </div>
                </div>
        </div>
            
     @else
        <div class="banner-top">
            <div class="container">
                <h3 >Agregar Producto</h3>
                <h4><a href="inicio">Inicio</a><label>/</label>Agregar Producto</h4>
                <div class="clearfix"> </div>
            </div>
        </div>
   @endisset

<div class="login">

    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Producto</h3>
            @if($errors->any())
            <div class="aler alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            @endif
            @isset($producto)
            <form action="/productos/{{$producto->id}}" method="post">
                @method('PATCH')
            @else
            <form action="/productos" method="post">
           @endisset
                @csrf
                <div class="key">
                    
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h6>nombre de producto</h1>
                    <input type="text"name="nombre"  placeholder="Nombre" value = {{ isset($producto) ? $producto->nombre : '' }} {{old('nombre')}}>
                    <div class="clearfix"></div>
                </div>
                <div class="key">
                <h6>&nbsp&nbsp&nbsp&nbsp precio de producto</h1>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <input type="text" placeholder="precio" name="precio" value = {{ isset($producto) ? $producto->precio : '' }}{{old('precio')}}>
                    <div class="clearfix"></div>
                </div>
                <div class="key">
                                <h6> &nbsp&nbsp&nbsp&nbsp url de imagen</h1>
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <input type="text" placeholder="URL de imagen" name="url" value = {{ isset($producto) ? $producto->url : '' }}{{old('url')}}>
                    <div class="clearfix"></div>
                </div>
                <div>
                    Genero:<br>
                    <select name="tipo" value = {{ isset($producto) ? $producto->tipo : '' }} {{old('tipo')}}>

                        <option>Snack</option>
                        <option>Cereales</option>
                        <option>Botanas</option>
                        <option>Bebidas</option>

                    </select>
                    <br></br>
                </div>
                <div>
                    Estado:<br>
                    <select name="etiqueta_id[]" multiple >
                        @foreach ($etiquetas as $etiqueta)
                            <option value ="{{ $etiqueta->id }}" {{isset($producto) && array_search($etiqueta->id, $producto->etiquetas->pluck('id')->toArray()) !== false ?  ' selected' : '' }}>{{ $etiqueta->etiqueta }}</option>
                        @endforeach
                        
                    </select>
                    <br></br>
                </div>
                <input type="submit" value="Agregar" name="btnagregar">
                <a >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                <a  href="./">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</x-layout>