@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection


@section('content')
<div class="product">
    <div class="product__header">
        <h1 class="product_header-ttl">商品登録</h1>

        <form class="product__form" action="{{ route('products.register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            {{-- 商品名 --}}
            <div class="form__group">
                <label for="name" class="form__label">
                    商品名 <span class="form__label-required">必須</span>
                </label>
                <input id="name" name="name" type="text" class="form-name" placeholder="商品名を入力" value="{{ old('name') }}">
                @error('name') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            {{-- 値段 --}}
            <div class="form__group">
                <label for="price" class="form__label">
                    値段 <span class="form__label-required">必須</span>
                </label>
                <input id="price" name="price" type="text" class="input" placeholder="値段を入力" value="{{ old('price') }}">
                @error('price') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            {{-- 商品画像 --}}
            <div class="form__group">
                <label for="image" class="form__label">
                    商品画像 <span class="form__label-required">必須</span>
                </label>
                <input id="image" name="image" type="file" accept="image/*" class="file">
                @error('image') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            <div class="form__row--split">
                {{-- 季節（複数選択可） --}}
                <div class="form__group">
                    <div class="form__label">
                        季節 <span class="form__label-required">必須</span>
                        <span class="form__label-memo">複数選択可</span>
                    </div>
                    <div class="season">
                        @foreach($seasons as $season)
                        <label>
                            <input class="form-season" type="checkbox" name="seasons" value="{{ $season->id }}" >
                            {{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                    @error('season') <p class="form__error">{{ $message }}</p> @enderror
                </div>

                {{-- 商品説明 --}}
                <div class="form__group">
                    <label for="description" class="form__label">
                        商品説明 <span class="form__label-required">必須</span>
                    </label>
                    <textarea id="description" name="description" rows="6" class="textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    @error('description') <p class="form__error">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- ボタン --}}
            <div class="form__btn">
                <a href="{{ url('/products') }}" class="form__btn-back">戻る</a>
                <button type="submit" class="form__btn-create">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection

