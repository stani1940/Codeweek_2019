@extends('index')
@section('title', 'Dashboard')
@section('content')
    <div class="jumbotron text-light" style="background-image: url({{'image/ritlite1.png'}})">
    </div>
    <div class="container text-center my-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Управлявай своите резервации </h4>
                        <p class="card-text">Виж и редактирай своите текущи резервации.</p>
                        <a href="{{route('reservations.index')}}" class="btn btn-primary">Моите резервации</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Намери своето място за отдих и почивка</h4>
                        <p class="card-text">Разгледай каталога ни с хотели партньори.</p>
                        <a href="{{route('hotels')}}" class="btn btn-primary">Нашите Хотели</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection