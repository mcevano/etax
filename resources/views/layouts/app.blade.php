<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="base_url" content="{{ URL::to('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="A better version of eBIR. Philippine's most reliable tax filing software. Transact from your seat. Easy and hassle-free filing!">
    <meta name="keywords" content="1601, 2551, 2307, 2550, BIR filing, Online tax filing, Online tax payment, BIR, bureau of internal revenue, Philippines tax, how to file at BIR, how to file in BIR, BIR Philippines, Tax software, BIR Tax software">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eTax') }} @yield('title')</title>
    
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" />
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
    <script src="{{ asset('js/jquery-ui.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Scripts for the Forms -->
    <script src="{{ asset('js/forms/rijndael.js') }}" ></script>
    <script src="{{ asset('js/forms/environment.js') }}" ></script>
    <script src="{{ asset('js/forms/string-util.js') }}" ></script>
    <script src="{{ asset('js/forms/string-util2014.js') }}" ></script>
    <script src="{{ asset('js/forms/aes.js') }}" ></script>
    <script src="{{ asset('js/forms/lz-string-1.0.2.js') }}" ></script>
    <script src="{{ asset('js/forms/forms.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet" media="print">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <script>
            URL = "{{ url('/') }}/";
            formID = '<?= isset($_GET["id"]) ? $_GET["id"] : "index" ?>';
    </script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js" defer></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  
</head>
<body class="bg">
    <div id="app">
      <chat></chat>    
    </div>

        @auth
           
            @if(Request::path() != 'account' && Request::path() != 'email/verify')
         
            <nav class="navbar  navbar-expand-md navbar-light  fixed-top navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{ asset('images/logo.png') }}" width="50" alt="eTax Logo"/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        <ul class="navbar-nav ml-auto mx-auto">
                            @if(Auth::user()->user_type == 'demo')
                              <div class="text-danger">**Your account is intended for <strong>DEMO</strong> only**</div>
                            @endif
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @if(Auth::user()->status != 'Deactivated')
                                <li class="nav-item">
                                    <a class="nav-link nav-button" href="{{ url('/home') }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-button" {{ Request::segment(1) == "form" ? ($action == 'view' ? '' : "data-toggle=modal") : ''}}  href="{{ Request::segment(1) == "form" ? ($action == 'view' ? '/companies/'.$company->id.'/histories/'.Request::segment(2).'' : '#saveModal') : '/companies'}}" id="/companies">{{ __('Company') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Help <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/help/documentary_stamp')}}">Documentary Stamp</a>
                                        <a class="dropdown-item" href="{{ url('/help/excise')}}" >Excise</a>
                                        <a class="dropdown-item" href="{{ url('/help/income')}}" >Income</a>
                                        <a class="dropdown-item" href="{{ url('/help/onett')}}" >ONETT</a>
                                        <a class="dropdown-item" href="{{ url('/help/payment')}}" >Payment</a>
                                        <a class="dropdown-item" href="{{ url('/help/percentage')}}" >Percentage</a>
                                        <a class="dropdown-item" href="{{ url('/help/value_added_tax')}}" >Value Added Tax</a>
                                        <a class="dropdown-item" href="{{ url('/help/withholding')}}" >Withholding</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-button" href="{{ url('/ocr') }}">OCR</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-button btn btn-warning" href="{{ url('/invite') }}">{{ __('Invite Friend') }}</a>
                                </li>
                            @endif
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name.' '.Auth::user()->last_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#" >
                                            My Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                
                        </ul>
                    </div>
                </div>
            </nav>
            @endif

            @if(Auth::user()->user_type == 'demo')
                <button type="button" class="btn btn-warning btn-lg btn-regular btn-regular-users" data-toggle="modal" data-target="#exampleModal">Be one of our Regular Users.</button>
            @endif
            <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <form method="POST" action="/regular/{{ Auth::user()->id }}">
                      @method('PATCH')
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Regular User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to be our regular user for etax?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
        @endauth
        <main class="py-4">
            <!-- Modal -->
            <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Submit / Final Copy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                        <div class="alert alert-info message">
                            Are you sure you want to submit this form?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="submitData();">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Submit / Final Copy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                        <div class="alert alert-info message">
                            Are you sure you want to submit this form?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="submitData();">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body message">
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-okay" data-dismiss="modal">Okay</button>
                  </div>
                </div>
              </div>
            </div>
            @yield('content')

        </main>
   
    
</div>

     @yield('scripts')

    <footer class="footer">
        <div class="container font-white">
            <div class="text-center">
                &copy; 2018, eTax. All Rights Reserved.
            </div>
        </div>      
    </footer>
   
</body>
</html>
