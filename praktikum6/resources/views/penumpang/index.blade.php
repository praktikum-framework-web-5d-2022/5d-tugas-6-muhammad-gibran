@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
        @endif
        <div class="card bg-dark text-light mb-4">
            <div class="card-body">
                Cari Penumpang
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('penumpangs.search')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>
                @if (session()->has('data'))
                    <ol class="list-group list-group-numbered">
                        @foreach (session()->get('data') as $item)
                            <li class="list-group-item">{{$item->nama}}</li>
                        @endforeach
                    </ol>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card bg-dark text-light mb-4">
            <div class="card-body">
                Tambah Penumpang
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('penumpangs.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nomor_penumpang" class="form-label">Nomor Penumpang</label>
                            <input type="text" name="nomor_penumpang" id="nomor_penumpang" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tiket_id" class="form-label">Tiket</label>
                            <select type="text" name="tiket_id" id="tiket_id" class="form-select">
                                @foreach ($tikets as $tiket)
                                    <option value="{{$tiket->id}}">{{$tiket->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
