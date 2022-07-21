<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>Document</title>
        <title>@yield("title", "BikeShop | จําหน่ายอะไหล่จักรยานออนไลน์")</title>
        
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.js') }}"> --}}
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/angular.min.js') }}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
        {{-- <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script> --}}
       

    </head>
    
    <body>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>


        <div class="container">
            <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Bikeshop</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('home') }}">หน้าแรก</a></li> 
                            @guest
                            @else
                            <li><a href=" {{ URL::to('product') }} ">จัดการข้อมูลสินค้า</a></li>
                        <li><a href="#">รายงาน</a></li> 
                        <li><a href="{{ URL::to('user') }}">ข้อมูลผู้ใช้งาน</a></li>
                            @endguest
                    </ul>

                    <ul class="nav navbar-nav navbar-right"> @guest
                            <li><a href="{{ route('login') }}">ล็อกอิน</a></li>
                            <li><a href="{{ route('register') }}">ลงทะเบียน</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-shopping-cart"></i> ตะกร้า
                                    <span class="label label-danger">
                                        {{-- {!! count(Session::get('cart_items')) !!}</span></a></li> --}}
                            <li><a href="#">{{ Auth::user()->name }} </a></li>
                        <li><a href=" {{ URL::to('logout') }} ">ออกจากระบบ </a></li> @endguest
                    </ul>

                </div>
            </div>
            </nav> @yield("content")
            @if(session('msg'))
                @if(session('ok'))
                    <script>toastr.success("{{ session('msg') }}")</script>
                @else
                    <script>toastr.error("{{ session('msg') }}")</script>
                @endif
            @endif
        </div>

        {{-- <script type="text/javascript">
            toastr.success("บันทึกข้อมูลสำเร็จ");
            toastr.error("ไม่สามารถบันทึกข้อมูลได้");
        </script> --}}
                
        {{-- <script type='text/javascript'> toastr.success('test');</script> --}}
    

    </body>
</html>