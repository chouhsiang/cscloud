@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($chart as $c)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="img-cover rounded-circle" style="background-image: url('{{ $c->icon }}')"></div>
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-around">
                                    <a class="btn btn-outline-primary" href="/charts/{{ $c->name }}">更多內容</a>
                                    <a class="btn btn-outline-primary" href="/apps/create?chart={{ $c->name }}">建立服務</a>
                                </div>
                            </div>

                            <h2 class="text-capitalize">{{ $c->name }}</h2>
                            <p>{{ $c->description }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
