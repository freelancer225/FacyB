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
                          @if($link=="cv")
                              <li class="active"><a href="#cv" data-toggle="tab">cv</a></li>
                              <!-- <li><a href="#profile" data-toggle="tab" style="color:#333 !important">Profile</a></li> -->
                              <li><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expériences</a></li>
                              <li><a href="#langues" data-toggle="tab" style="color:#333 !important">Langues</a></li>

                          <!-- @elseif($link=="profile")
                              <li><a href="#cv" data-toggle="tab" style="color:#333 !important">cv</a></li>
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                              <li><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expériences</a></li>
                              <li><a href="#competences" data-toggle="tab" style="color:#333 !important">Compétences</a></li> -->
                            
                          @elseif($link=="formations")
                              <li><a href="#cv" data-toggle="tab" style="color:#333 !important">cv</a></li>
                              <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                              <li class="active"><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expérience</a></li>
                              <li><a href="#competences" data-toggle="tab" style="color:#333 !important">Compétences</a></li>
                              <li><a href="#langues" data-toggle="tab" style="color:#333 !important">Langues</a></li>

                          @elseif($link=="experiences")
                              <li><a href="#cv" data-toggle="tab" style="color:#333 !important">cv</a></li>
                              <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                              <li><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li class="active"><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expériences</a></li>
                              <li><a href="#competences" data-toggle="tab" style="color:#333 !important">Compétences</a></li>
                              <li><a href="#langues" data-toggle="tab" style="color:#333 !important">Langues</a></li>

                          @elseif($link=="competences")
                              <li><a href="#cv" data-toggle="tab" style="color:#333 !important">cv</a></li>
                              <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                              <li><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expérience</a></li>
                              <li class="active"><a href="#competences" data-toggle="tab" style="color:#333 !important">Compétences</a></li>
                              <li><a href="#langues" data-toggle="tab" style="color:#333 !important">Langues</a></li>

                          @elseif($link=="langues")
                              <li><a href="#cv" data-toggle="tab" style="color:#333 !important">cv</a></li>
                              <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                              <li><a href="#formations" data-toggle="tab" style="color:#333 !important">Formations</a></li>
                              <li><a href="#experiences" data-toggle="tab" style="color:#333 !important">Expérience</a></li>
                              <li><a href="#competences" data-toggle="tab" style="color:#333 !important">Compétences</a></li>
                              <li class="active"><a href="#langues" data-toggle="tab" style="color:#333 !important">Langues</a></li>
                          @else
                              something else
                          @endif
                      </ul>
                    </div>
                  @else
                  <div class="myContent">

                    <ul class="nav nav-pills">                    
                      <li class="active"> <a href="#cv" data-toggle="tab">CV</a></li>
                      <!-- <li><a href="#profile" data-toggle="tab">Profile</a></li> -->
                      <li><a href="#formations" data-toggle="tab">Formations</a></li>
                      <li><a href="#experiences" data-toggle="tab">Expérience</a></li>
                      <li><a href="#competences" data-toggle="tab">Compétences</a></li>
                      <li><a href="#langues" data-toggle="tab">Langues</a></li>
                    </ul>

                    <div class="tab-content col-md-12">
                      <div id="cv" class="tab-pane fade in active">
                        <div class="card" style="background-color:#efefef; padding:2%; border:1px solid #ccc; margin-top:2%">
                          <div class="card-body">
                            
                            <h3 class="card-title">Données personnelles</h3>
                            <img src="@if (Auth()->user()->file){{Config::get('app.url')}}:8000/img/{{Auth()->user()->file}} @else {{Config::get('app.url')}}:8000/img/user.png @endif"  alt="" height="100px" width="100px">
                            <div class="card-text">
                              <p>{{Auth()->user()->name}} <br> <span style="font-size:15px !important; font-weight:bold">Email : </span>{{Auth()->user()->email}}</p> 
                            </div>
                            <h3 class="card-title">Formations</h3>
                            <div class="card-text" style="color:#333">
                              @if($formations->count()!="0")
                                @foreach($formations as $formation)
                                  <div class="row">
                                    <?php $temp = explode('-',$formation->start); $temp_end = explode('-',$formation->end); ?>
                                    <div class="col-md-2 text-right">
                                      <span style="font-size:15px !important; font-weight:bold">{{$temp[0] }} - {{$temp_end[0]}} : </span>
                                    </div>
                                    <div class="col-md-3 text-left">
                                      <span style="font-size:15px !important; font-weight:bold"> {{$formation->name_formation}}</span>
                                    </div>
                                    <div class="col-md-3 col-md-offset-3 text-right">
                                      <!-- <a href="{{url('/editFormation')}}/{{$formation->id}}" class="glyphicon glyphicon-pencil"></a> -->

                                      <form action="{{url('/deleteFormation')}}/{{$formation->id}}" 
                                        method="POST"
                                        enctype="multipart/form-data"
                                        class = "inline-block"
                                        onsubmit="return confirm('Etes-vous sur de vouloir supprimer la formation?')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="supprimer" class="btn btn-xs btn-danger">
                                        
                                    </form>
                                      <!-- <a type="button" href="{{url('/deleteFormation')}}/{{$formation->id}}" data-method="DELETE" data-confirm="Etes vous sur de vouloir supprimer?">
                                      <span style="color:red" class="glyphicon glyphicon-trash"> </span></a> -->
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-offset-2 col-md-3">
                                      <span style="font-size:15px !important; font-style:italic">{{$formation->name_ecole}} </span>
                                    </div>                                
                                  </div>                         
                                @endforeach
                                
                              @else
                              <p>Aucun resultat</p>
                              @endif
                            </div><hr style="border-top: 1px solid #000 !important">
                            <h3 class="card-title">Expériences</h3>
                            <div class="card-text" style="color:#333">
                              @if($experiences->count()=="0")
                              <p>Aucune donnée</p>
                              @else
                                @foreach($experiences as $experience)
                                  <div class="row">
                                    <?php $temps = explode('-',$experience->start_exp); $temps_end = explode('-',$experience->end_exp); ?>
                                    <div class="col-md-2 text-right">
                                      <span style="font-size:15px !important; font-weight:bold">{{$temps[0] }} - {{$temps_end[0]}} : </span>
                                    </div>
                                    <div class="col-md-3 text-left">
                                      <span style="font-size:15px !important; font-weight:bold"> {{$experience->poste}}</span>
                                    </div>
                                    <div class="col-md-3 col-md-offset-3 text-right">
                                      <!-- <a href="{{url('/editFormation')}}/{{$experience->id}}" class="glyphicon glyphicon-pencil"></a> -->

                                      <form action="{{url('/deleteExperience')}}/{{$experience->id}}" 
                                        method="POST"
                                        enctype="multipart/form-data"
                                        class = "inline-block"
                                        onsubmit="return confirm('Etes-vous sur de vouloir supprimer la formation?')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="supprimer" class="btn btn-xs btn-danger">
                                        
                                    </form>
                                      
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-offset-2 col-md-3">
                                      <span style="font-size:15px !important; font-style:italic">{{$experience->description_exp}} </span>
                                    </div>                                
                                  </div>  
                                @endforeach
                              @endif
                            </div><hr style="border-top: 1px solid #000 !important">
                            <h3 class="card-title">Compétences</h3>
                            <div class="card-text" style="color:#333">
                              @if($competences->count()!="0")
                                @foreach($competences as $competence)
                                  <div class="row">
                                    <div class="col-md-2 text-right">
                                      <span style="font-size:15px !important; font-weight:bold">{{$competence->name_comp}} </span>
                                    </div>
                                    <div class="col-md-3 text-left">
                                      <span style="font-size:15px !important; font-style:italic"> ({{$competence->niveau_comp}})</span>
                                    </div>
                                    <div class="col-md-3 col-md-offset-3 text-right">
                                      <!-- <a href="{{url('/editCompetence')}}/{{$competence->id}}" class="glyphicon glyphicon-pencil"></a> -->
                                      <form action="{{url('/deleteCompetence')}}/{{$competence->id}}" 
                                        method="POST"
                                        enctype="multipart/form-data"
                                        class = "inline-block"
                                        onsubmit="return confirm('Etes-vous sur de vouloir supprimer la Competence?')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="supprimer" class="btn btn-xs btn-danger">  
                                      </form>
                                    </div>
                                  </div>
                                                             
                                @endforeach
                                
                              @else
                              <p>Aucun resultat</p>
                              @endif
                            </div><hr style="border-top: 1px solid #000 !important">
                            <h3 class="card-title">Langues</h3>
                            <div class="card-text" style="color:#333">
                              @if($langues->count()!="0")
                                @foreach($langues as $langue)
                                  <div class="row">
                                    <div class="col-md-2 text-right">
                                      <span style="font-size:15px !important; font-weight:bold">{{$langue->name_lang}} </span>
                                    </div>
                                    <div class="col-md-3 text-left">
                                      <span style="font-size:15px !important; font-style:italic"> ({{$langue->niveau_lang}})</span>
                                    </div>
                                    <div class="col-md-3 col-md-offset-3 text-right">
                                      <!-- <a href="{{url('/editCompentence')}}/{{$competence->id}}" class="glyphicon glyphicon-pencil"></a> -->
                                      <form action="{{url('/deleteLangue')}}/{{$langue->id}}" 
                                        method="POST"
                                        enctype="multipart/form-data"
                                        class = "inline-block"
                                        onsubmit="return confirm('Etes-vous sur de vouloir supprimer la langue?')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="supprimer" class="btn btn-xs btn-danger">  
                                      </form>
                                    </div>
                                  </div>
                                   <br>                      
                                @endforeach
                                
                              @else
                              <p>Aucun resultat</p>
                              @endif
                            </div>
                          </div>
                          
                        </div><br>
                        
                          <a href="{{url('/home')}}"  name="" class="btn btn-danger">Retour</a>
                        
                      </div>
                      <!-- <div id="profile" class="tab-pane fade in">
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
                              <input type="text" name="metier" value="{{old('metier') ? old('metier') : Auth::user()->metier}}" class="form-control" placeholder="Votre nom complet">
                              <br>

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
                              <br>
                            </div>
                          </div>

                          <input type="submit" name="" class="btn btn-primary" value="Mettre à jour">
                        </form>
                      </div> -->
                      <div id="formations" class="tab-pane fade in">        
                        <form name="add_formation" id="add_formation">
                            {{csrf_field()}}
                          <p id="msgFormation" class="alert alert-success"></p>
                          
                          
                          <table class="table table-bordered" id="dynamic_field" style="margin-top:2%">
                            <tr>
                              <th colspan="2"><button type="button" name="add" id="add" class="btn btn-success" > Ajouter une formation</button></th>
                            </tr>
                            <tr>
                              <td>
                                <div class="col-md-12" style="color:#333 !important">
                                  <div class="row">
                                    <div class="form-group col-md-2">
                                      <input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id">
                                      <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac-1">
                                      <label class="control-label" >Bac-1</label>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac">
                                      <label class="control-label">Bac</label>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+1">
                                      <label>Bac +1</label>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+2">
                                      <label>Bac +2</label>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+3">
                                      <label>Bac +3</label>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+4">
                                      <label>Bac +4 et plus</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-5">
                                      <label class="control-label col-md-5" > Date de début</label>
                                      <input type="date" name="start[]" id="start" class="form-control col-md-7 name_list" style="width:50% !important">
                                    </div>
                                    <div class="form-group col-md-5">
                                      <label class="control-label col-md-5">Date de fin</label>

                                      <input type="date" name="end[]" id="end" class="form-control col-md-7 name_list" style="width:50% !important">
                                    </div>
                                    <div class="form-group col-md-2">
                                      <input type="checkbox" name="today[]" id="today" class="name_list">
                                      <label>à aujourd'hui</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <input type="text" name="name_formation[]" id="name_formation" class="form-control name_list" placeholder="Titre complet de votre formation">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <input type="text" name="name_ecole[]" id="name_ecole" class="form-control name_list" placeholder="Nom de l'école ou de l'étalissement">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12">
                                      <textarea type="text" rows="8" name="description[]" id="description" class="form-control name_list" placeholder="Saississez une description détaillé de votre formation"></textarea>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td></td>
                            </tr>
                          </table>
                          
                          <div class="form-group">
                            <input type="button" class="btn btn-primary" value="Enregistrer" id="btnFormation">
                            <a href="{{url('/home')}}"  name="" class="btn btn-danger">Retour</a>
                          </div>
                        </form>
                      </div>
                      <div id="experiences" class="tab-pane fade in">
                        <form name="add_experience" id="add_experience">
                              {{csrf_field()}}
                            <p id="msgExperience" class="alert alert-success"></p>
                            
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id">
                            <table class="table table-bordered" id="dynamic_field1" style="margin-top:2%">
                              <tr>
                                <th colspan="2"><button type="button" name="add1" id="add1" class="btn btn-success" > Ajouter</button></th>
                              </tr>
                              <tr>
                                <td>
                                  <div class="col-md-12" style="color:#333 !important">
                                    <div class="row">
                                      <div class="form-group col-md-5">
                                        <label class="control-label col-md-5">Date de début</label>
                                        <input type="date" name="start_exp[]" id="start_exp" class="form-control col-md-7 name_list" style="width:50% !important">
                                      </div>
                                      <div class="form-group col-md-5">
                                        <label class="control-label col-md-5">Date de fin</label>

                                        <input type="date" name="end_exp[]" id="end_exp" class="form-control col-md-7 name_list" style="width:50% !important">
                                      </div>
                                      <div class="form-group col-md-2">
                                        <input type="checkbox" name="today_exp[]" id="today_exp" class="name_list">
                                        <label>à aujourd'hui</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-6">
                                        <input type="text" name="poste[]" id="poste" class="form-control name_list" placeholder="Intitulé du poste">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <input type="text" name="entreprise[]" id="entreprise" class="form-control name_list" placeholder="Nom de l'entreprise">
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-12">
                                        <textarea type="text" rows="8" name="description_exp[]" id="description_exp" class="form-control name_list" placeholder="Saississez une description détaillée de votre expérience professionnelle(récommandée au moins 150 caractères)"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td></td>
                              </tr>
                            </table>
                            <div class="form-group">
                            <input type="button" class="btn btn-primary" value="Enregistrer" id="btnExperience">
                            <a href="{{url('/home')}}"  name="" class="btn btn-danger">Retour</a>
                          </div>
                        </form>
                      </div>
                      <div id="competences" class="tab-pane fade in">
                        <form name="add_competence" id="add_competence" style=" margin-top:2%">
                            {{csrf_field()}}
                          <p id="msgCompetence" class="alert alert-success"></p>
                          <input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id">
                          {{-- <input type="hidden" value="{{csrf_token()}}" id="token"> --}}
                        
                          <table class="table table-bordered" id="dynamic_comp">
                            <tr>
                              <td><input type="" name="name_comp[]" id="name_comp" class="form-control name_list"></td>
                              <td>
                                <select class="form-control" id="niveau_comp" name="niveau_comp[]">
                                  <option> Choisir un niveau de maitrise</option>
                                  <option value="excellent">Excellent</option>
                                  <option value="bon">Bon</option>
                                  <option value="moyen">Moyen</option>
                                  
                                </select>
                              </td>
                              <td><button type="button" name="add_comp" id="add_comp" class="btn btn-primary"> Ajouter</button></td>
                            </tr>
                          </table>
                          <div class="form-group">
                            <input type="button" class="btn btn-success" value="Enregistrer" id="btnComp">
                          </div>
                        </form>
                      </div>
                      <div id="langues" class="tab-pane fade in">
                        <form name="add_langue" id="add_langue" style=" margin-top:2%">
                            {{csrf_field()}}
                          <p id="msgLangue" class="alert alert-success"></p>
                          <input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id">
                          {{-- <input type="hidden" value="{{csrf_token()}}" id="token"> --}}
                        
                          <table class="table table-bordered" id="dynamic_lang">
                            <tr>
                              <td><input type="" name="name_lang[]" id="name_lang" class="form-control name_list"></td>
                              <td>
                                <select class="form-control" id="niveau_lang" name="niveau_lang[]">
                                  <option> Choisir un niveau de maitrise</option>
                                  <option value="excellent">Excellent</option>
                                  <option value="bon">Bon</option>
                                  <option value="moyen">Moyen</option>
                                  
                                </select>
                              </td>
                              <td><button type="button" name="add_lang" id="add_lang" class="btn btn-primary"> Ajouter</button></td>
                            </tr>
                          </table>
                          <div class="form-group">
                            <input type="button" class="btn btn-success" value="Enregistrer" id="btnLangue">
                          </div>
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
  <script type="text/javascript">
    $(document).ready(function(){

      $("#msgFormation").hide();
      $("#msgExperience").hide();
      $("#msgCompetence").hide();
      $("#msgLangue").hide();

      var i=1;

      $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="col-md-12" style="color:#333 !important"><div class="row"><div class="form-group col-md-2"><input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac-1"><label class="control-label" >Bac-1</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac"><label class="control-label">Bac</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+1"><label>Bac +1</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+2"><label>Bac +2</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+3"><label>Bac +3</label></div><div class="form-group col-md-2"><input type="checkbox" name="niveaux[]" id="niveaux" class="name_list" value="Bac+4"><label>Bac +4 et plus</label></div></div><div class="row"><div class="form-group col-md-5"><label class="control-label col-md-5">Date de début</label><input type="date" name="start[]" id="start" class="form-control col-md-7 name_list" style="width:50% !important"> </div><div class="form-group col-md-5">  <label class="control-label col-md-5">Date de fin</label><input type="date" name="end[]" id="end" class="form-control col-md-7 name_list" style="width:50% !important"></div><div class="form-group col-md-2">  <input type="checkbox" name="today[]" id="today" class="name_list">  <label>à aujourd\'hui</label></div></div><div class="row"><div class="form-group col-md-6">  <input type="text" name="name_formation[]" id="name_formation" class="form-control name_list" placeholder="Titre complet de votre formation"></div><div class="form-group col-md-6">  <input type="text" name="name_ecole[]" id="name_ecole" class="form-control name_list" placeholder="Nom de l\'école ou de l\'étalissement"></div></div><div class="row"><div class="form-group col-md-12">  <textarea type="text" rows="8" name="description[]" id="description" class="form-control name_list" placeholder="Saississez une description détaillé de votre formation"></textarea></div></div></div></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      
      });
      $('#add1').click(function(){
        i++;
        $('#dynamic_field1').append('<tr id="row'+i+'"><td><div class="col-md-12" style="color:#333 !important"><div class="row"><div class="form-group col-md-5"><input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id"><label class="control-label col-md-5">Date de début</label><input type="date" name="start_exp[]" id="start_exp" class="form-control col-md-7 name_list" style="width:50% !important"> </div><div class="form-group col-md-5">  <label class="control-label col-md-5">Date de fin</label><input type="date" name="end_exp[]" id="end_exp" class="form-control col-md-7 name_list" style="width:50% !important"></div><div class="form-group col-md-2">  <input type="checkbox" name="today_exp[]" id="today_exp" class="name_list">  <label>à aujourd\'hui</label></div></div><div class="row"><div class="form-group col-md-6">  <input type="text" name="poste[]" id="poste" class="form-control name_list" placeholder="Intitulé de poste"></div><div class="form-group col-md-6">  <input type="text" name="entreprise[]" id="entreprise" class="form-control name_list" placeholder="Nom de l\'entreprise"></div></div><div class="row"><div class="form-group col-md-12">  <textarea type="text" rows="8" name="description_exp[]" id="description_exp" class="form-control name_list" placeholder="Saississez une description détaillée de votre expérience professionnelle(récommandée au moins 150 caractères)"></textarea></div></div></div></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      
      });
      $('#add_comp').click(function(){
        i++;
        $('#dynamic_comp').append('<tr id="row'+i+'"><td><input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id"><input type="" name="name_comp[]" id="name_comp" class="form-control name_list"></td><td><select class="form-control" id="niveau_comp" name="niveau_comp[]" ><option> Choisir une catégorie</option><option value="excellent">Excellent</option><option value="bon">Bon</option><option value="moyen">Moyen</option></select></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $('#add_lang').click(function(){
        i++;
        $('#dynamic_lang').append('<tr id="row'+i+'"><td><input type="hidden" value="{{Auth::user()->id}}" name="user_id[]" id="user_id"><input type="" name="name_lang[]" id="name_lang" class="form-control name_list"></td><td><select class="form-control" id="niveau_lang" name="niveau_lang[]" ><option> Choisir une catégorie</option><option value="excellent">Excellent</option><option value="bon">Bon</option><option value="moyen">Moyen</option></select></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
            location.href = "http://localhost:8000/myaccount/profile"
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
            location.href = "http://localhost:8000/myaccount/profile"
                      
          }
        });
      });

      $("#btnComp").click(function(){
        $.ajax({
          type:"POST",
          url: "<?php echo url('saveCompetence') ?>",
          data:$('#add_competence').serializeArray(),
          success:function(data){

            $("#msgCompetence").show();
            $("#msgCompetence").html("la filière à été bien ajoutée");
            $("#msgCompetence").fadeOut(2000);
            $('#add_competence')[0].reset();
            location.href = "http://localhost:8000/myaccount/profile"
          }
        });
      });

      $("#btnLangue").click(function(){
        $.ajax({
          type:"POST",
          url: "<?php echo url('saveLangue') ?>",
          data:$('#add_langue').serializeArray(),
          success:function(data){

            $("#msgLangue").show();
            $("#msgLangue").html("la filière à été bien ajoutée");
            $("#msgLangue").fadeOut(2000);
            $('#add_langue')[0].reset();
            location.href = "http://localhost:8000/myaccount/profile"
          }
        });
      });

    });
  </script>
  
@endsection