@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="">
                <div class="">
                    <div class="row">
                        <a href={{ route("hotel.create") }}><button class="btn btn-info">Tambah Hotel</button></a>
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="flex flex-wrap">
                                        @foreach ($hotels as $hotel)
                                            <div class="col-md-4">
                                                <div class="product-item">
                                                    <div class="product-title">
                                                        <a href="">{{ $hotel->nama }}</a>
{{--                                                        <div class="ratting">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                    <div class="product-image">
                                                        <a href="/hotel/{{$hotel->id}}">
                                                            @if ($hotel->image == null)
                                                                <img src="{{ asset('images/blank.jpg') }}">
                                                            @else
                                                                <img src="{{ asset('images/hotel/' . $hotel->image) }}"
                                                                    alt="Product Image">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
