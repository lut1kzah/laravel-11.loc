@extends('layouts.layout')
@section('title', 'Вход')

@section('content')
    <section class="log-in">
        <h2>Вход</h2>
        @error('error')
        <p class="warning">{{$message}}</p>
        @enderror
    <form action="{{route('login')}}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <div>
            <label for="log-in-email"></label>
            <input type="email" id="log-in-email" name="email" required placeholder="EMAIL BLYAT TUT"/>
        </div>
        <div>
            <label for="log-in-password"></label>
            <input type="password" id="log-in-password" name="password" required/>
        </div>

        <button type="submit">Войти</button>
    </form>
    </section>
@endsection

