<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown notifications-menu">
    @if( $count_inactive_notifications > 0 )
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="label label-danger">{{ $count_inactive_notifications }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">{{ $count_inactive_notifications }} new notifications</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach( $inactive_notifications as $notif )
                    <li style="padding-left: 15px;">
                        <a href="/notifications">
                            <h5> {{{ str_limit( $notif->description, 25, '...') }}} </h5>
                            <p>{{ $notif->created_at }}</p>
                        </a>
                    </li><!-- end message -->
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="/notifications">List of notifications</a></li>
        </ul>
    @else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
        </a>
        <ul class="dropdown-menu">
            <li class="header">No notifications</li>
        </ul>   
    @endif
</li>