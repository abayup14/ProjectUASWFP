@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-view-top">
                        <div class="flex" style="justify-content: space-between">

                            <h1>{{ $hotel->nama }}</h1>
                            @if (Auth::user())
                                @if (Auth::user()->role != 'Pelanggan')
                                    <a href={{ route('product.create') }}><button class="btn btn-info">Tambah
                                            Produk</button></a>
                                @endif
                            @endif
                        </div>
                        <p class="btn btn-danger">{{ $hotel->tipe_hotels->nama }}</p>
                        <p>Alamat : {{ $hotel->alamat }}</p>
                        <p>Nomor Telepon : {{ $hotel->nomor_telepon }}</p>
                        <p>Email : {{ $hotel->email }}</p>
                        <p>Rating : {{ $hotel->rating }}</p>
                        @if ($hotel->image == null)
                            <img src="{{ asset('images/blank.jpg') }}">
                        @else
                            <img src="{{ asset('images/hotel/' . $hotel->image) }}" alt="Product Image">
                        @endif
                        <div class="row">
                            <br>
                            <div class="flex flex-wrap">
                                @foreach ($hotel->products as $product)
                                    <div class="col-md-4">
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a href="">{{ $product->nama }}</a>
                                            </div>
                                            <div class="product-image">
                                                <a href="/product/{{ $product->id }}">
                                                    @if ($product->image == null)
                                                        <img src="{{ asset('images/blank.jpg') }}">
                                                    @else
                                                        <img src="{{ asset('images/products/' . $product->image) }}"
                                                            alt="Product Image">
                                                    @endif
                                                </a>

                                            </div>
                                            <div class="action flex">

                                                @if (Auth::user())
                                                    @if (Auth::user()->role == 'Pelanggan')
                                                        <a class="btn" href="{{ route('addCart', $product->id) }}"><i
                                                                class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                    @else
                                                        <form action="{{ route('product.destroy', $hotel->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Delete" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure to delete {{ $product->id }} - {{ $product->nama }} ?');">
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endsection
