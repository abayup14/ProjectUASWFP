@extends('layouts.frontend')

@section('content')
    <div class="product-view">
        <div class="container-fluid">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <div class="flex flex-wrap">
                                        <form method="POST" action="{{ route('fasilitas.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputType">Name of Fasilitas</label>
                                                <input type="text" class="form-control" id="exampleInputType"
                                                    name="fasilitas_nama" aria-describedby="nameHelp"
                                                    placeholder="Enter Name of fasilitas...">
                                                <label for="exampleInputType">Description of Fasilitas</label>
                                                <input type="text" class="form-control" id="exampleInputType"
                                                    name="fasilitas_deskripsi" aria-describedby="nameHelp"
                                                    placeholder="Enter Description of fasilitas...">
                                                <select name="product" id="products">
                                                    @foreach ($data as $d)
                                                        <option value={{ $d->id }}>{{ $d->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            {{-- <a class="btn btn-warning" href="{{ route('product.index') }}">Back</a> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
