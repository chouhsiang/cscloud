@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('charts.update', $chart->id) }}">
                        @csrf
                        @method('PUT')
                        <h2>編輯應用程式</h2>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">應用程式名稱*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $chart->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">圖片*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="icon" value="{{ $chart->icon }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">說明*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="3">{{ $chart->description }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">YML*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="yml" rows="5">{{ $chart->yml }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection