@extends('layouts.front')

@section('section')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="" style="background:url(cover.png);margin-top: -20px;">  
    <div class="container">
      <div class="panel-body form-signin">  
        <form  method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

          <h2 class="form-signin-heading">Please sign up</h2>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">  
            <label for="inputEmail" class="control-label col-md-4 text-right">
              Nom
            </label>
            <div class="col-md-6">
              <input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="{{ old('name') }}" required autofocus><br> 
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif 
            </div>
          </div>

          <div class="form-group">  
            <label for="inputEmail" class="control-label col-md-4 text-right">
              Email address
            </label>
            <div class="col-md-6">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              
              <br>  
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">  
              <label for="inputPassword" class="control-label col-md-4 text-right">Password</label>
              <div class="col-md-6">  
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <br>
              </div>
          </div>  
          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label text-right">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required><br>
            </div>
            </div>

          <div class="form-group">  
            <div class="col-md-8 col-md-offset-4">  
              <button class="btn btn-sm btn-primary" type="submit">
              S'inscrire
              </button>
              <a href="{{route('register')}} " class="text-right"></a>
            </div>
          </div>
        </form>
      </div>
    </div> <!-- /container -->
  </div>
@endsection
