@extends('layout.layout')

@section('ttl')
       Shoplist
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('header_item')
    <div class="div_search">
        <form class="form_search" action="/search" method="POST">
        @csrf
            <select class="select_area" name="areaSch" onchange="this.form.submit()">
                <option value="">All area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area['id'] }}" @isset($retention['areaSch']){{ $retention['areaSch']==$area['id'] ? 'selected' : '' }}@endisset>{{ $area['name'] }}</option>
                @endforeach
            </select>

            <select class="select_genre" name="genreSch" onchange="this.form.submit()">
                <option value="">All genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre['id'] }}" @isset($retention['genreSch']){{ $retention['genreSch']==$genre['id'] ? 'selected' : '' }}@endisset>{{ $genre['name'] }}</option>
                @endforeach
            </select>

            <input class="input_name" name="nameSch" type="text" placeholder="Search..." onchange="this.form.submit()" value="@isset($retention['nameSch']){{ $retention['nameSch'] }}@endisset">
        </form>
    </div>
@endsection

@section('content')

        <div class="card_group">
            @foreach ($shop_info as $shop_info)
                <div class="card">
                    <div class="card_img">
                        <img src="{{ $shop_info['url'] }}" alt="画像">
                    </div>
                    <div class="card_content">
                        <div class="card_ttl">
                            {{ $shop_info['name'] }}
                        </div>
                        <div class="card_outline">
                            {{'#' . $shop_info->area['name'] . '#' . $shop_info->genre['name']}}
                        </div>
                        <div class="div_detail_heart">
                            <form class="form_detail_btn" action="/detail/{{ $shop_info['id'] }}" method="POST">
                            @csrf
                                <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
                                <button class="detail_btn" type="submit">
                                詳しく見る</button> 
                            </form>
                            <form class="form_heart" action="/favorite" method="POST">
                            @csrf
                                    @php
                                        $heart_class='heart_gray';
                                    @endphp
                                    @foreach ($get_fav_shoplist as $fav_shop)
                                        @php
                                            if( $shop_info['id'] == $fav_shop['shop_id'] ){
                                                $heart_class="heart_red";
                                                break;
                                            }else{
                                                $heart_class="heart_gray";
                                            }
                                        @endphp
                                    @endforeach
                                    <div class="{{ $heart_class }}">
                                        <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
                                        <input type="hidden" name="userID" value="{{ $user }}">
                                        <input type="hidden" name="areaSch" value="@isset($retention['areaSch']){{ $retention['areaSch']}}@endisset">
                                        <input type="hidden" name="genreSch" value="@isset($retention['genreSch']){{ $retention['genreSch']}}@endisset">
                                        <input type="hidden" name="nameSch" value="@isset($retention['nameSch']){{ $retention['nameSch']}}@endisset">
                                        <input class="input_heart" type="submit" value="">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
@endsection
