@extends('layout')
@section('body')
    <main class="create">
        <div class="container">

            <div class="row">
                <div class="col-md-3 icon">
                    <div class="card">
                        <div class="card-body">
                            <div class="img bg-gray3 rounded-circle "></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h2>基本資料</h2>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">服務名稱*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="點此輸入服務名稱">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">網域名稱*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="點此輸入服務名稱">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <h2>進階設定</h2>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">資料庫</label>
                                <div class="col-sm-10">
                                    是否使用MySQL<input class="form-check-input" type="checkbox">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">環境變數</label>
                                <div class="col-sm-10">
                                    <div class="row mb-3">
                                        <div class="col-3">
                                            <input type="text" class="form-control" placeholder="變數">
                                        </div>
                                        <div class="col-1 text-center" style="line-height: 2.5rem">=</div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" placeholder="值">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="text" class="form-control" placeholder="變數">
                                        </div>
                                        <div class="col-1 text-center" style="line-height: 2.5rem">=</div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" placeholder="值">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <a class="btn btn-outline-primary me-3" href="/market/apps">取消更新</a>
                        <a class="btn btn-primary" href="/market/apps">更新設定</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
