
@extends('index')
<!-- Set the title content to "Home" -->
@section('title', 'Home')
<!-- Set the "content" section, which will replace "@yield('content')" in the index file we're extending -->
@section('content')
    <div class="jumbotron text-light" style="background-image: url({{'image/ritlite1.png'}})">

        <div class="container">
            <h1 class="display-3">Резервирай своето място във Враца повече от лесно!</h1>
            <a href="/register" class="btn btn-success btn-lg my-2">Регистрирай се за достъп до десетки хотели във Враца и региона</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Удобство</h5>
                        <p class="card-text">Управлявай своите резервации от едно място</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Най-добри цени гарантирано</h5>
                        <p class="card-text">Имаме специални намаления за нашите хотели партньори</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Лесен за използване</h5>
                        <p class="card-text">Резервирай и управлявай само с кликане на бутон</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection