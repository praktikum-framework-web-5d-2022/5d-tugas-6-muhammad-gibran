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
                Find
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark text-light mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            Bisnis
                            <a href="{{route('tikets.create', ['tiket' => 1])}}" class="btn btn-primary btn-sm">Tambah Penumpang</a>
                        </div>
                    </div>
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach ($bisnis_find->penumpangs as $item)
                    <li class="list-group-item">{{$item->nama}}</li>
                    @endforeach
                </ol>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-light mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            Ekonomi
                            <a href="{{route('tikets.create', ['tiket' => 2])}}" class="btn btn-primary btn-sm">Tambah Penumpang</a>
                        </div>
                    </div>
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach ($ekonomi_find->penumpangs as $item)
                    <li class="list-group-item">{{$item->nama}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card bg-dark text-light mb-4">
            <div class="card-body">
                All
            </div>
        </div>
        <div class="my-2">
            <a href="{{route('tikets.move')}}" class="btn btn-primary">Pindahkan Penumpang</a>
        </div>
        <ol class="list-group list-group-numbered">
            @foreach ($all_tiket as $item)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        {{$item->nama}}
                        <form action="{{route('tikets.destroy',['tiket'=>$item->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn text-danger">Delete</button>
                        </form>
                    </div>
                    <ul>
                        @foreach ($item->penumpangs as $value)
                        <li>{{$value->nama}}</li>
                        @endforeach
                    </ul>
                </div>
                <span class="badge bg-primary rounded-pill">{{$item->penumpangs_count}}</span>
            </li>
            @endforeach
        </ol>
    </div>
</div>
@endsection