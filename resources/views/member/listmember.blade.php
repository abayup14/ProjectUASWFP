@extends("layouts.frontend")

@section("content")
    <div class="container">
        <div class="container-fluid">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-view-top">
                                <div class="row">
                                    <select name="">
                                        
                                    </select>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Poin</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($member as $mbm)
                                            <tr>
                                                <td>{{$mbm->id}}</td>
                                                <td>{{$mbm->nama}}</td>
                                                <td>{{$mbm->email}}</td>
                                                <td>{{$mbm->poin}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
