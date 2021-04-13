@extends('layouts.app')

@section('title')
    {{$item->name}} | 商品詳細
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 bg-white">
            <div class="row mt-3">
                <div class="col-10 offset-1">
                    @if (session('message'))
                        <div class="alert alert-{{ session('type', 'success') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            @include('items.item_detail_panel', [
                'item' => $item
            ])

            <div class="row">
                <div class="col-10 offset-1">
                        @if ($item->seller != $user)
                            @if (!empty($cartitem->item_id))
                                <a href="{{ route('cart-items') }}" class="btn btn-primary col-md-12"><i class="fas fa-cart-plus mr-1"></i>カートを見る</a>
                            @else
                                <form method="POST" action="{{ route('cart-items') }}" class="form-inline m-1" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary col-md-12"><i class="fas fa-cart-plus mr-1"></i>カートに入れる</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('sell-edit', [$item->id]) }}" class="btn btn-primary col-md-12"><i class="fas fa-cart-plus mr-1"></i>商品情報を編集する</a>
                        @endif
                </div>
            </div>

            <div class="my-3">{!! nl2br(e($item->description)) !!}</div>
        </div>
    </div>
</div>
@endsection