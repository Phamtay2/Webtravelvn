
<!DOCTYPE html>
<html>
<head>
    <base href="/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
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
    <a href=""><b>Register</b></a>
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('user.register') }}" method="post">
      @csrf
      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
         <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="Full name">
          <span class="invalid-feedback"></span>
          @error('name') <small>{{ $message }}</small> @enderror
        </div>
      </div>
      <div class="row mb-3">
         <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email') <small>{{ $message }}</small> @enderror
          </div>

      </div>
     <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
         <div class="col-md-6">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error('password') <small>{{ $message }}</small> @enderror
          </div>
      </div>
     <div class="row mb-3">
       <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

          <div class="col-md-6">
            <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @error('confirm_password') <small>{{ $message }}</small> @enderror
          </div>
      </div>
       <div class="row mb-0">
         <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('user.login') }}" class="text-center">I already have a membership</a>

        </div>
      </div>
    </form>
          </div>
        </div>
      </div>
  </div>
</div>
</body>
</html>
