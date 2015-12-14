<!DOCTYPE html>
<html class="bg-black">
    <head>
        @yield('header')
        <meta charset="UTF-8">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        

        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        @yield('header_assets')
    </head>
    <body class="skin-blue  pace-done" screen_capture_injected="true" style="min-height: 1293px;">
	    
	    @include('user.sidebar')


        @yield('content')
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jqueryaa.min.js"></script>
        <!--<script src="/js/AdminLTE/app.js" type="text/javascript"></script>
         	<script src="/js/AdminLTE/demo.js" type="text/javascript"></script>
        -->
        @yield('footer_assets')
        
    </body>
</html>