<x-layout>
<div class="banner-top">
        <div class="container">
            <h3 >Agregar Producto</h3>
            <h4><a href="inicio">Inicio</a><label>/</label>Agregar Producto</h4>
            <div class="clearfix"> </div>
        </div>
</div>
<div class="login">

    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Agregar</h3>
            @if($errors->any())
            <div class="aler alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            @endif
            <form action="store" method="post">
                @csrf
                <div class="key">
                    
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h6>nombre de producto</h1>
                    <input type="text"name="nombre"  placeholder="Nombre">
                    <div class="clearfix"></div>
                </div>
                <div class="key">
                <h6>&nbsp&nbsp&nbsp&nbsp precio de producto</h1>
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <input type="text" placeholder="precio" name="precio">
                    <div class="clearfix"></div>
                </div>
                <div class="key">
                                <h6> &nbsp&nbsp&nbsp&nbsp url de imagen</h1>
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    <input type="text" placeholder="URL de imagen" name="url">
                    <div class="clearfix"></div>
                </div>
                <div>
                    Genero:<br>
                    <select name="tipo">

                        <option>Snack</option>
                        <option>Cereales</option>
                        <option>Botanas</option>
                        <option>Bebidas</option>

                    </select>
                    <br></br>
                </div>
                <input type="submit" value="Agregar" name="btnagregar">
            </form>
        </div>
    </div>
</div>
</x-layout>