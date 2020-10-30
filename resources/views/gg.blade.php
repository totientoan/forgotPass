<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/app.css">
    

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">nhập email</h3>
                    </div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                            </div>
                         @endif
            
                        @if (session('thongbao'))
                           
                                {{session('thongbao')}}
                            </div>
                        @endif

                        <form role="form" action="resetpassword" method="POST">
                            {{-- @csrf  --}}
                            {{ csrf_field() }}
                            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> --}}
                            
                                
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                
                            <button type="submit">Reset</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>
