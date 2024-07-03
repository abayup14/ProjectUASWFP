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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Hotel</th>
                                                <th>Alamat</th>
                                                <th>No Telpon</th>
                                                <th>Email</th>
                                                <th>Rating</th>
                                                <th>Tipe Hotel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hotels as $hotel)
                                                <tr>
                                                    <td>{{ $hotel->nama }}</td>
                                                    <td>{{ $hotel->alamat }}</td>
                                                    <td>{{ $hotel->nomor_telepon}}</td>
                                                    <td>{{ $hotel->email}}</td>
                                                    <td>{{ $hotel->rating}}</td>
                                                    <td>{{ $hotel->tipe_hotels->nama}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Product</th>
                                                <th>Harga</th>
                                                <th>Tipe product</th>
                                                <th>Hotel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->nama }}</td>
                                                    <td>{{ $product->harga }}</td>
                                                    <td>{{ $product->tipe_products->nama}}</td>
                                                    <td>{{ $product->hotel->nama}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Pelanggan</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Poin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->poin}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Pelanggan</th>
                                                <th>Total Belum Pajak</th>
                                                <th>Total Sudah Pajak</th>
                                                <th>Poin Terpakai</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksis as $transaksi)
                                                <tr>
                                                    <td>{{ $transaksi->tanggal }}</td>
                                                    <td>{{ $transaksi->users->name }}</td>
                                                    <td>{{ $transaksi->total_sebelum }}</td>
                                                    <td>{{ $transaksi->total_sesudah_pajak}}</td>
                                                    <td>{{ $transaksi->poin_terpakai}}</td>
                                                    <td>{{ $transaksi->total_bayar}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Produk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fasilitases as $fasilitas)
                                                <tr>
                                                    <td>{{ $fasilitas->nama }}</td>
                                                    <td>{{ $fasilitas->deskripsi}}</td>
                                                    <td>{{ $fasilitas->product->nama}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
