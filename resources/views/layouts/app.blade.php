<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Aplikasi Cafe</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/css/theme-default.css')}}"/><!-- 
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/chart/Chart.js')}}"/> -->
        <!-- <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/css/app.css')}}"/> -->
        <script type="text/javascript" src="{{ asset('/ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery.min.js')}}"></script>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{url('/home/')}}">
                        Aplikasi Cafe </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li> 
                     <li class="xn-title">Home</li>
                    <li><a href="{{url('/home/')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a></li>                                                                       
                     <li class="xn-title">Setting</li>
                     
                    <li><a href="{{url('/home/edit/user/root')}}"><span class="fa  fa-users"></span> <span class="xn-text">AkunKu</span></a></li>
                     <li class="xn-title">Entry</li> 
                    @php($status = auth()->user()->status)
                    @if($status == '0')
                    <li><a href="{{url('/home/pages/menu')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Menu</span></a></li>
                    <li><a href="{{url('/home/pages/reviewmenu')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Preview Menu</span></a></li>  
                    @elseif($status == '1')
                    <li><a href="{{url('/home/pages/1/pesanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Pesanan</span></a></li>
                    <li><a href="{{url('/home/pages/1/reviewpesanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Preview Pesanan</span></a></li> 
                    <li><a href="{{url('/home/pages/1/pembayaran')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Pembayaran</span></a></li> 
                    @elseif($status == '2')
                    <li><a href="{{url('/home/pages/1/pesanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Pesanan</span></a></li>
                    <li><a href="{{url('/home/pages/1/reviewpesanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Preview Pesanan</span></a></li>  
                    @endif
                    <li class="xn-title">Laporan</li> 
                    <li><a href="{{url('/home/pages/laporan/faktur')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Faktur</span></a></li> 
                    @if($status != '2')
                    <li><a href="{{url('/home/pages/laporan/harian')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Harian</span></a></li> 
                    <li><a href="{{url('/home/pages/laporan/bulanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Bulanan</span></a></li> 
                    <li><a href="{{url('/home/pages/laporan/tahunan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Taunan</span></a></li> 
                    @endif
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content" >
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li>
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
               
                <div class="page-content-wrap" >
                
                    
                    <div class="container" >
                         <br>
                       @include('pesan')
                        @yield('content')
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>      
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->


                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>         -->
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/actions.js')}}"></script>       


        <!-- END TEMPLATE -->
         <!-- START SCRIPTS -->
     

    
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    <!-- END SCRIPTS -->         
    </body>
</html>


