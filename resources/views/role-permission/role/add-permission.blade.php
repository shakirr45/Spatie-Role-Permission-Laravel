<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>






  

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

        @if (session('status'))
         <div class="alert alert-success">{{ session('status') }}</div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{ $role->name }}</h4>
                    <a href="{{ url('roles') }}" class="btn btn-danger float-right">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            
                        @error('permission')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <label for="">Permissions</label>

                            <div class="row">

                            @foreach($permissions as $permission)
                                <div class="col-md-2">
                                    <label for="">
                                      <input type="checkbox"
                                        name="permission[]"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}>
                                        {{ $permission->name }}
                                      </label>

                                    </div>
                            @endforeach

                            </div>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   </div>


















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
