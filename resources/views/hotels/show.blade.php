@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                @if(Auth::user())
                    @if(Auth::user()->role == "Owner")
                        <a href={{ route('product.create') }}><button class="btn btn-info">Tambah Produk</button></a>
                    @endif
                @endif
                <div class="col-md-12">
                    <div class="product-view-top">
                        <h1>{{ $hotel->nama }}</h1>
                        <p class="btn btn-danger">{{ $hotel->tipe_hotels->nama }}</p>
                        <h2>{{ $hotel->tipe_hotels->nama }}</h2>
                        <p>{{ $hotel->alamat }}</p>
                        <p>{{ $hotel->nomor_telepon }}</p>
                        <p>{{ $hotel->email }}</p>
                        <p>{{ $hotel->rating }}</p>
                        @if ($hotel->image == null)
                            <img src="{{ asset('images/blank.jpg') }}">
                        @else
                            <img src="{{ asset('images/hotel/' . $hotel->image) }}" alt="Product Image">
                        @endif
                        <div class="row">
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
                                                <a class="btn" href="{{ route('addCart', $product->id) }}"><i
                                                        class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy
                                                    Now</a>
                                                <form action="{{route("product.destroy", $hotel->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$product->id}} - {{$product->nama}} ?');">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endsection
