@extends('index')
@section('title', 'Направи Резервация')
@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ $hotelInfo->name }} - <small class="text-muted">{{ $hotelInfo->location }}</small></h2>
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Резервирай своето място във Враца и региона и се забавлявай!</p>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="room">Тип стая</label>
                                <select class="form-control" name="room_id">
                                    @foreach ($hotelInfo->rooms as $option)
                                        <option value="{{$option->id}}">{{ $option->type }} - {{ $option->price }} лв.</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="guests">Брой гости</label>
                                <input class="form-control" name="num_of_guests" placeholder="1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="arrival">Дата на пристигане</label>
                                <input type="date" class="form-control" name="arrival" placeholder="03/21/2020">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="departure">Departure</label>
                                <input type="date" class="form-control" name="departure" placeholder="03/23/2020">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Book it</button>
                </form>
            </div>
        </div>
    </div>
@endsection