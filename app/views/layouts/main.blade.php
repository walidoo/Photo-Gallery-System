<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Photo Gallery</title>
    {{ HTML::style('public/packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css')}}
    {{ HTML::style('public/packages/bootstrap/css/thumbnail-gallery.css')}}
    <!-- {{ HTML::style('public/packages/bootstrap/css/bootstrap-theme.min.css')}} -->
    <!-- {{ HTML::style('public/packages/bootstrap/css/jquery-ui.css')}} -->
    <!-- {{ HTML::style('public/packages/bootstrap/css/dataTables.jqueryui.css')}} -->
    {{ HTML::style('https://cdn.datatables.net/plug-ins/1.10.7/integration/jqueryui/dataTables.jqueryui.css')}}
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css')}}
    {{ HTML::style('public/css/main.css')}}
    {{ HTML::script('public/js/jquery-2.1.4.js')}}
    {{ HTML::script('public/js/ajax_conn.js')}}
    {{ HTML::script('public/js/dataTables.jqueryui.min.js')}}
    <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link href='http://localhost/wr/public/css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
    <link href='http://localhost/wr/public/css/demoo.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/wr/public/css/simple-lightbox.js"></script>
    <!-- {{ HTML::script('public/js/jquery.dataTables.min.js')}} -->
    <!-- {{ HTML::script('https://cdn.datatables.net/1.10.9/js/dataTables.jqueryui.min.js')}} -->
    {{ HTML::script('http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js')}}

    {{ HTML::script('public/js/datatables.js')}}\
    <script>
        $(function(){
            var gallery = $('.thumb a').simpleLightbox();
        });
    </script>

</head>
 
<body>
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav">
                @if(!Auth::check())
                    <li>{{ HTML::link('users/', 'Home') }}</li>
                    <li>{{ HTML::link('users/register', 'Register') }}</li>   
                    <li>{{ HTML::link('users/login', 'Login') }}</li>   
                @else
                    <li>{{ HTML::link('users/', 'Home') }}</li>
                    <li>{{ HTML::link('users/dashboard', 'Dashboard') }}</li>
                    <li>{{ HTML::link('users/profile?pid='.Auth::id(), 'View Profile') }}</li>
                    <li>{{ HTML::link('users/logout', 'logout') }}</li>
                @endif
      </ul>
    </div>
  </div>
</nav>


    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="dd">{{ Session::get('message') }}</p>
            </div>
        @endif
          {{ $content }}

    </div> 


  <footer>
    <div id="footer" class="footer">
        
      <p class="footerp">All copyrights Reserved &copy;i2i vision 2015</p>
    <div>
  </footer>
 
</body>

</html>