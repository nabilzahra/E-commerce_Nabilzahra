@extends('layouts.app')
@section('content')
<div class="container text-center" style="margin-top: 100px;">
    <h1 class="display-4" style="font-family: 'Poppins', sans-serif; color: #c94f7c; font-weight: 700;">Welcome to Our Makeup Store!</h1>
    <p class="lead" style="font-size: 1.2rem; color: #7a3b5d;">Discover the best makeup products curated just for you.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg" style="background-color: #c94f7c; border:
    none; font-weight: 600; padding: 10px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(200, 100, 150, 0.2);">Get Started</a>
</div>
@endsection