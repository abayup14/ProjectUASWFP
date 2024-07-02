@extends("layouts.frontend")

@section("content")
    <div class="container">
        <form method="POST" action="{{ route("product.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputType">Nama Produk</label>
                <input type="text" class="form-control" id="exampleInputType" name="product_name"
                       aria-describedby="nameHelp" placeholder="Masukkan Nama Produk...">
                <br>
                <label for="exampleInputType">Harga Produk</label>
                <input type="number" class="form-control" id="exampleInputType" name="product_price"
                       aria-describedby="nameHelp" placeholder="Masukkan Alamat Hotel...">
                <br>
                <label for="exampleInputType">Gambar Produk</label>
                <input type="file" class="form-control" id="exampleInputType" name="hotel_image"
                       aria-describedby="nameHelp" placeholder="Masukkan Gambar Hotel...">
                <input type="hidden" name='product_id' value="{{$new_product_id}}"/>
                <br>
                <label for="">Tipe Produk</label>
                <br>
                <select name="hotel_tipe">
                    @foreach($tipe_produk as $tp)
                        <option value={{$tp->id}}>{{$tp->nama}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <label for="">Hotel</label>
                <br>
                <select name="hotel_id">
                    @foreach($hotel as $h)
                        <option value={{$h->id}}>{{$h->nama}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
