<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container my-4">
      <h1 class="display-4">Notasaaee</h1>

      <form method="POST" action="{{ route('notas.crear') }}">
          @csrf
            <!--mensaje de validacion-->
            @error('nombre')
              <div class="alert alert-danger">
                nombre obligatorio
              </div>
            @enderror

            @error('descripcion')
              <div class="alert alert-danger">
                descripcion obligatorio
              </div>
            @enderror
            <!--fin mensaje de validacion-->

          <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2"/>
          <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2"/>

          <button class="btn btn-primary btn-block" type="submit">Agregar</button>
      </form>

      <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($notas as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->nombre}}</td>
      <td>{{$item->descripcion}}</td>
      <td>
        <!--para editar-->
        <td>
            <a href="{{route('notas.editar', $item)}}" class="btn btn-warning btn-sm">Editar</a>
        </td>
        <!--pfin editar-->

       
        <!--pfin eliminar-->
        <td>
           <!--para eliminr-->
          <form action="{{ route('notas.eliminar', $item) }}" class="d-inline" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
          </form>
        </td>
      </td>
    </tr>
    @endforeach()
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>