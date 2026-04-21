@extends('index')
@section('title', 'Hotels')
@section('content')
    <div class="container my-5">
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-sm-4">
                    <div class="card mb-3">
                        <div style="background-image:url('{{ asset($room->image) }}'); height:300px; background-size:cover; background-position:center; background-color:#eee;" class="img-fluid" alt="{{ $room->type }}"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->type }}</h5>
                            <p class="card-text">{{ $room->description }}</p>
                            <p class="card-text">Цeна: {{ $room->price }} BGN <a href="{{ url('/roomprice/' . $room->id) }}" class="btn btn-primary">Вземи реална оферта</a></p>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection