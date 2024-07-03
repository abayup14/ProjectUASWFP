@extends('layouts.frontend')

@section('content')
    <div class="container">
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
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Poin</th>
                                                <th>Role</th>
                                                <th>Membership</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($member as $mbm)
                                                <tr>
                                                    <td>{{ $mbm->id }}</td>
                                                    <td>{{ $mbm->name }}</td>
                                                    <td>{{ $mbm->email }}</td>
                                                    <td>{{ $mbm->poin }}</td>
                                                    <td>{{ $mbm->role }}</td>
                                                    <td>
                                                        <select onchange="changeMember({{ $mbm->id }}, this.value);">
                                                            <option value="Member"
                                                                {{ $mbm->member == 'Member' ? 'selected' : '' }}>Member
                                                            </option>
                                                            <option value="Bukan Member"
                                                                {{ $mbm->member == 'Bukan Member' ? 'selected' : '' }}>
                                                                Non-Member</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
                @section('js')
                    <script>
                        function changeMember(id, new_member) {
                            console.log("sasd");
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('changemember') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': id,
                                    'new_member': new_member
                                },
                                success: function(data) {
                                    location.reload();
                                }
                            });
                        }
                    </script>
                @endsection
