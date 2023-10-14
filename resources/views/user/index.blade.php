@extends('layouts.template')

@section('content')
@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success')}}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted')}}</div>
@endif

<div class="d-flex flex-row-reverse">
    <div class="p-2"><a href="{{ route('user.create') }}" class="btn btn-secondary">Tambah Pengguna</a></div>
</div>
<br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Komfirmasi Hapus</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Yakin anda ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
          </div>
        </div>
      </div>