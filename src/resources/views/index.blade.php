@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('content')
<div class="product-page">
    <div class="product__sidebar">
        {{-- 検索フォーム --}}
        <h2 class="sidebar__ttl">商品一覧</h2>
        <form action="{{ route('products.search')}}" method="get" class="sidebar__search-form">
        @csrf
            <input type="text" class="sidebar__search-form__input" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索">
            <button type="submit" class="sidebar__search-form__button">検索</button>
        </form>
        {{-- 価格で表示 --}}
        <form action="{{ route('products.search')}}" method="get" class="sidebar__search-form">
        @csrf
            @if(request('keyword'))
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            @endif
            <div class="sort">
                <label for="sort" class="sort__label">価格順で表示</label>
                <select id="sort" name="sort" class="sort__select" onchange="this.form.submit()">
                    <option value="">価格を選択</option>
                    <option value="high">高い順に表示</option>
                    <option value="low">安い順に表示</option>
                </select>
            </div>
        </form>
    </div>

    <div class="product-page__main">
        {{-- 商品追加ボタン --}}
        <div class="product-page__header">
            <a href="{{ route('products.register') }}" class="product-page__header-btn">+ 商品を追加</a>
        </div>

        {{-- 商品一覧 --}}
        <div class="product-grid">
            @foreach ($products as $product)
            <div class="product-card">
                <a class="product-card__link" href="{{ route('products.show', ['productId' => $product->id]) }}">
                <img src="{{ asset(ltrim($product->image, '/')) }}" alt="{{ $product->name }}">
                <div class="product-card__info">
                    <p class="product-card__name">{{$product->name}}</p>
                    <p class="product-card__price">¥{{$product->price}}</p>
                </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ページネーション --}}
        <div class="pagination">
        </div>
    </div>
</div>
@endsection

