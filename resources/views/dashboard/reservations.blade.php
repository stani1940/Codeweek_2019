@extends('index')
@section('title', 'Reservations')
@section('content')
    <div  style="text-align: center" class="container mt-5">
        <h2>Вашите резервации</h2>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th scope="col">Хотел</th>
                <th scope="col">Дата на зъздаване</th>
                <th scope="col">Дата на пристигане</th>
                <th scope="col">Дата на заминаване</th>
                <th scope="col">Вид стая</th>
                <th scope="col">Брой гости</th>
                <th scope="col">Цена на нощувка</th>
                <th scope="col">Действия по упраление</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->room->hotel['name'] }}</td>
                    <td>{{ $reservation->created_at}}</td>
                    <td>{{ $reservation->arrival }}</td>
                    <td>{{ $reservation->departure }}</td>
                    <td>{{ $reservation->room['type'] }}</td>
                    <td>{{ $reservation->num_of_guests }}</td>
                    <td>{{ $reservation->room['price'] }} лв.</td>
                    <td><a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="btn btn-sm btn-success">Редактирай</a></td>
                    <td>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <p class="text-right">
                                <button type="submit" class="btn btn-sm btn-danger">Изтрий</button>
                            </p>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(!empty(Session::get('success')))
            <div class="alert alert-success"> {{ Session::get('success') }}</div>
        @endif
        @if(!empty(Session::get('error')))
            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
        @endif
    </div>
@endsection