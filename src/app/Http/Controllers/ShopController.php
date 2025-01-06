<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\EditReserveRequest;
use App\Http\Requests\ReviewRequest;

class ShopController extends Controller
{
    public function index()
    {
        $shop_info=Shop::with('area','genre')->get();
        $areas = Area::all();
        $genres = Genre::all();
        $user = Auth::user()->id;

        // お気に入り表示

        $get_fav_shoplist=Favorite::UseridSearch($user)->get();

        return view('index',compact('shop_info','areas','genres','user','get_fav_shoplist'));
    }

    public function search(Request $request){

        $shop_info=Shop::with('area','genre')->AreaSearch($request->areaSch)->GenreSearch($request->genreSch)->NameSearch($request->nameSch)->get();
        $areas = Area::all();
        $genres = Genre::all();
        $user = Auth::user()->id;

        $retention = $request->all();

        // お気に入り表示

        $get_fav_shoplist=Favorite::UseridSearch($user)->get();

        return view('index',compact('shop_info','areas','genres','retention','user','get_fav_shoplist'));
    }

    public function favAddOrDest(Request $request){

        // お気に入り登録/削除

        $user = Auth::user()->id;

        $favorite_tbl_sch=Favorite::UseridSearch($user)->ShopidSearch($request->shopID)->get();

        if($favorite_tbl_sch->isEmpty()){
            $favorite=[
                'shop_id'=>$request->shopID,
                'user_id'=>$user
            ];

            Favorite::create($favorite);
        }else{
            Favorite::UseridSearch($user)->ShopidSearch($request->shopID)->delete();
        }

        // ページ再表示

        $shop_info=Shop::with('area','genre')->AreaSearch($request->areaSch)->GenreSearch($request->genreSch)->NameSearch($request->nameSch)->get();
        $areas = Area::all();
        $genres = Genre::all();

        $retention = $request->all();

        // お気に入り表示

        $get_fav_shoplist=Favorite::UseridSearch($user)->get();

        return view('index',compact('shop_info','areas','genres','retention','user','get_fav_shoplist'));
    }

    public function detail($shopID, Request $request)
    {
        $shop_info=Shop::with('area','genre')->ShopSearch($shopID)->first();
        $user = Auth::user()->id;

        return view('detail',compact('shop_info', 'user'));
    }

    public function resAdd(ReserveRequest $request)
    {

        // 予約登録

        $user = Auth::user()->id;

        $reserve=[
            'shop_id'=>$request->shopID,
            'user_id'=>$user,
            'date'=>$request->re_date,
            'time'=>$request->re_time,
            'headcount'=>$request->re_num
        ];

        Reservation::create($reserve);

        return view('done', compact('user'));
    }

    public function mypage(Request $request){
        
        $user = Auth::user()->id;
        $user_name = Auth::user()->name;
        $get_fav_shoplist=Favorite::UseridSearch($user)->get();
        $fav_shop_idlist=$get_fav_shoplist->pluck('shop_id');
        $fav_shop_idlist->all();

        $shop_info=Shop::with('area','genre')->whereIn('id',$fav_shop_idlist)->get();

        $res_shop=Reservation::with('shop')->UseridSearch($user)->get();

        return view('mypage',compact('shop_info','res_shop','user','user_name'));
    }

    public function resDest(Request $request)
    {

        Reservation::IdSearch($request->res_shop)->delete();

        return redirect('/mypage');
    }

    public function mypageFavDest(Request $request){

        // お気に入り削除

        $user = Auth::user()->id;

        Favorite::UseridSearch($user)->ShopidSearch($request->shopID)->delete();

        return redirect('/mypage');
    }

    public function resUpdate(EditReserveRequest $request){

        $reserve=[
            'shop_id'=>$request->res_shop_id,
            'user_id'=>$request->res_user_id,
            'date'=>$request->re_date,
            'time'=>$request->re_time,
            'headcount'=>$request->re_num
        ];

        Reservation::IdSearch($request->res_id)->update($reserve);

        return redirect('/mypage');
    }

    public function review(ReviewRequest $request)
    {

        // 評価

        $review=[
            'shop_id'=>$request->shopID,
            'star'=>$request->review,
            'comment'=>$request->comment,
        ];

        Review::create($review);

        $shop_info=Shop::with('area','genre')->ShopSearch($request->shopID)->first();
        $user = Auth::user()->id;

        return view('detail',compact('shop_info', 'user'));
    }

}
