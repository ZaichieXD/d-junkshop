@extends('layouts.base-content')

@section("header-name")
    <h1 class="mt-4">Products</h1>
@endsection

@section(section: 'title')
<title>Products</title>
@endsection

@section('navOptions')
<div class="sb-sidenav-menu-heading">Core</div>
<a class="nav-link" href="index.html">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
    Products
</a>
@endsection

@section('body')
    @include('layouts.header')
    <div id="layoutSidenav">
        @include('layouts.sidemenu')
        <div id="layoutSidenav_content">
            @include('layouts.user-content')
            @include('layouts.footer')
        </div>
    </div>
@endsection