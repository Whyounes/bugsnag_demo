<header class="header">
    <a href="/" class="logo">
        <img src="/img/logo_neoos1.png">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                @if( Auth::user()->role === 'admin' )
                    @include('partials.notifications.admin')
                @endif

                @include('partials.notifications.user')
                
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Auth::user()->username }} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="../../img/avatar3.png" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->username }} - {{ Auth::user()->role }}
                                <small>Member since {{ Auth::user()->created_at }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        
    </nav>
</header>