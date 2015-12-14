<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
    @if( $count_inactive_users > 0 )
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span class="label label-danger">{{ $count_inactive_users }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">{{ $count_inactive_users }} inactive users</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach( $inactive_users as $user )
                    <li><!-- start message -->
                        <a href="/admin/users/edit/{{ $user->id }}">
                            <div class="pull-left">
                                <img src="../../img/avatar3.png" class="img-circle" alt="User Image"/>
                            </div>
                            <h4>
                                {{ $user->username }}
                            </h4>
                            <p>{{ $user->created_at }}</p>
                        </a>
                    </li><!-- end message -->
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="/admin/users">List of users</a></li>
        </ul>
    @else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="header">No notifications</li>
        </ul>
    @endif
</li>

<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown notifications-menu">
    @if( $count_inactive_questions > 0 )
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-question"></i>
            <span class="label label-danger">{{ $count_inactive_questions }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">{{ $count_inactive_questions }} inactive questions</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach( $inactive_questions as $question )
                    <li style="padding-left: 15px;">
                        <a href="/questions/{{ $question->id }}">
                            <h5>
                                {{{ str_limit($question->title, 35, '...') }}}
                            </h5>
                            <small>{{ $question->user->username }}</small>
                        </a>
                    </li><!-- end message -->
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="/">List of questions</a></li>
        </ul>
    @else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-question"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="header">No notifications</li>
        </ul>
    @endif
</li>

<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown notifications-menu">
    @if( $count_inactive_responses > 0 )
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-comments"></i>
            <span class="label label-danger">{{ $count_inactive_responses }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">{{ $count_inactive_responses }} inactive responses</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach( $inactive_responses as $response )
                    <li style="padding-left: 15px;">
                        <a href="/admin/questions/{{ $response->question->id }}#response_{{ $response->id }}">
                            <h5>
                                {{{ str_limit($response->description, 35, '...') }}}
                            </h5>
                            <small>{{ $response->user->username }}</small>
                        </a>
                    </li><!-- end message -->
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="/questions">List of questions</a></li>
        </ul>
    @else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-comments"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="header">No notifications</li>
        </ul>
    @endif
</li>