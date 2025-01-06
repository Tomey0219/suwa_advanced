@extends('layout.layout')

@section('ttl')
    LoginPage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div class="login_card">
        <h4 class="login_ttl">Login</h4>

        <form class="login_form" action="/login" method="post">
        @csrf
            <table class="login_tbl">
                <tr>
                    <td>
                        <div class="div_login_email">
                        <input class="login_email" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        @error('email')
                        @foreach ($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="div_login_password">
                        <input class="login_password" type="text" name="password" placeholder="Password" value="{{ old('password') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        @error('password')
                        @foreach ($errors->get('password') as $error)
                            {{ $error }}
                        @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="td_login_btn">
                        <button class="login_btn" type="submit">ログイン</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
@endsection