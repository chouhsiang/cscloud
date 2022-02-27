@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/apps" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="card  h-100">
                    <div class="card-body">
                        <div class="img-cover rounded-circle" style="background-image: url('{{ $chart["icon"] }}')"></div>
                        <h1 class="mt-3 text-capitalize text-center">{{ $chart["chart_name"] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h2>基本資料</h2>
                        <input name="chart" type="hidden" value="{{ request()->chart }}">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">服務名稱*</label>
                            <div class="col-sm-10 col-form-label">{{ $chart["name"] }}</div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">網域名稱*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text">{{ Auth::user()->username }}-</span>
                                    <input type="text" class="form-control @error('domain') is-invalid @enderror" value="{{ $chart['domain'] }}" placeholder="點此輸入網域名稱" name="domain" required>
                                    <span class="input-group-text">.nycucs.csloud</span>
                                    @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h2>進階設定</h2>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">環境變數</label>
                            <div class="col-sm-10">
                                @foreach ($chart["env"] as  $key =>  $env)
                                <div class="row mb-3">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="變數" name="env_key[{{ $loop->index }}]" value="{{ $key }}">
                                    </div>
                                    <div class="col-1 text-center" style="line-height: 2.5rem">=</div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="值" name="env_value[{{ $loop->index }}]" value="{{ $env }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <a class="btn btn-outline-primary me-3" href="/apps">取消</a>
            <button class="btn btn-primary" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection