@extends('layout.layout')

@section('ttl')
    RegisterPage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div class="register_card">
        <h4 class="register_ttl">Registration</h4>

        <form class="register_form" action="/register" method="post">
        @csrf
            <table class="register_tbl">
                <tr>
                    <td>
                        <div class="div_register_name">
                        <input class="register_name" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('name')
                        @foreach ($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="div_register_email">
                        <input class="register_email" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('email')
                        @foreach ($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="div_register_password">
                        <input class="register_password" type="text" name="password" placeholder="Password" value="{{ old('password') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('password')
                        @foreach ($errors->get('password') as $error)
                            {{ $error }}
                        @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="td_register_btn">
                        <button class="register_btn" type="submit">登録</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
@endsection