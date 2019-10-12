<nav class="navbar navbar-default navbar-fixed-top">    
            <div class="container"> 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="brand"><div class="circle-nav"><img src="{{Config::get('app.url')}}:8000/logo.png" height="65px" width="120px"></div></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{Request::is('/') ? 'active' : ''}}"><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>       
                        <li class="@if (request()->segment(1) == 'profils') active @endif">
							<a href="{{url('/profils')}}"><span class="glyphicon glyphicon-search"></span> Profils</a>
						</li>
                        <li><a href=""><span class="glyphicon glyphicon-file"></span> A Propos</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../navbar/"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                        @guest
                                <li><a href="{{ route('login') }}"><button class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Espace étudiants</button></a></li>
                                  
                            @else
                            <li class="@if (request()->segment(1) == 'home') active @endif"><a href="{{url('/home')}}"><span class="glyphicon glyphicon-alt-list"></span> mon Compte</a></li>
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
                        @endguest
                    </ul>  
                </div>  
            </div>  
        </nav>