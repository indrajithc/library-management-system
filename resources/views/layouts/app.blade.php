<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en"  ng-app="app-admin">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Indran"> 
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet" >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>




<body>
	<div class="container-scroller">
		

		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a style="color: #222; " class="navbar-brand brand-logo"  href="{{ url('/') }}">
                    {{ config('app.name', 'LMS') }}
				</a>
				<a style="color: #222; " class="navbar-brand brand-logo-mini"  href="{{ url('/') }}">
                    {{ config('app.name', 'LMS') }}
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<i class="fas fa-bars"></i>
				</button>
				<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

				</ul>
				<ul class="navbar-nav navbar-nav-right">

              
                             
 
 
 

                        @guest

                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> 

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        
								<li class="nav-item dropdown d-none d-xl-inline-block">

									<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
										<span class="profile-text"> {{ Auth::user()->name }}</span>
                                         
                                        
                                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
										 
											<a class="dropdown-item  cursor-pointer"    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} </a>


                                        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                        </div>
                                        

                                        
                                    </li>
                                    
                        @endguest
 
								</ul>
								<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
									<span class="ti-menu"></span>
								</button>
							</div>
						</nav>
						

						<div class="container-fluid page-body-wrapper">
							


							

							

							<nav class="sidebar sidebar-offcanvas" id="sidebar">
								<ul class="nav">
								 

<li  class="nav-item pl-2 py-3 text-center">
	<span class="ml-3 text-uppercase text-primary text-center w-100">  {{ Auth::user()->type }} view</span>

</li>






 

                            @if (  Auth::user()->type == "admin"  )
                              
                          
                             
                            <li class="nav-item">
                            	<a class="nav-link"  href="{{ route('home') }}"href="#dashboard-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
                            		<i class="menu-icon mdi  mdi-view-dashboard"></i>
                            		<span class="menu-title">Dashboard</span> 
                            	</a>
                            	 
                            </li>


<li class="nav-item">
	<a class="nav-link" data-toggle="collapse" href="#Librarian-dropdown" aria-expanded="false" aria-controls="Librarian-dropdown">
		<i class="menu-icon mdi mdi-account"></i>
		<span class="menu-title">Librarian</span>
		<i class="menu-arrow fas fa-angle-right"></i>
	</a>
	<div class="collapse" id="Librarian-dropdown">
		<ul class="nav flex-column sub-menu">
			<li class="nav-item">
				<a class="nav-link"  href="{{ route('admin.users.create') }}">Add New</a>
            </li> 
            
			<li class="nav-item">
				<a class="nav-link"  href="{{ route('admin.users.index') }}">View All</a>
			</li> 
		</ul>
	</div>
</li>




<li class="nav-item">
	<a class="nav-link" data-toggle="collapse" href="#students-dropdown" aria-expanded="false" aria-controls="students-dropdown">
		<i class="menu-icon mdi mdi-account"></i>
		<span class="menu-title">Student</span>
		<i class="menu-arrow fas fa-angle-right"></i>
	</a>
	<div class="collapse" id="students-dropdown">
		<ul class="nav flex-column sub-menu">
			<li class="nav-item">
				<a class="nav-link"  href="{{ route('admin.students.create') }}">Add New</a>
            </li> 
            
			<li class="nav-item">
				<a class="nav-link"  href="{{ route('admin.students.index') }}">View All</a>
			</li> 
		</ul>
	</div>
</li>


  @endif


@if (  Auth::user()->type == "librarian"  )
                                
                   
                
                          
                             
                            <li class="nav-item">
                            	<a class="nav-link"  href="{{ route('home') }}"href="#dashboard-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
                            		<i class="menu-icon mdi  mdi-view-dashboard"></i>
                            		<span class="menu-title">Dashboard</span> 
                            	</a>
                            	 
                            </li>

         

  <li class="nav-item">
  	<a class="nav-link" data-toggle="collapse" href="#Category-dropdown" aria-expanded="false" aria-controls="Category-dropdown">
  		<i class="menu-icon mdi  mdi-source-fork"></i>
  		<span class="menu-title">Category</span>
  		<i class="menu-arrow fas fa-angle-right"></i>
  	</a>
  	<div class="collapse" id="Category-dropdown">
  		<ul class="nav flex-column sub-menu">
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.category.create') }}">New</a>
              </li> 
              
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.category.index') }}">View</a>
  			</li> 
  		</ul>
  	</div>
  </li>


         

  <li class="nav-item">
  	<a class="nav-link" data-toggle="collapse" href="#shelf-dropdown" aria-expanded="false" aria-controls="shelf-dropdown">
  		<i class="menu-icon mdi   mdi-table-edit"></i>
  		<span class="menu-title">Shelf</span>
  		<i class="menu-arrow fas fa-angle-right"></i>
  	</a>
  	<div class="collapse" id="shelf-dropdown">
  		<ul class="nav flex-column sub-menu">
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.shelf.create') }}">New</a>
              </li> 
              
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.shelf.index') }}">View</a>
  			</li> 
  		</ul>
  	</div>
  </li>




         

  <li class="nav-item">
  	<a class="nav-link" data-toggle="collapse" href="#book-dropdown" aria-expanded="false" aria-controls="book-dropdown">
  		<i class="menu-icon mdi   mdi-book"></i>
  		<span class="menu-title">Book</span>
  		<i class="menu-arrow fas fa-angle-right"></i>
  	</a>
  	<div class="collapse" id="book-dropdown">
  		<ul class="nav flex-column sub-menu">
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.book.create') }}">New</a>
              </li> 
              
  			<li class="nav-item">
  				<a class="nav-link"  href="{{ route('librarian.book.index') }}">View</a>
  			</li> 
  		</ul>
  	</div>
  </li>



    @endif











									</ul>
								</nav>

								<div class="main-panel position-relative">




                                <main class="mt-3"  >
            @include('partials.alerts')
            @yield('content')
        </main>








 
<footer class="footer">
	<div class="container-fluid clearfix">
		<span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Copyright © 
		<a href="#" target="_blank">read</a>. All rights reserved.</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> 
		</span>
	</div>
</footer> 
</div> 
</div> 
</div> 

 

</body>

</html>
