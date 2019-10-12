<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7-dist/css/cover.css')}}">
        
    </head>
    <body style="background: url('cover.png');"  >
        @include('Front/layouts/partials/_nav')

        <div class="container">
            <div class="cover-container">   
            <div class="starter-template">
                <h1>Consulter les profils et récruter</h1>
                
                <h2> <i> Les meilleurs étudiants</i></h2>
                    
                <form class="inline-form" style="padding-left: 14% !important;padding-right: 14% !important;">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        
                        <select id="inputState" class="form-control form-accueil">
                            <option selected>Par metier</option>
                            @foreach(App\domains::all() as $cData)
                                <option value="{{$cData->id}}">
                                    {{$cData->name}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        
                        <select id="inputState" class="form-control form-accueil">
                            <option selected>Par secteur</option>
                            @foreach(App\filieres::all() as $cData)
                                <option value="{{$cData->id}}">
                                    {{$cData->name}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        <input type="button" class="form-control btn btn-primary" value="RECHERCHER" style="height: 50px; font-weight: bold">
                        </div>
                    </div>
                </form>

            </div>
            <a class="btnAccueil" href="{{url('/profils')}}"> ACCEDEZ</a>
            </div>
        </div><!-- /.container -->

    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.js')}}"></script>

    </body>
</html>
