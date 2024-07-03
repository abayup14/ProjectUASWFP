@extends('layouts.frontend')

@section('content')
    <div style="padding:1rem">
        <div class="cart-page-inner">
            <div class="table-responsive">
                @php
                    $total = 0;
                    $totalPajak = 0;
                    $totalBayar = 0;
                @endphp
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if ($transaksis)
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{$transaksi->tanggal}}</td>
                                    <td>{{$transaksi->total_bayar}}</td>
                                    <td>
                                        <a class="btn" href="/list_transaksi/{{$transaksi->id}}">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <p>Tidak ada transaksi.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
