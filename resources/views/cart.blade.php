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
                            <th>Product</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if (session('cart'))
                            @foreach (session('cart') as $item)
                                <tr>
                                    <td>
                                        <div class="img">
                                            @if ($item['photo'] == null)
                                                <a href="#"><img src="{{ asset('images/blank.jpg') }}"
                                                        alt="Image"></a>
                                            @else
                                                <a href="#"><img
                                                        src="{{ asset('images/products/' . $item['photo']) }}"
                                                        alt="Image"></a>
                                            @endif

                                            <p>{{ $item['nama'] }}</p>
                                        </div>
                                    </td>
                                    <td>{{ 'IDR ' . $item['harga'] }}</td>
                                    <td>
                                        <div class="qty">
                                            <button onclick="redQty({{ $item['id'] }})" class="btn-minus"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text" value="{{ $item['quantity'] }}">
                                            <button onclick="addQty({{ $item['id'] }})" class="btn-plus"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>{{ 'IDR ' . $item['quantity'] * $item['harga'] }}</td>
                                    <td><a class="btn btn-danger" href="{{ route('delFromCart', $item['id']) }}"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                                @php
                                    $total += $item['quantity'] * $item['harga'];
                                    $totalPajak = ($total * 111) / 100;
                                    if ($total > 100000) {
                                        $totalBayar = $totalPajak - session('poin_used', 0) * 100000;
                                    } else {
                                        $totalBayar = $totalPajak;
                                    }
                                @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <p>Tidak ada item di cart.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cart-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-summary">
                        <div class="cart-content">
                            <h1>Cart Summary</h1>
                            <div class="invoice">
                                <p>Total</p>
                                <p>{{ 'IDR ' . $total }}</p>
                            </div>
                            <div class="invoice">
                                <p>Total Sesudah Pajak</p>
                                <p>{{ 'IDR ' . $totalPajak }}</p>
                            </div>
                            <div class="invoice">
                                <p>Poin yang Digunakan</p>
                                <div class="poin">
                                    @if (session('poin_used', 0) > 0)
                                        <button onclick="redPoinUsed()" class="btn-minus"><i
                                                class="fa fa-minus"></i></button>
                                    @endif
                                    <input type="text" value="{{ session('poin_used', 0) }}" id="poin_used">
                                    @if ($totalBayar - 100000 > 0)
                                        <button onclick="addPoinUsed()" class="btn-plus"><i
                                                class="fa fa-plus"></i></button>
                                    @endif
                                </div>
                            </div>
                            <div class="invoice">
                                <h2>Grand Total</h2>
                                <h2>{{ 'IDR ' . $totalBayar }}</h2>
                            </div>
                        </div>
                        <div class="cart-btn">
                            <a class="btn btn-xs" href="/">Continue Shopping</button>
                            <a class="btn btn-xs" href="/newtransaction">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .invoice {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
@section('js')
    <script>
        function redQty(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('redQty') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    location.reload();
                }
            });
        }

        function addQty(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('addQty') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    location.reload();
                }
            });
        }

        function redPoinUsed() {
            $.ajax({
                type: 'POST',
                url: '{{ route('redPoinUsed') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    location.reload();
                }
            });
        }

        function addPoinUsed() {
            $.ajax({
                type: 'POST',
                url: '{{ route('addPoinUsed') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    </script>
@endsection
