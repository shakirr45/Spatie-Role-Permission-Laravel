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
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                    <a href="{{ url('users') }}" class="btn btn-danger float-right">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ url('users/'.$user->id) }}" method="POST">
                        @csrf

                        @method('PUT')

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        @error('name')
                           <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" readonly class="form-control" value="{{ $user->email }}">
                           
                        </div>

                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Roles</label>

                            <select name="roles[]" id=""class="form-control" multiple>
                            <option value="">Select Roles</option>
                                @foreach($roles as $role)
                                <option value="{{$role}}" {{ in_array($role, $userRoles) ? 'selected':'' }}>{{$role}}</option>
                                @endforeach
                            </select>

                            @error('roles')
                           <span class="text-danger">{{$message}}</span>
                            @enderror

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
