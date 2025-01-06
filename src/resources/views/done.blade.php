@extends('layout.layout')

@section('ttl')
    ReserveDonePage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div  class="div_thanks">
        <p class="p_msg">ご予約ありがとうございます</p>
        <button class="rtn_btn" onclick="location.href='/'">戻る</button>
    </div>
@endsection