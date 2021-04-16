@extends('layouts.app')

@section('title')
	商品出品
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-8 offset-2">
			@if (session('status'))
			  <div class="alert alert-success" role="alert">
			 	{{ session('status') }}
			  </div>
			@endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-10 offset-1 bg-white">
		
		<div class="font-weight-bold text-center border-bottom pd-3 pt-3" style="font-size: 24px">商品</div>

		<form method="POST" action="{{ route('sell-edit', [$item->id]) }}" class="pt-5 px-2 pb-1" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- 商品画像 --}}
            <div>商品画像</div>
            <div class="d-none d-md-block">
                <span class="item-image-form image-picker">
                	<input type="file" name="item-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="item-image" />
    				<label for="item-image" class="d-inline-block" role="button">
                            <img src="/storage/item-images/{{$item->image_file_name}}" style="object-fit: cover; width: 300px; height: 300px;">
                            <!-- <img src="{{$item->image_file_name}}" style="object-fit: cover; width: 300px; height: 300px;"> -->
    				</label>
                </span>
            </div>
            <div class="d-md-none">
                <span class="item-image-form image-picker">
                    <input type="file" name="item-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="item-image" />
                    <label for="item-image" class="d-inline-block" role="button">
                        <img src="/images/item-image-default.png" style="object-fit: cover; width: 100%; height: 20%;">
                    </label>
                </span>
            </div>

            {{-- 商品名 --}}
            <div class="form-group">
                <label for="name">商品名</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item->name) }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- 商品の説明 --}}
            <div class="form-group">
                <label for="description">商品の説明</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description', $item->description) }}</textarea> 

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- カテゴリ --}}
            <div class="form-group">
                <label for="category">カテゴリ</label>
				<select name="category" class="custom-select form-control @error('category') is-invalid @enderror">
                    @foreach ($categories as $category)
                      <optgroup label="{{$category->name}}">
                        @foreach($category->secondaryCategories as $secondary)
                          <option value="{{$secondary->id}}" {{old('category') == $secondary->id ? 'selected' : ''}}>
                             {{$secondary->name}}
                          </option>
                        @endforeach
                      </optgroup>
                    @endforeach
                </select>

                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- 商品の状態 --}}
            <div class="form-group">
                <label for="condition">商品の状態</label>

                <select name="condition" class="custom-select form-control @error('condition') is-invalid @enderror">
                	@foreach ($conditions as $condition)
                      <option value="{{$condition->id}}" {{old('condition') == $condition->id ? 'selected' : ''}}>
                          {{$condition->name}}
                      </option>
                    @endforeach
                </select>

                @error('condition')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- 販売価格 --}}
            <div class="form-group">
                <label for="price">販売価格</label>

                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $item->price) }}" required autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="offset-3 w-50 form-group mb-0 mt-3">
                <button type="submit" class="btn btn-block btn-primary">
                	保存する
                </button>
            </div>
        </form>
        <form method="POST" action="{{ route('sell-destroy', [$item->id]) }}" class="pt-1 px-2 pb-5" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="form-group w-50 offset-3">
                <button type="submit" class="btn btn-block btn-danger">
                    出品取り消し
                </button>
            </div>
        </form>
	</div>
</div>
@endsection