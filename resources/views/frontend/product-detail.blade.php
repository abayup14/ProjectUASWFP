@extends('layouts.frontend')

@section('content')
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="slider-nav-img">
                                    @if ($product->image == null)
                                        <img width="200" src="{{ asset('images/blank.jpg') }}">
                                    @else
                                        <img width="200" src="{{ asset('images/' . $product->image) }}"
                                            alt="Product Image">
                                    @endif
                                </div>
                            </div>
                            @extends('layouts.frontend')

                        @section('content')
                            <div class="product-detail">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="product-detail-top">
                                                <div class="row align-items-center">
                                                    <div class="col-md-5">
                                                        <div class="slider-nav-img">
                                                            @if ($product->image == null)
                                                                <img width="200" src="{{ asset('images/blank.jpg') }}">
                                                            @else
                                                                <img width="200"
                                                                    src="{{ asset('images/' . $product->image) }}"
                                                                    alt="Product Image">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="product-content">
                                                            <div class="title">
                                                                <h2>{{ $product->name }}</h2>
                                                            </div>
                                                            <div class="ratting">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="price">
                                                                <h4>Price:</h4>
                                                                <p>{{ 'IDR' . $product->price }}</p>
                                                            </div>
                                                            <div class="action">
                                                                <a class="btn"
                                                                    href="{{ route('addCart', $product->id) }}"><i
                                                                        class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                                <a class="btn" href="#"><i
                                                                        class="fa fa-shopping-bag"></i>Buy Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        @endsection     
