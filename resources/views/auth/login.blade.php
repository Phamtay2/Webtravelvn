<!DOCTYPE html>
<html>
<head>
    <base href="/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>
<body class="hold-transition register-page">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
    <a href="login" ><b class="login-box-msg">Login</b></a>
  
  <!-- /.login-logo -->
  
    <p class="login-box-msg">Sign in to start your session</p>
        
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                @if (Session::has('ok'))
                <script>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('ok') }}
                </div>
                </script>
                @endif
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"> Email</label>
                 <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="invalid-feedback"></span>
                @error('email') <small>{{ $message }}</small> @enderror
                </div>
                
            </div>
             
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end"> Password</label>

                <div class="col-md-6">
                <input type="password" name="password" class="form-control" placeholder="Password">

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password') <small>{{ $message }}</small> @enderror
                </div>
                
            </div>
            
                <!-- /.col -->
                <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    {{-- <a href="{{ route('auth.login') }}" class="btn btn-link">I forgot my password</a> --}}
                                   <a href="{{ route('user.register') }}" class="btn btn-link">Register</a>
                                </div>
                                    </div>
            </form>
            <!-- /.social-auth-links -->

            
        </div>
            </div>
                </div>
                    </div>
                        </div>

</body>
</html>
