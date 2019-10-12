@extends('layouts.front')

@section('section')
<div class="greyBg">	      

<div class="container">
        <div class="row">
      <div class="col-md-12">
          <h3 style="text-align: center; color:#333; text-transform: uppercase; letter-spacing: -2px; font-family: 'montserrat black'; ">
              Recherchez un profil
          </h3>
      </div>
      </div>
  
  
        <div class="row">
            <div class="col-md-3">	
                <h5 style="color:#333; font-weight: bold; text-transform: uppercase; border-left:3px solid #337ab7; padding-left: 2px" >{{$count}} profils Trouvés</h5>
            </div>
            <form action="{{url('search')}}">
                <div class="col-md-6">	
                    <input class="form-control" name="searchData" placeholder="Search" style="margin-bottom: 5px;" />
                </div>
        
                <div class="col-md-3">
                    <button class="btn btn-primary" data-sort="name">
                        Rechercher par métier
                    </button>
                </div> 
            </form> 
        </div>
    <div class="row">

      <div class="list-group list">
        @foreach($etudiants as $etudiant)
            <a href="#" class="list-group-item">
            <div class="col-md-10">
                <img src="@if ($etudiant->file) {{url('/img')}}/{{$etudiant->file}} @else  {{url('/img')}}/user.png @endif" class="pull-left photo">
                <h4 class="list-group-item-heading name left">{{$etudiant->name}}</h4>
                <p class="list-group-item-text title">{{$etudiant->email}}</p>
            </div>
            <div class="col-md-2">
                <div class="expertise">
                <div class="read-more">
                    <button type="button" class="btn btn-primary btn-more">voir plus &nbsp; <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
                </div>
                    <span class="expertise-label">Secteur &nbsp;</span>
                    <p class="labels">
                        <?php $tags = explode(',',$etudiant->secteur); ?>
                        @foreach ($tags as $tag)
                        <span class="label label-default expertise">{{$tag}}</span>
                         @endforeach
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            </a>
         @endforeach
      </div>
    </div>
  
</div>
</div>
@endsection