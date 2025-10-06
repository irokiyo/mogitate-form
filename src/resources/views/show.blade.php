@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection


@section('content')
<div class="main">
    <div class="main__card">
        <div class="main__crumb">
            <a href="{{ route('index') }}" class="main__crumb-link">商品一覧</a> <span class="main__crumb-span">›</span> {{ $product->name }}


        </div>
        <div class="actions-row">
            {{-- 更新フォーム --}}
            <form id="form-update" class="form" action="{{ route('products.update', ['productId' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form__grid">
                    <div class="form__grid-item">
                        <div class="form__grid-image">
                            <img id="pePreview" src="{{ $product->image_url }}" alt="preview">

                        </div>
                        <label class="form__grid-upload">
                            <input type="file" name="image" accept="image/*" id="peImageInput" class="form__grid-upload__input">
                            <span class="form__grid-upload__btn">ファイルを選択</span>
                            <span id="peFileName" class="form__grid-upload__name">
                                {{ $product->image ? basename($product->image) : '選択されていません' }}
                            </span>
                        </label>
                        @error('image') <p class="pe-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-item">
                        <div class="form-item-field">
                            <label class="form-item-field-label">商品名</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-item-field-input">
                            @error('name') <p class="pe-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-item-field">
                            <label class="form-item-field-label">値段</label>
                            <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-item-field-input">
                            @error('price') <p class="pe-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-item-field">
                            <label class="form-item-field-label">季節</label>
                            <div class="season">
                                @foreach($seasons as $season)
                                <label>
                                    <input class="form-season" type="checkbox" name="seasons[]" value="{{ $season->id }}">
                                    {{ $season->name }}
                                </label>
                                @endforeach
                                @error('seasons') <p class="pe-error">{{ $message }}</p> @enderror
                                @error('seasons.*') <p class="pe-error">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-item2">
                    <div class="form-item-field-description">
                        <label class="form-item-field-label">商品説明</label>
                        <textarea name="description" rows="6" class="from-textarea">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="pe-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- ボタン行 --}}
                <div class="form__btn">
                    <a href="{{ route('index') }}" class="form__btn-back">戻る</a>
                    <div class="form-actions__btn">
                        <button type="submit" class="form__btn-update">変更を保存</button>
                    </div>
            </form>
            <form action="{{ route('products.delete',['productId' => $product->id])}}" method="post" class="delete-form">
                @csrf
                @method('DELETE')
                <div class="delete-form__button">
                    <button type="submit" class="delete-form__buttonーbtn" title="削除">🗑</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

