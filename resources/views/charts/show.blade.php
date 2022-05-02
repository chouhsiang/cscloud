@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="d-flex align-items-center">
                        <div class="me-3" style="width:150px">
                            <div class="img-cover rounded-circle" style="background-image: url('{{ $chart->icon }}')">
                            </div>
                        </div>
                        <div>
                            <h1 class="text-capitalize">{{ $chart->name }}</h1>
                        </div>

                    </div>

                    <hr>
                    <div class="content">
                        <h2>應用程式介紹</h2>
                        <p>{{ $chart->description }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ms-4 me-4">
                        <div style="margin-bottom:8rem">
                            <a class="btn btn-primary w-100 mb-3" href="/apps/create?chart=wordpress">建立此服務</a>
                            <a class="btn btn-outline-primary mb-3 w-100" href="/charts">返回應用程式商城</a>
                            <a class="btn btn-primary w-100 mb-3"
                                href="{{ route('charts.edit', $chart->id) }}">編輯應用程式</a>
                            <form method="POST" action="{{ route('charts.destroy', $chart->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary w-100 mb-3">刪除應用程式</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection