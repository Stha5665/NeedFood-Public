<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
            <title>NeedFood Register-Page</title>
        </head>
        <body>
            <main class="signup-form" style="margin-top:80px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <h3 class="card-header text-center text-primary">Register User</h3>
                                <div class="card-body">
                                    <form action="{{route('registers.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <input type="text" placeholder="First Name*" id="first_name" class="form-control" name="first_name"
                                                       autofocus>
                                                @error('first_name')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <input type="text" placeholder="Middle Name" id="middle_name" class="form-control" name="middle_name"
                                                       autofocus>
                                                @error('middle_name')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <input type="text" placeholder="Last Name*" id="last_name" class="form-control" name="last_name"
                                                       autofocus>
                                                @error('last_name')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <input type="text" placeholder="Email*" id="email_address" class="form-control"
                                                       name="email" autofocus>
                                                @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <input type="text" placeholder="Phone Number*" id="phone_number" class="form-control"
                                                       name="phone_number" autofocus>
                                                @error('phone_number')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="password" placeholder="Password*" id="password" class="form-control"
                                                       name="password" >
                                                @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="password" placeholder="Confirm Password*" id="confirmed" class="form-control"
                                                       name="password_confirmation" >
                                                @error('password_confirmation')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="d-grid mx-auto">
                                                <button class="main-btn">REGISTER
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
</html>
