@extends('layouts.frontend')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route("hotel.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputType">Nama Hotel</label>
                <input type="text" class="form-control" id="exampleInputType" name="hotel_name"
                       aria-describedby="nameHelp" placeholder="Masukkan Nama Hotel...">
                <br>
                <label for="exampleInputType">Alamat Hotel</label>
                <input type="text" class="form-control" id="exampleInputType" name="hotel_address"
                       aria-describedby="nameHelp" placeholder="Masukkan Alamat Hotel...">
                <br>
                <label for="exampleInputType">Nomor Telepon Hotel</label>
                <input type="text" class="form-control" id="exampleInputType" name="hotel_phone"
                       aria-describedby="nameHelp" placeholder="Masukkan Nomor Telepon Hotel...">
                <br>
                <label for="exampleInputType">Email Hotel</label>
                <input type="email" class="form-control" id="exampleInputType" name="hotel_email"
                       aria-describedby="nameHelp" placeholder="Masukkan Email Hotel...">
                <br>
                <label for="exampleInputType">Rating Hotel</label>
                <input type="number" class="form-control" id="exampleInputType" name="hotel_rating"
                       aria-describedby="nameHelp" placeholder="Masukkan Rating Hotel..." min="0" max="5" step=".1">
                <br>
                <label for="exampleInputType">Gambar Hotel</label>
                <input type="file" class="form-control" id="exampleInputType" name="hotel_image"
                       aria-describedby="nameHelp" placeholder="Masukkan Gambar Hotel...">
                <input type="hidden" name='hotel_id' value="{{$new_hotel_id}}"/>
                <br>
                <label for="">Tipe Hotel</label>
                <br>
                <select name="hotel_tipe" class="form-control">
                    @foreach($tipe_hotel as $th)
                        <option value={{$th->id}}>{{$th->nama}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
