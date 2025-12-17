@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container" style="max-width: 480px; margin-top: 4rem">

    <h2 class="section-title gradient-text" style="text-align:center">Login Mahasiswa</h2>

    <form action="{{ route('login') }}" method="POST" style="margin-top:2rem">
        @csrf

        <div style="margin-bottom:1rem;">
            <label>Email</label>
            <input type="email" name="email" class="form-input" required>
        </div>

        <div style="margin-bottom:1rem;">
            <label>Password</label>
            <input type="password" name="password" class="form-input" required>
        </div>

        <button class="btn btn-primary" style="width:100%;">Login</button>
    </form>
    <a href="{{ route('register') }}" class="btn btn-primary" style="width:100%;margin-top:10px;">Register</a>

</div>
@endsection
