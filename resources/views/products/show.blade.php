@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-view-top">
                        <h1>{{ $product->nama }}</h1>
                        <h2>{{$product->tipe_products->nama}}</h2>
                        <p>{{ $product->harga }}</p>
                        @if ($product->image == null)
                            <img src="{{ asset('images/blank.jpg') }}">
                        @else
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="Product Image">
                        @endif
                        <h2>Fasilitas:</h2>
                        <div class="row">
                                @foreach ($product->fasilitas as $fasilitas)
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <h3>{{$fasilitas->nama}}</h3>
                                        <p>{{$fasilitas->deskripsi}}</p>

                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                @endsection
