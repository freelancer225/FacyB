<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="icon" href="../../favicon.ico">

    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset ('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/style.css')}}" rel="stylesheet">
    <link href="{{asset ('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
    <!-- <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset ('css/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    

    
    <!-- Optional - Adds useful class to manipulate icon font display -->
    <link rel="stylesheet" href="{{asset ('css/pe-icon-7-stroke/css/helper.css')}}">
</head>
<style>
  .inline-block{
    display:inline-block;
  }
  body{
    font-family:"montserrat" !important;
  }
</style>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/admin')}} ">Admin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('')}}">Dashboard</a></li>
            <li><a href="pages.html">Utilisateurs</a></li>
            <li><a href="{{url('admin/domaines')}}">Domaines</a></li>
            <li><a href="{{url('admin/addfillieres')}}">Filières</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">Bienvenue, {{ Auth::user()->name }}</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard<small> Manage your site</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Créer un contenu
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
              <div class="list-group">
                <a href="index.html" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                </a>
                <a href="{{url('admin/domaines')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Domaines d'activités <span class="badge" id="countDomaine"></span> </a>
                <a href="{{url('admin/addfillieres')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Filières <span class="badge">{{App\filieres::count()}}</span></a>
                <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Utilisateurs <span class="badge">{{App\user::where('role',NULL)->count()}}</span></a>
              </div>

              <div class="well">
                <h4>Disk Space Used</h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                    60%
                  </div>
                </div>
                <h4>Disk Space Used</h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    40%
                  </div>
                </div>
              </div>
            </div>
          @yield('content')  
        </div> 
      </div> 
    </section>

    <!-- Modal -->

    <!--- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Page</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Titre de la Page</label>
                <input type="text" class="form-control" placeholder="Page Title">
              </div>
              <div class="form-group">
                <label>Corps de la page</label>
                <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="">
                </label>
              </div>
              <div class="form-group">
                <label>Meta Tags</label>
                <input type="text" class="form-control" placeholder="Add">
              </div>
              <div class="form-group">
                <label>Meta description</label>
                <input type="text" class="form-control" placeholder="Add Meta Description">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    
    
    
    <!-- <script src="{{asset('js/jquery-3.3.1.js')}}"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script> -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
    @yield('script')
    <script type="text/javascript">
  
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    
    </script>
    <script>
      var auto_refresh = setInterval(
			function(){
			$('#countDomaine').load('<?php echo url('admin/count/countDomaine');?>').fadeIn("slow");
			
			},100);</script>
  </body>
</html>

</body>
</html>