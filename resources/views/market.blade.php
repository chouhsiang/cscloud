@extends('layout')
@section('body')
    <main class="market">

            <div class="container">
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="img w-100 bg-gray3 rounded-circle"></div>
                                    </div>
                                    <div class="col-6 d-flex flex-column justify-content-around">
                                        <a class="btn btn-outline-primary" href="/market/apps/wordpress">更多內容</a>
                                        <a class="btn btn-outline-primary" href="/apps/create/wordpress">建立服務</a>
                                    </div>
                                </div>

                                <h2>WordPress</h2>
                                <p class="type">網站建置工具</p>
                                <p>以PHP和MySQL為平台的部落格軟體和內容管理系統，常用於網站的建置與管理。</p>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

    </main>
@endsection
