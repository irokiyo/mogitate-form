@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection


    <div class="show">
        <div class="show-ttl">
            <a href="{{ route('products.index') }}">商品一覧</a> <span>›</span> {{ $product->name }}
        </div>

        <form class="show-product" action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                    @error('image') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                {{-- 右側 --}}
                <div class="show-product-item">
                    <div>
                        <label class="form-label">商品名</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="input">
                        @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">値段</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="input">
                        @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">季節</label>
                        <div class="flex items-center gap-6">
                            @foreach ($seasons as $season)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', $selectedSeasonIds)) ? 'checked' : '' }}>
                                <span>{{ $season->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        @error('seasons') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">商品説明</label>
                        <textarea name="description" rows="6" class="textarea">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="mt-10 flex items-center justify-between">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>

                <div class="flex items-center gap-4">
                    <button type="submit" class="btn btn-primary">変更を保存</button>

                    {{-- ゴミ箱ボタン --}}
                    <form action="{{ route('products.destroy', $product) }}" method="post" onsubmit="return confirm('本当に削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="削除">
                            🗑
                        </button>
                    </form>
                </div>
            </div>
        </form>
    </div>

{{-- 画像プレビュー --}}
<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('preview');
    const fileName = document.getElementById('fileName');

    input ? .addEventListener('change', (e) => {
        const file = e.target.files ? . [0];
        if (!file) return;
        fileName.textContent = file.name;

        const reader = new FileReader();
        reader.onload = () => {
            preview.src = reader.result;
        };
        reader.readAsDataURL(file);
    });

</script>
@endsection

