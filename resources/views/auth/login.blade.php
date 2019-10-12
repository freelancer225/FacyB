@extends('layouts.front')

@section('section')
  <div class="" style="background:url(cover.png);margin-top: -20px;">  
    <div class="container">
      <div class="panel-body form-signin">  
        <form  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

          <h2 class="form-signin-heading">Please sign in</h2>

          <div class="form-group">  
            <label for="inputEmail" class="control-label col-md-4 text-right">
              Email address
            </label>
            <div class="col-md-6">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus><br>  
            </div>
          </div>

          <div class="form-group">  
              <label for="inputPassword" class="control-label col-md-4 text-right">Password</label>
              <div class="col-md-6">  
                <input type="password" id="Password" class="form-control" name="password" placeholder="Password" required>
              </div>
          </div>  
          
          <div class="form-group"> 
            <div class="col-md-6 col-md-offset-4">  
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">  
            <div class="col-md-8 col-md-offset-4">  
              <button class="btn btn-sm btn-primary" type="submit">
                Se connecter
              </button>
              <a href="{{route('register')}} " class="text-right">S'inscrire</a>
            </div>
          </div>
        </form>
      </div>
    </div> <!-- /container -->
  </div>

@endsection
