@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('content')
    <div class="show">
        <div class="show-ttl">
            <a href="{{ route('index') }}">商品一覧</a> <span>›</span> {{ $product->name }}
        </div>

        <form class="show-product" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="show-product">
                {{-- 画像 --}}
                <div class="show-product-card">
                    <div class="show-product-card-img">
                        <img id="preview" src="{{ $product->image_url ?? asset('images/noimage.png') }}" alt="preview" class="w-full h-full object-cover">
                    </div>
                    <label class="show-product-card-img-upload">
                        <span class="show-product-card-img-upload-btn">ファイルを選択</span>
                        <input type="file" name="image" accept="image/*" class="hidden" id="imageInput">
                    </label>
                    @error('image') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                {{-- 右側 --}}
                <div class="show-product-item">
                    <div>
                        <label class="form-label">商品名</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-labelーname">
                        @error('name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">値段</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-label-price">
                        @error('price') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">季節</label>
                        <div class="flex items-center gap-6">
                            @foreach ($seasons as $season)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}">
                                <span>{{ $season->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        @error('seasons') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">商品説明</label>
                        <textarea name="description" rows="6" class="textarea">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="show-product-btn">
                <a href="{{ route('index') }}" class="show-product-btn-back">戻る</a>
                <div class="show-product-btn">
                    <button type="submit" class="show-product-btn-update">変更を保存</button>
                    {{-- ゴミ箱ボタン --}}
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="show-product-btn-delate" title="削除">
                            🗑
                        </button>
                    </form>
                </div>
            </div>
        </form>
    </div>
@endsection