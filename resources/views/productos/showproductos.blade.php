<x-layout>
<div class="banner-top">
        <div class="container">
            <h3 >Producto</h3>
            <h4><a href="inicio">Productos</a><label>/</label>Detalles</h4>
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
   <tr>
       <th>ID   </th>
       <th>Usuario</th>
       <th>Nombre</th>
       <th>Imagen</th>
       <th>Precio</th>
       <th>Tipo</th>
       <th>Acciones</th>
       
   </tr>
   
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->user->name }}</td>
        <td>{{ $producto->nombre }}</td>
        <td><img src="{{asset($producto->url)}}" width = "100" height = "100"> </td>
        <td>{{ $producto->precio }}</td>
        <td>{{ $producto->tipo }}</td>
        <td>
        
          <a href="./">Regresar</a>
          
        </td>
        
        
    </tr>
    
</table>
<br>
<br>
<br>

</x-layout>