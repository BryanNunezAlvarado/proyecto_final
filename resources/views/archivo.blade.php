<x-layout>
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
<div class="banner-top">
                <div class="container">
                    <h3 >Archivos</h3>
                    <h4><a href="inicio">Inicio</a><label>/</label>Archivos</h4>
                    <div class="clearfix"> </div>
                </div>
</div>

        <div class="card-body">
            
                <br>
                {!! Form::open(['route'=>['archivo.store'],'files'=>true])!!}
                   
                    {!! Form::file('archivos[]',['multiple'=>'multiple']) !!}
                    <br>
                    <br>
                    {!! Form::submit('Guardar',['class'=>'btn btn-primary btn-sm'])!!}
                {!! Form::close() !!}
                <br>
                <br>
        </div>

<table>
   <tr>
       <th>ID</th>
       <th>User_id</th>
       <th>Nombre</th>
       <th>Nombre_hash</th>
       <th>mime</th>
       <th>Acciones</th>
       
   </tr>
   @foreach($archivo as $archivos)
    <tr>
        <td>{{ $archivos->id }}</td>
        <td>{{ $archivos->user_id }}</td>
        <td>
            <a href="{{ route('archivo.descargar', $archivos->id) }}">
                {{ $archivos->nombre }}
            </a>
        </td>
        <td>{{ $archivos->nombre_hash }}</td>
        <td>{{ $archivos->mime }}</td>
        <td>
        
        <a href="{{ route('archivo.destroy', $archivos->id) }}"><input type="submit" class="button" value="borrar"></a>
                
            
         </td>
        </form>
          
        </td>
        
    </tr>
   @endforeach 
</table>
<br>
<br>
<br>

    
        
        
   


</x-layout>