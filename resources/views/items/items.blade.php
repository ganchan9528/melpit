@extends('layouts.app')

@section('title')
    商品一覧
@endsection

@section('content')
<div class="container">
    <div class="pt-5 pb-5" style="width: 100%;">
        @if (!empty($item))
            <h2 class="">{{$item->secondaryCategory->primaryCategory->name}}の商品一覧</h2>
        @else
            <h2 class="">このカテゴリーに商品はありません</h2>
        @endif
    </div>
    <div class="row">
        @foreach ($items as $item)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <a href="{{ route('item', [$item->id]) }}">
                        <div class="position-relative">
                            @if (!empty($item->image_file_name))
                                <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}">
                                <!-- <img class="card-img-top" src="{{$item->image_file_name}}"> -->
                            @else
                                <img src="/images/item-image-default.png" class="rounded-circle" style="object-fit: cover; width: 250px; height: 150px;">
                            @endif
                            <div class="position-absolute py-2 px-3" style="left: 0; bottom: 20px; color: white; background-color: rgba(0, 0, 0, 0.70)">
                                <i class="fas fa-yen-sign"></i>
                                <span class="ml-1">{{number_format($item->price)}}</span>
                            </div>
                            @if ($item->isStateBought)
                                <div class="position-absolute py-1 font-weight-bold d-flex justify-content-center align-items-end" style="left: 0; top: 0; color: white; background-color: #EA352C; transform: translate(-50%,-50%) rotate(-45deg); width: 125px; height: 125px; font-size: 20px;">
                                    <span>SOLD</span>
                                </div>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('item', [$item->id]) }}" style="text-decoration: none; color: black;">
                    <div class="card-body">
                        <h5 class="card-title textOverflow">{{Str::limit($item->name, 16, '...')}}</h5>
                        <form method="POST" action="likeitem" style="width: 80px; height: 25px;">
                        {{ csrf_field() }}
                            @auth
                            @if($like_model->like_exist(Auth::user()->id,$item->id))
                                <p class="favorite-marke">
                                  <a class="js-like-toggle loved" href="" data-itemid="{{ $item->id }}"><i class="fas fa-heart"></i></a>
                                </p>
                            @else
                                <p class="favorite-marke">
                                  <a class="js-like-toggle" href="" data-itemid="{{ $item->id }}"><i class="fas fa-heart"></i></a>
                                </p>
                            @endif​
                            @endauth
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        </form>
                        <!-- <a href="{{ route('item', [$item->id]) }}" class="stretched-link"></a> -->
                    </div>
                </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="d-none d-md-block">
    <a href="{{route('sell')}}"
   class="bg-primary text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
>
    <div style="font-size: 24px;">出品</div>
    <div>
        <i class="fas fa-camera" style="font-size: 30px;"></i>
    </div>
</a>
</div>
<div class="d-md-none">
    <a href="{{route('sell')}}"
   class="bg-primary text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
   role="button"
   style="position: fixed; bottom: 30px; right: 30px; width: 100px; height: 100px; border-radius: 75px;"
>
    <div style="font-size: 20px;">出品</div>
    <div>
        <i class="fas fa-camera" style="font-size: 25px;"></i>
    </div>
</a>
</div>
@endsection