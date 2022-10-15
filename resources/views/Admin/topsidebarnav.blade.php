<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="Admin/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/Admin/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <!--Scripts-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/Admin/js/scripts.js"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><strong>HealthyMind<i>/Admin</i></strong></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-info p-3" href="{{URL('redirect')}}">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{URL('users')}}">Users</a>
                   
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{URL('therapistsprofiles')}}">Therapists profiles</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{URL('alltherapists')}}">All Therapists</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{URL('alleditors')}}">All Editors</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-primary" id="sidebarToggle">Close Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="{{URL('redirect')}}">Home</a></li>
                                
                                </li>
                                @if (Route::has('login'))
                            @auth
                            <x-app-layout>
                                
                            </x-app-layout>
                   
                        
                    @else
                    
                      

                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                        @endif
                    @endauth
              
            @endif
                       
                                
                            </ul>
                        </div>
                    </div>
                </nav>