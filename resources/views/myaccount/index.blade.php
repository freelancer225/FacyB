@extends('layouts.front')

@section('section')
  <div class="greyBg">
    <div class="container">
        <div class="wrapper">
          <div class="row">
              <div class="col-sm-12">
                <div class="breadcrumbs">
                  <ul>
                    <li><a href="{{url('/')}}">Home </a></li>
                    <li>
                      <span class="dot">/</span>
                      <a href="{{url('/home')}}"> {{Auth::user()->name}}</a>
                    </li>
                  </ul>
                </div>
              </div>
          </div>

          <div class="row top25">
            <div class="panel panel-body">
                <h2 align="prod"><h2 align="center">Mon Compte</h2> </h2>
                <div class="panel-body">
                    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif

                  @if(isset($link))

                    <div class="myContent">
                      <ul class="nav nav-pills">
                          
                              

                          @if($link=="profile")
                              
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                             
                              
                            
                          
                          @else
                              something else
                          @endif
                      </ul>
                    </div>
                  @else
                  <div class="myContent">

                    <ul class="nav nav-pills">                    
                     
                      <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                      
                    </ul>

                    <div class="tab-content col-md-12">
                      
                      <div id="profile" class="tab-pane fade in active">
                        <form action="{{url('saveAdresse')}}" method="post" enctype="multipart/form-data" style="color:#333">
                          {{csrf_field()}}
                          <div class="row">
                            <div class="col-md-8">
                              <label>Name</label>
                              <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                              <br>

                              <label>Email</label>
                              <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" readonly style="background-color: #efefef">
                              <br>
                              
                              <label>Metier</label>
                              
                              <select id="metier" name="metier" class="selectpicker form-control edit" data-live-search="true" style="width:100%">
                                
                                @foreach(App\domains::all() as $cData)
                                  <option value="{{$cData->name}}"> {{$cData->name}} </option>
                                  
                                @endforeach 
                                
                              <select> <br>
                              
                              <br>
                              
                              <label for="">Secteur</label>
                              
                              <select name="secteur" id="secteur" multiple class="selectpicker form-control edit" data-live-search="true" style="width:100%">
                                
                                @foreach(App\filieres::all() as $cData)
                                @if(old('secteur'))
                                  <option value="{{ $cData->name }}" selected>Auth::user()->secteur</option>
                                @else
                                    <option value="{{$cData->name}}">
                                    {{$cData->name}}
                                    </option>
                                @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="hidden_secteur" id="hidden_secteur" value="{{old('secteur') ? old('secteur') : Auth::user()->secteur}}">
                              <br><br>
                              <label>Nom complet</label>
                              <input type="text" name="name_full" value="{{old('name_full') ? old('name_full') : Auth::user()->name_full}}" class="form-control" placeholder="Votre nom complet">
                              <br>

                              <label>Ville</label>
                                <input type="text" name="ville" value="{{old('ville') ? old('ville') : Auth::user()->ville}}" class="form-control" placeholder="Votre ville">
                              <br>

                              <label>Quartier</label>
                                <input type="text" name="quartier" value="{{old('quartier') ? old('quartier') : Auth::user()->quartier}}" class="form-control" placeholder="Votre quartier">
                              <br>
                              <label>Numéro de téléphone</label>
                                <input type="text" name="tel" value="{{old('tel') ? old('tel') : Auth::user()->tel}}" class="form-control" placeholder="Votre numéro de téléphone">
                              <br>
                            </div>
                            <div class="col-md-4">
                              <div style="height:350px; width:100%; background-color:#f8f8f8; border:1px #ddd solid; margin-top:13%; padding:7%">
                                <img src= "@if (Auth::user()->file) {{url('/img')}}/{{Auth::user()->file}} @else  {{url('/img')}}/user.png @endif"
                                        width="100%"/>
                                </div>
                              <label>Photo</label>
                              <input type="file" name="file" id="file" class="form-control">
                              <input type="hidden" name="file_old" id="file_old" class="form-control" value="{{old('file') ? old('file') : Auth::user()->file}}" >
                              <br>
                            </div>
                          </div>

                          <input type="submit" name="" class="btn btn-primary" value="Mettre à jour">
                          <a href="{{url('/home')}}"  name="" class="btn btn-danger" value="">Retour</a>
                        </form>
                      </div>
                      
                      
                      
                    </div>
                  </div>
                  @endif
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
@section('script')
<script>
      $(document).ready(function() {
        $('#secteur').on("change",function(){
           $('#hidden_secteur').val($('#secteur').val());
        })
         
      });
  </script>
  <!-- <script type="text/javascript">
    $(document).ready(function(){

      $("#msgFormation").hide();
      $("#msgExperience").hide();

      var i=1;

      $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="col-md-12" style="color:#333 !important"><div class="row"><div class="form-group col-md-2"><input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac-1"><label class="control-label" >Bac-1</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac"><label class="control-label">Bac</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+1"><label>Bac +1</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+2"><label>Bac +2</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+3"><label>Bac +3</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+4"><label>Bac +4 et plus</label></div></div><div class="row"><div class="form-group col-md-5"><label class="control-label col-md-5">Date de début</label><input type="date" name="start[]" id="start" class="form-control col-md-7 name_list" style="width:50% !important"> </div><div class="form-group col-md-5">  <label class="control-label col-md-5">Date de fin</label><input type="date" name="end[]" id="end" class="form-control col-md-7 name_list" style="width:50% !important"></div><div class="form-group col-md-2">  <input type="checkbox" name="today[]" id="today" class="name_list">  <label>à aujourd\'hui</label></div></div><div class="row"><div class="form-group col-md-6">  <input type="text" name="name_formation[]" id="name_formation" class="form-control name_list" placeholder="Titre complet de votre formation"></div><div class="form-group col-md-6">  <input type="text" name="name_ecole[]" id="name_ecole" class="form-control name_list" placeholder="Nom de l\'école ou de l\'étalissement"></div></div><div class="row"><div class="form-group col-md-12">  <textarea type="text" rows="8" name="description[]" id="description" class="form-control name_list" placeholder="Saississez une description détaillé de votre formation"></textarea></div></div></div></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      
      });
      $('#add1').click(function(){
        i++;
        $('#dynamic_field1').append('<tr id="row'+i+'"><td><div class="col-md-12" style="color:#333 !important"><div class="row"><div class="form-group col-md-5"><label class="control-label col-md-5">Date de début</label><input type="date" name="start_exp[]" id="start_exp" class="form-control col-md-7 name_list" style="width:50% !important"> </div><div class="form-group col-md-5">  <label class="control-label col-md-5">Date de fin</label><input type="date" name="end_exp[]" id="end_exp" class="form-control col-md-7 name_list" style="width:50% !important"></div><div class="form-group col-md-2">  <input type="checkbox" name="today_exp[]" id="today_exp" class="name_list">  <label>à aujourd\'hui</label></div></div><div class="row"><div class="form-group col-md-6">  <input type="text" name="poste[]" id="poste" class="form-control name_list" placeholder="Intitulé de poste"></div><div class="form-group col-md-6">  <input type="text" name="entreprise[]" id="entreprise" class="form-control name_list" placeholder="Nom de l\'entreprise"></div></div><div class="row"><div class="form-group col-md-12">  <textarea type="text" rows="8" name="description_exp[]" id="description_exp" class="form-control name_list" placeholder="Saississez une description détaillée de votre expérience professionnelle(récommandée au moins 150 caractères)"></textarea></div></div></div></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      
      });

      $(document).on('click', '.btn_remove',function(){
        var button_id = $(this).attr("id");
        $("#row"+button_id+"").remove();

      });


      $("#btnFormation").click(function(){
        $.ajax({
          type:"POST",
          url: "<?php echo url('saveFormation') ?>",
          data:$('#add_formation').serializeArray(),
          success:function(data){

            $("#msg").show();
                      $("#msg").html("la filière à été bien ajoutée");
                      $("#msg").fadeOut(2000);
                      $('#add_formation')[0].reset();
          }
        });
      });

      $("#btnExperience").click(function(){
        $.ajax({
          type:"POST",
          url: "<?php echo url('saveExperience') ?>",
          data:$('#add_experience').serializeArray(),
          success:function(data){

            $("#msg").show();
                      $("#msg").html("la filière à été bien ajoutée");
                      $("#msg").fadeOut(2000);
                      $('#add_experience')[0].reset();
          }
        });
      });


    });
  </script> -->
@endsection