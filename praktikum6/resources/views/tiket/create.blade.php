@extends('layouts.app')
@section('content')
<div class="container my4">
    <div class="row">
        <div class="col-md-12">
            <h2>Tambah Penumpang Untuk {{$tiket->nama}}</h2>
            <form action="{{route('tikets.store',['tiket' => $tiket->id])}}" method="post">
            @csrf
            @include('tiket.form',['button' => 'Tambah'])
            </form>
        </div>
    </div>
</div>
@endsection
