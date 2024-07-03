@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-view-top">
                        <h1>{{ $product->nama }}</h1>
                        <p class="btn btn-danger">{{ $product->tipe_products->nama }}</p>
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
                                        <h3>{{ $fasilitas->nama }}</h3>
                                        <p>{{ $fasilitas->deskripsi }}</p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (Auth::user())
                            @if (Auth::user()->role != "pelanggan")
                                <a class="btn btn-warning" href="{{ route('fasilitas.create') }}">+ Add Fasilitas</a>
                            @endif
                        @endif

                    </div>
                @endsection
