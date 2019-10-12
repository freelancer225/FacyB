<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/style.css')}}">
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> -->
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap-select.min.css')}}">
        <link href="{{asset ('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
        

        <style type="">          
          .inner_msg{
            clear: both;
            padding: 10px;
            margin: 0 auto;
            width:99%;
            background-color:#efefef;
            border:1px solid #ccc;
            min-height: 150px;
          }
          .inner_msg p{
            color:#000; font-size:15px;
            text-align: center;

          }
          .list option{
            margin-top: 10px
          }
          .inboxMain{
            min-height:400px; 
            background-color:#fff; 
            padding:10px;
            border:1px solid #ccc;
            margin-bottom: 5%;
          }
          .inboxRow{
            border-bottom:1px solid #ccc; padding:10px
          }

          .inline-block{
            display:inline-block;
          }
        </style>
        
    </head>
    <body>
    @include('Front/layouts/partials/_nav')

    @yield('section')

      <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-3 col-lg-3 hidden-xs">
            <h5>Nos métiers</h5>
            <div class="ft-link">
              <ul>
                @foreach(App\domains::all() as $metier)
                  <li><a href="">{{$metier->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3 hidden-xs">
             <h5>Nos filières</h5>
             <div class="ft-link">
              <ul>
                @foreach(App\filieres::all() as $secteur)
                  <li><a href="">{{$secteur->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="col-sm-5 col-lg-4">
            <h5>Newsletter</h5>
            <div class="newsletter">
              <p>SiInscrivez-vous pour recevoir les dernières mises à jour et plus par courriel.</p>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="entrez votre email...">
                <span class="input-group-btn">
                  <input type="submit" class="btn btn-default" type="button" Value="Subscribe" />
                </span>
              </div>
              <ul class="social">
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="youtube"><i class="fa fa-play"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="copyrt">
            &copy; 2019 Sydy. All Rights Reserved. <a href="terms-conditions.php">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/bootstrap-select.min.js')}}"></script>
   

    @yield('script')

    </body>
</html>
