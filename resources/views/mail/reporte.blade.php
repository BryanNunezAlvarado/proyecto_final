
<h1>Reporte de Productos</h1>
<ul>

    @foreach($productos as $producto)
    
    <li>{{ $producto->nombre  }} => ${{ $producto->precio }}</li>

    @endforeach
    
</ul>