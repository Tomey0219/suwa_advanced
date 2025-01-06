@extends('layout.layout')

@section('ttl')
    MyPage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div class="div_mypage">
        <div class="div_reserve">
            <h2>予約状況</h2>
            @foreach($errors->all() as $error)
                <li class="edit_error">{{ $error }}</li>
            @endforeach
            @foreach ($res_shop as $res_shop)
                <div class="reserve_card">
                    <div class="div_card_header">
                        <p class="card_ttl">予約</p>
                        <form action="/reserve/destroy" method="POST">
                        @csrf
                            <input type="hidden" name="res_shop" value="{{ $res_shop['id'] }}">
                            <button type="submit">×</button>
                        </form>
                    </div>
                    <form action="/reserve/update" method="POST">
                    @csrf
                        <table class="tbl_res_info">
                            <tr>
                                <th>Shop</th>
                                <td>
                                    <input type="text" name="shop_name" class="shop_name" value="{{ $res_shop->shop['name'] }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>
                                    <input type="date" name="re_date" id="re_date" class="re_date" value="{{ $res_shop['date'] }}">
                                </td>
                            </tr>
                            {{-- @error('re_date')
                            <tr>
                                <th></th>
                                <td class="td_error">
                                        @foreach ($errors->get('re_date') as $error)
                                            {{ $error }}
                                        @endforeach
                                </td>
                            </tr>
                            @enderror --}}
                            <tr>
                                <th>Time</th>
                                <td>
                                    <input type="time" name="re_time" id="re_time" class="re_time" value="{{ $res_shop['time'] }}">
                                </td>
                            </tr>
                            {{-- @error('re_time')
                            <tr>
                                <th></th>
                                <td class="td_error">
                                        @foreach ($errors->get('re_time') as $error)
                                            {{ $error }}
                                        @endforeach
                                </td>
                            </tr>
                            @enderror --}}
                            <tr>
                                <th>Number</th>
                                <td>
                                    <select name="re_num" id="re_num" class="re_num">
                                        @for($i=1;$i<11;$i++)
                                            <option value='{{ $i }}' {{ $res_shop['headcount']==$i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            {{-- @error('re_num')
                            <tr>
                                <th></th>
                                <td class="td_error">
                                        @foreach ($errors->get('re_num') as $error)
                                            {{ $error }}
                                        @endforeach
                                </td>
                            </tr>
                            @enderror --}}
                        </table>
                        <div class="div_edit">
                            <input type="hidden" name="res_id" value="{{ $res_shop['id'] }}">
                            <input type="hidden" name="res_shop_id" value="{{ $res_shop['shop_id'] }}">
                            <input type="hidden" name="res_user_id" value="{{ $res_shop['user_id'] }}">
                            <button type="submit">予約を変更する</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="div_favorite">
            <h1>{{ $user_name . 'さん' }}</h1>

            <h2>お気に入り店舗一覧</h2>

            <div class="card_group">
            @foreach ($shop_info as $shop_info)
                <div class="card">
                    <div class="card_img">
                        <img src="{{ $shop_info['url'] }}" alt="画像">
                    </div>
                    <div class="card_content">
                        <div class="fav_card_ttl">
                            {{ $shop_info['name'] }}
                        </div>
                        <div class="card_outline">
                            {{'#' . $shop_info->area['name'] . '#' . $shop_info->genre['name']}}
                        </div>
                        <div class="div_detail_heart">
                            <form class="form_detail_btn" action="/detail" method="POST">
                            @csrf
                                <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
                                <button class="detail_btn" type="submit">
                                詳しく見る</button> 
                            </form>
                            <form class="form_heart" action="/mypage/favorite/destroy" method="POST">
                            @csrf
                                    <div class="heart_red">
                                        <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
                                        <input type="hidden" name="userID" value="{{ $user }}">
                                        <input class="input_heart" type="submit" value="">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection