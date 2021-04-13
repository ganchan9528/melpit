@extends('layouts.app')

@section('title')
    商品購入
@endsection

@section('content')
<script src="https://js.pay.jp/v2/pay.js"></script>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 bg-white">
            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">決済フォーム</div>
                @foreach ($cartitems as $item)
                    @include("mypage.sections._item", ["url_type" => "likes"])
                @endforeach
        
                <div class="font-weight-bold text-center pb-5 pt-5" style="font-size: 24px">
                    <span class="mr-1">小計</span>
                    <i class="fas fa-yen-sign"></i>
                    <span class="ml-1">{{number_format($subtotal)}}</span>
                </div>

                <div class="card-form-alert alert alert-danger" role="alert" style="display: none"></div>
                <div class="form-group mt-3">
                    <label for="number-form">カード番号</label>
                    <div id="number-form" class="form-control"><!-- ここにカード番号入力フォームが生成されます --></div>
                </div>
                <div class="form-group mt-3">
                    <label for="expiry-form">有効期限</label>
                    <div id="expiry-form" class="form-control"><!-- ここに有効期限入力フォームが生成されます --></div>
                </div>
                <div class="form-group mt-3">
                    <label for="expiry-form">セキュリティコード</label>
                    <div id="cvc-form" class="form-control"><!-- ここにCVC入力フォームが生成されます --></div>
                </div>

                <button class="btn btn-primary btn-block" onclick="onSubmit(event)">購入</button>
            
            </div>

            <form id="buy-form" method="POST" action="{{route('item.buy', [$item->id])}}">
                @csrf
                <input type="hidden" id="card-token" name="card-token">
            </form>
        </div>
    </div>
</div>
<script>
    var payjp = Payjp('{{config("payjp.public_key")}}')
  
    var elements = payjp.elements()
  
    var numberElement = elements.create('cardNumber')
    var expiryElement = elements.create('cardExpiry')
    var cvcElement = elements.create('cardCvc')
    numberElement.mount('#number-form')
    expiryElement.mount('#expiry-form')
    cvcElement.mount('#cvc-form')

    function onSubmit(event) {
        const msgDom = document.querySelector('.card-form-alert');
        msgDom.style.display = "none";
  
        payjp.createToken(numberElement).then(function(r) {
            if (r.error) {
                msgDom.innerText = r.error.message;
                msgDom.style.display = "block";
                return;
            }
  
            document.querySelector('#card-token').value = r.id;
            document.querySelector('#buy-form').submit();
        })
      }
</script>
@endsection