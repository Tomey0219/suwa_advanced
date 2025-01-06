@extends('layout.layout')

@section('ttl')
    ShopDetailPage    
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('header_item')
    <div></div>
@endsection

@section('content')
    <div class="div_detail">
        <div class="detail_card">
            <h1>{{ $shop_info['name'] }}</h1>    

            <div class="div_shop_img">
                <img class="shop_img" src="{{ $shop_info['url'] }}" alt="画像">
            </div>

            <div class="div_area_genre">
                {{'#' . $shop_info->area['name'] . '#' . $shop_info->genre['name']}}
            </div>

            <div class="div_outline">
                {{ $shop_info['outline'] }}
            </div>

            <form action="/review" method="POST">
            @csrf
                <div class="review">
                    <p class="p_review">レビュー</p>
                    <div class="stars">
                        <span>
                        <input id="review01" type="radio" name="review" value="5"><label for="review01">★</label>
                        <input id="review02" type="radio" name="review" value="4"><label for="review02">★</label>
                        <input id="review03" type="radio" name="review" value="3"><label for="review03">★</label>
                        <input id="review04" type="radio" name="review" value="3"><label for="review04">★</label>
                        <input id="review05" type="radio" name="review" value="1"><label for="review05">★</label>
                        </span>
                    </div>
                    @error('review')
                        @foreach ($errors->get('review') as $error)
                            <p class="review_error">{{ $error }}</p>
                        @endforeach
                    @enderror
                    <textarea name="comment" cols="50" rows="5" placeholder="コメントを入力"></textarea>
                    @error('comment')
                        @foreach ($errors->get('comment') as $error)
                            <p class="review_error">{{ $error }}</p>
                        @endforeach
                    @enderror
                </div>
                <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
                <button class="review_btn" type="submit">評価する</button>
            </form>
        </div>

    <div class="reserve_card">
        <h2>予約</h2>

        <form class="form_reserve" action="/reserve/add" method="POST">
        @csrf
            <table class="tbl_inp">
                <tr>
                    <td>
                        <input type="date" name="re_date" id="re_date" class="re_date" value="{{ old('re_date') }}" onchange='ch_date()'>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('re_date')
                            @foreach ($errors->get('re_date') as $error)
                                {{ $error }}
                            @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="time" name="re_time" id="re_time" class="re_time" value="{{ old('re_time') }}" onchange='ch_time()'>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('re_time')
                            @foreach ($errors->get('re_time') as $error)
                                {{ $error }}
                            @endforeach
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="re_num" id="re_num" class="re_num" onchange="ch_num()">
                            <option value="" hidden>予約人数</option>
                            @for($i=1;$i<11;$i++)
                                <option value='{{ $i }}' {{ old('re_num')==$i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td_error">
                        @error('re_num')
                            @foreach ($errors->get('re_num') as $error)
                                {{ $error }}
                            @endforeach
                        @enderror
                    </td>
                </tr>
            </table>

            <table class="tbl_conf">
                <tr>
                    <th>Shop</th>
                    <td><input type="text" name="shop_name" class="shop_name" value="{{ $shop_info['name'] }}" readonly></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input type="text" name="conf_date" id="conf_date" class="conf_date" value="{{ old('conf_date') }}" readonly></td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td><input type="text" name="conf_time" id="conf_time" class="conf_time" value="{{ old('conf_time') }}" readonly></td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td><input type="text" name="conf_num" id="conf_num" class="conf_num" value="{{ old('conf_num') }}" readonly></td>
                </tr>
            </table>

            <input type="hidden" name="shopID" value="{{ $shop_info['id'] }}">
            {{-- <input type="hidden" name="userID" value="{{ $user }}"> --}}

            <button class="reserve_btn" type="submit">予約する</button>

            <script>
                function ch_date(){
                    let re_date = document.getElementById('re_date');
                    let re_date_value = re_date.value;

                    let conf_date = document.getElementById('conf_date');
                    conf_date.value = re_date_value;
                }

                function ch_time(){
                    let re_time = document.getElementById('re_time');
                    let re_time_value = re_time.value;

                    let conf_time = document.getElementById('conf_time');
                    conf_time.value = re_time_value;
                }

                function ch_num(){
                    let re_num = document.getElementById('re_num');
                    let re_num_value = re_num.value;

                    let conf_num = document.getElementById('conf_num');
                    conf_num.value = re_num_value;
                }
            </script>
        </form>
    </div>
    </div>
@endsection