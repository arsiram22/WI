<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wi | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="messages">
    @if(Session::has('message'))
    <div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
    <i class="ace-icon fa fa-times"></i>
    </button>
    {!!Session::get('message')!!}
    </div>
    @endif

    @foreach($errors->all() as $error)
    <div class="alert alert-block alert-danger">
    <button data-dismiss="alert" class="close close-sm" type="button">
    <i class="fa fa-times"></i>
    </button>
    {{ $error }}
    </div>
    @endforeach
</div>
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">WI</h1>

        </div>
        <h3>Wirelessindo</h3>
        {{--<p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.--}}
            {{--<!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->--}}
        {{--</p>--}}
        {{--<p>Login in. To see it in action.</p>--}}
        <form class="m-t" role="form" action="{{route('login')}}" method='post'>
            @csrf
            @method('post')
            <div class="form-group">
                <input type="name" class="form-control" placeholder="username / e-mail" required="" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" required="" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            {{--<a href="#"><small>Forgot password?</small></a>--}}
        </form>
        <p class="m-t"> <small></small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
