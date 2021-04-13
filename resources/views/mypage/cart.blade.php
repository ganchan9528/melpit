@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
@endif
@if (count($cartitems) == 0)
    <p class="row justify-content-center"><font size="3">現在カートの中身はありません</font></p>
    <a href="/" class="row justify-content-center">買い物をする</a>
@else
<div class="container">
        <div class="row justify-content-center">
            <div class="col-10 offset-1 bg-white d-none d-md-block">
                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">カート内商品</div>
                @foreach ($cartitems as $item)
                    <div class="d-flex mt-3 border position-relative">
                        <div>
                            <img src="/storage/item-images/{{$item->image_file_name}}" class="img-fluid" style="height: 140px;">
                            <!-- <img src="{{$item->image_file_name}}" class="img-fluid" style="height: 140px;"> -->
                        </div>
                        <div class="flex-fill p-3">
                            <div>
                                @if ($item->isStateSelling)
                                    <span class="badge badge-success px-2 py-2">出品中</span>
                                @else
                                    <span class="badge badge-dark px-2 py-2">売却済</span>
                                @endif
                                <span>{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</span>
                            </div>
                            <div class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->name}}</div>
                            <div>
                                <i class="fas fa-yen-sign"></i>
                                <span class="ml-1">{{number_format($item->price)}}</span>
                                <i class="far fa-clock ml-3"></i>
                                <span>{{$item->created_at->format('Y年n月j日 H:i')}}</span>
                            </div>
                            
                        </div>
                        <div class="d-flex align-items-center">
                            <ul style="list-style: none;">
                                <li>
                                    <a href="{{ route('item', [$item->id]) }}"　role="button" class="btn btn-primary h-50" style="width: 127px;">商品情報</a>
                                </li>
                                <li>
                                    <div class="form-inline float-right">
                                        <form method="POST" action="{{ route('cart-destroy', [$item->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-danger">カートから削除</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="col-10 offset-1 bg-white d-md-none">
            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">カート内商品</div>
                @foreach ($cartitems as $item)
                    <div class="mt-3 border">
                        <div class="col-10 offset-1">
                            <img src="/storage/item-images/{{$item->image_file_name}}" class="img-fluid" style="height: 140px;">
                            <!-- <img src="{{$item->image_file_name}}" class="img-fluid" style="height: 140px;"> -->
                        </div>
                        <div class="flex-fill p-3">
                            <div>
                                @if ($item->isStateSelling)
                                    <span class="badge badge-success px-2 py-2">出品中</span>
                                @else
                                    <span class="badge badge-dark px-2 py-2">売却済</span>
                                @endif
                                <span>{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</span>
                            </div>
                            <div class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->name}}</div>
                            <div>
                                <i class="fas fa-yen-sign"></i>
                                <span class="ml-1">{{number_format($item->price)}}</span>
                                <i class="far fa-clock ml-3"></i>
                                <span>{{$item->created_at->format('Y年n月j日 H:i')}}</span>
                            </div>
                            
                        </div>
                        <div class="d-flex align-items-center col-10 col-md-10 offset-1">
                            <ul style="list-style: none;">
                                <li>
                                    <a href="{{ route('item', [$item->id]) }}"　role="button" class="btn btn-primary h-50" style="width: 127px;">商品情報</a>
                                </li>
                                <li>
                                    <div class="form-inline float-right">
                                        <form method="POST" action="{{ route('cart-destroy', [$item->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-danger">カートから削除</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center my-5">
                <div class="card w-50">
                    <div class="card-header" style="font-size: 18px; font-weight: bold;">
                        小計
                    </div>
                    <div class="card-body">
                        <div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">
                            <i class="fas fa-yen-sign"></i>
                            <span class="ml-1">{{number_format($subtotal)}}</span>
                        </div>
                        <div>
                            <a href="{{route('item.buy', [$item->id])}}" class="btn btn-primary btn-block">レジに進む</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection