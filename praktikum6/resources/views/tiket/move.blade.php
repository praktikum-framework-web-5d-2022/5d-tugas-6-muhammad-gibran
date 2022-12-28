<div class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('tikets.moveUpdate')}}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="from" class="form-label">Dari Kelas</label>
                    <select name="from" id="from" class="form-select">
                        @foreach ($tikets as $tiket)
                            <option value="{{$tiket->id}}">{{$tiket->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="to" class="form-label">Ke Kelas</label>
                    <select name="to" id="to" class="form-select">
                        @foreach ($tikets as $tiket)
                            <option value="{{$tiket->id}}">{{$tiket->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Move</button>
            </form>
        </div>
    </div>
</div>
