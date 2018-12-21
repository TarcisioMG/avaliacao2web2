<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($appointments as $appointment)
      
      <tr>
        <td>{{$appointment['id']}}</td>
        <td>{{$appointment['date']}}</td>
        <td>{{$appointment['time']}}</td>
        <td>{{$appointment['id_doctor']}}</td>
        <td><a href="{{action('AppointmentController@edit', $appointment['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('AppointmentController@destroy', $appointment['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>