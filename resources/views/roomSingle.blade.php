@extends('index')
@section('title', 'Room Details')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div style="background-image:url('{{ asset($room->image) }}'); height:400px; background-size:cover; background-position:center; background-color:#eee;"
                         class="img-fluid" alt="{{ $room->type }}"></div>
                    <div class="card-body text-center">
                        <h2 class="card-title">{{ $room->type }}</h2>
                        <h5 class="text-muted">{{ $room->hotel->name }} - {{ $room->hotel->location }}</h5>
                        <p class="card-text mt-3">{{ $room->description }}</p>
                        <h4 class="card-text my-4">Цена: {{ $room->price }} BGN</h4>
                        
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ url('/roomprice/' . $room->id) }}" class="btn btn-lg btn-success">Вземи реална оферта</a>
                            <a href="{{ url('/dashboard/reservations/create/' . $room->hotel->id . '?room_id=' . $room->id) }}" class="btn btn-lg btn-primary">Резервирай сега</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection