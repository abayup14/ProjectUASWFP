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

            </div>
        </div>
        <div class="cart-page-inner">
            <div style="display:flex; justify-content:center; align-items:center;">
                <div class="nota">
                    <div class="col-md-12">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <h2>Laralux</h2>
                                <br>
                                <div class="invoice">
                                    <p>Customer:</p>
                                    <p>{{$transaksi->users->name}}</p>
                                </div>
                                <hr>
                                <table style="width:100%">
                                    @foreach ($transaksi->products as $product)
                                        <tr>
                                            <td>
                                                <p>{{ $product->nama }}</p>
                                            </td>
                                            <td>
                                                <p>{{ 'IDR ' . $product->harga }}</p>
                                            </td>
                                            <td>
                                                <p>x {{ $product->pivot->quantity }}</p>
                                            </td>
                                            <td style="display: flex; justify-content:end">
                                                <p>{{ 'IDR ' . $product->pivot->sub_total }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <hr>
                                <div class="invoice">
                                    <p>Total</p>
                                    <p>{{ 'IDR ' . $transaksi->total_sebelum }}</p>
                                </div>
                                <div class="invoice">
                                    <p>Total Sesudah Pajak</p>
                                    <p>{{ 'IDR ' . $transaksi->total_sesudah_pajak }}</p>
                                </div>
                                <div class="invoice">
                                    <p>Poin Terpakai</p>
                                    <p>{{ $transaksi->poin_terpakai }}</p>
                                </div>
                                <div class="invoice">
                                    <p></p>
                                    <p>-{{ 'IDR ' . $transaksi->poin_terpakai * 100000 }}</p>
                                </div>

                                <div class="invoice">
                                    <h2>Grand Total</h2>
                                    <h2>{{ 'IDR ' . $transaksi->total_bayar }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .nota {
        width: 50%;
        background-color: white;
    }

    .invoice {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
