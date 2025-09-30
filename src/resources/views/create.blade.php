@extends('layouts.app')

@section('title', '商品登録')

@section('content')
<div class="product">
    <div class="product__header">
        <h1 class="product_header-ttl">商品登録</h1>
        <form class="product__form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" novalidate>

            @csrf
            {{-- 商品名 --}}
            <div class="form__group">
                <label for="name" class="form__label">
                    商品名 <span class="form__label-required">必須</span>
                </label>
                <input id="name" name="name" type="text" class="input" placeholder="商品名を入力" value="{{ old('name') }}">
                @error('name') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            {{-- 値段 --}}
            <div class="form__group">
                <label for="price" class="form__label">
                    値段 <span class="form__label-required">必須</span>
                </label>
                <input id="price" name="price" type="number" min="0" step="1" inputmode="numeric" class="input" placeholder="値段を入力" value="{{ old('price') }}">
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

            {{-- 季節（複数選択可） --}}
            <div class="form__group">
                <div class="form__label">
                    季節 <span class="form__label-required">必須</span>
                    <span class="form__label-memo"> 複数選択可</span>
                </div>
                @php $oldSeasons = old('seasons', []); @endphp
                <div class="choice-grid">
                    <label class="choice"><input type="checkbox" name="seasons[]" value="spring" {{ in_array('spring',$oldSeasons) ? 'checked' : '' }}> 春</label>
                    <label class="choice"><input type="checkbox" name="seasons[]" value="summer" {{ in_array('summer',$oldSeasons) ? 'checked' : '' }}> 夏</label>
                    <label class="choice"><input type="checkbox" name="seasons[]" value="autumn" {{ in_array('autumn',$oldSeasons) ? 'checked' : '' }}> 秋</label>
                    <label class="choice"><input type="checkbox" name="seasons[]" value="winter" {{ in_array('winter',$oldSeasons) ? 'checked' : '' }}> 冬</label>
                </div>
                @error('seasons') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            {{-- 商品説明 --}}
            <div class="form__group">
                <label for="description" class="form__label">
                    商品説明 <span class="form__label-required">必須</span>
                </label>
                <textarea id="description" name="description" rows="6" class="textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                @error('description') <p class="form__error">{{ $message }}</p> @enderror
            </div>

            {{-- ボタン --}}
            <div class="form__btn">
                <a href="{{ url()->previous() }}" class="form__btn-back">戻る</a>
                <button type="submit" class="form__btn-create">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection

