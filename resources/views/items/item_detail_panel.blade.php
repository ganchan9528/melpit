<div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">{{$item->name}}</div>

<div class="row">
        <div class="col-md-6 offset-3 d-none d-md-block ">
            <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}">
            <!-- <img class="card-img-top" src="{{$item->image_file_name}}"> -->
        </div>
        <div class="col-md-10 offset-1">
            <div class="d-md-none">
                <img class="card-img-top" src="/storage/item-images/{{$item->image_file_name}}">
                <!-- <img class="card-img-top" src="{{$item->image_file_name}}"> -->
            </div>
            <table class="table table-bordered mt-5">
                <tr>
                    <th>出品者</th>
                    <td>
                        @if (!empty($item->seller->avatar_file_name))
                            <img src="/storage/avatars/{{$item->seller->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                           <!-- <img src="{{$item->seller->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;"> -->
                        @else
                            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
                        @endif
                        {{$item->seller->name}}
                    </td>
                </tr>
                <tr>
                    <th>カテゴリー</th>
                    <td>{{$item->secondaryCategory->primaryCategory->name}} / {{$item->secondaryCategory->name}}</td>
                </tr>
                <tr>
                    <th>商品の状態</th>
                    <td>{{$item->condition->name}}</td>
                </tr>
            </table>
        </div>

</div>
    

<div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">
    <i class="fas fa-yen-sign"></i>
    <span class="ml-1">{{number_format($item->price)}}</span>
</div>