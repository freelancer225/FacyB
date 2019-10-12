@extends('admin.layouts.master')

@section('content')
  
          
            
<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Vue d'ensemble</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-3">
        <div class="well dash-box">
          <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{App\user::where('role',NULL)->count()}}</h2>
          <h4>Utilisateurs</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="well dash-box">
          <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{App\domains::count()}}</h2>
          <h4>Domaines d'activités</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="well dash-box">
          <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{App\filieres::count()}}</h2>
          <h4>Filières</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="well dash-box">
          <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
          <h4>Visiteurs</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Derniers utlisateurs -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-hover">
        
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Adhésion</th>
        </tr>
        @foreach($data as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->created_at}}</td>
        </tr>
        
        @endforeach
      </table>
    </div>
  </div>
</div>
          
  
@endsection

