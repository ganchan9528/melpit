@extends('layouts.app')

@section('title')
    購入した商品一覧
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-10 offset-1 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">購入した商品</div>

                @foreach ($items as $item)
                    @include("mypage.sections._item", ["url_type" => "likes"])
                @endforeach
            </div>
        </div>
    </div>
@endsection