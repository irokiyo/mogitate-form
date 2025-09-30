@extends('layouts.app')

@section('content')
<div class="product-page">
    <div class="product__sidebar">
        {{-- 検索フォーム --}}
        <h2 class="sidebar__ttl">商品一覧</h2>
        <form action="/products" method="get" class="sidebar__search-form">
            <input type="text" name="keyword" class="sidebar__search-form__input" placeholder="商品名で検索">
            <button type="submit" class="sidebar__search-form__button">検索</button>
        </form>
        {{-- 価格で表示 --}}
        <div class="sort">
            <label for="sort" class="sort__label">価格順で表示</label>
            <select id="sort" name="sort" class="sort__select" onchange="this.form.submit()">
                <option value="">価格を選択</option>
                <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>安い順</option>
                <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>高い順</option>
            </select>
        </div>
    </div>

    <div class="product-page__main">
        {{-- 商品追加ボタン --}}
        <div class="product-page__header">
            <a href="" class="product-page__header-btn">+ 商品を追加</a>
        </div>

        {{-- 商品一覧 --}}
        <div class="product-grid">
            <div class="product-card">
                <img src="" alt="" class="product-card__image">
                <div class="product-card__info">
                    <p class="product-card__name">フルーツ</p>
                    <p class="product-card__price">¥300</p>
                </div>
            </div>
        </div>

        {{-- ページネーション --}}
        <div class="pagination">
        </div>
    </div>
</div>
@endsection

