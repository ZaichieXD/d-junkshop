@extends('layouts.base-content')

@section("header-name")
    <h1 class="mt-4">Inventory</h1>
@endsection

@section('title')
<title>Inventory</title>
@endsection

@section('navOptions')
    <div class="sb-sidenav-menu-heading">Core</div>
    <a class="nav-link" href="{{ route("admin.inventory") }}">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
        Inventory
    </a>
    <a class="nav-link" href="index.html">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-copy"></i></div>
        Orders
    </a>
    <a class="nav-link" href="index.html">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill"></i></div>
        Sales
    </a>
    <a class="nav-link" href="index.html">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake-slash"></i></div>
        Return Item
    </a>
    
@endsection

@section('isItAdmin')
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Admin
    </div>
@endsection

@section('navbaroptions')
    <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="btn btn-link text-dark p-0 m-0" style="text-decoration: none;">
                    Log Out
                </button>
            </form>

                <!-- <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                    </x-dropdown-link>
                </form> -->
            </ul>
        </li>
    </ul>
@endsection

@section('body')
    @include('layouts.header')
    <div id="layoutSidenav">
        @include('layouts.sidemenu')
        <div id="layoutSidenav_content">
            @include('layouts.content')
            @include('layouts.footer')
        </div>
    </div>
@endsection