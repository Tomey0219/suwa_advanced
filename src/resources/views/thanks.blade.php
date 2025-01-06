@extends('layout.layout')

@section('ttl')
    RegisterThanksPage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div  class="div_thanks">
        <p class="p_msg">会員登録ありがとうございます</p>
        <button class="rtn_btn" onclick="location.href='/login'">ログインする</button>
    </div>
@endsection