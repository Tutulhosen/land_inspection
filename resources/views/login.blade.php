<!DOCTYPE html>
<html lang="en">

<head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--begin::Head-->

    <head>
        <base href="">
        <meta charset="utf-8" />
        <!-- <title>@yield('title', $page_title ?? 'Page Title') | {{ config('app.name') }}</title> -->
        <title>@yield('title', $page_title ?? 'Page Title') </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <meta name="_token" content="{{ csrf_token() }}" /> -->
        <meta name="description" content="Land Inspection Report" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css') }}">
        <link rel='stylesheet'
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css') }}" />
       <link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css') }}" />   
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('styles')
    </head>

<body style="background-color:rgb(187 179 167); padding-top:80px">

  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>

      <div class="col-md-4 pt-5">
        <!-- /.login-logo -->
        <div style="background-color:rgb(231, 223, 211); padding:10px; border:2px solid rgb(136, 117, 117)" class="card shadow">
          <div class="card-header text-center">
            <img src="{{ asset('/image/logo.png') }}" alt="Land Inspection Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <h4 style="font-weight:500">ইন্সপেকশন ম্যানেজমেন্ট সিস্টেম</h4>
          </div>
          <div style="background-color:rgb(231, 223, 211)" class="card-body">
            <h3 style="color:rgb(51, 43, 33)"  class="login-box-msg text-center">লগইন </h3>

            @if (Session::has('Errormassage'))
            <p style="color:red">{{ Session::get('Errormassage') }} </p>
            @endif

            <form action="{{route('admin.logedin')}}" method="post">
              @csrf
              <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" placeholder="ইমেইল" value="{{old('email')}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="পাসওয়ার্ড" value="{{old('password')}}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <a style="text-decoration:none; font-size:12px" href="">পাসওয়ার্ড ভুলে গেছেন ?</a>
              <div class="row">
                <div class="col-8">
                  
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">লগইন</button>
                </div>
                <!-- /.col -->
              </div>
            </form>

          
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-4"></div>
    </div>
  </div>

    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/ui/1.13.2/jquery-ui.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.16/sweetalert2.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js') }}"></script>
    <script src="{{url('https://kit.fontawesome.com/5b135da28d.js')}}" crossorigin="anonymous"></script>
    
    <script src="{{ url('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

    {{-- <script src="{{ asset('js/script.js')}}"></script> --}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')





</body>

</html>
