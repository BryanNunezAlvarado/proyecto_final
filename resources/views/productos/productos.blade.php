<x-layout>
<div class="banner-top">
        <div class="container">
            <h3 >Productos</h3>
            <h4><a href="inicio">Inicio</a><label>/</label>productos</h4>
            <div class="clearfix"> </div>
        </div>
</div>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<br>
<table>
<a href="/enviar-reporte">Enviar Productos</a><br>
   <tr>
       <th>ID</th>
       <th>Usuario</th>
       <th>Codigo usuario</th>
       <th>Nombre</th>
       <th>Imagen</th>
       <th>Precio</th>
       <th>Tipo</th>
       <th>Estado</th>
       <th>Acciones</th>
       
   </tr>
   @foreach($producto as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->user->name_email }}</td>
        <td>
          {{$producto->user->codigo->codigo ?? 'sin codigo'}}
        </td>
        <td>{{ $producto->nombre }}</td>
        <td><img src="{{asset($producto->url)}}" width = "100" height = "100"> </td>
        <td>{{ $producto->precio }}</td>
        <td>{{ $producto->tipo }}</td>
        <td>
            @foreach ($producto->etiquetas as $etiqueta)
              {{ $etiqueta->etiqueta }} <br>
            @endforeach
        </td>
        
        <td>
          <a href="productos/{{ $producto->id}}">Ver detalles</a><br>
          <a href="productos/{{ $producto->id}}/edit">Editar</a><br>
          <form action="productos/{{ $producto->id}}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="Borrar">
          </form>
          
        </td>
        
    </tr>
   @endforeach 
</table>
<br>
<br>
<br>

</x-layout>