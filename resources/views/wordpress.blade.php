@extends('layout')
@section('body')
    <main class="wordpress">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="d-flex">
                                <div class="me-5">
                                    <div class="img bg-gray3 rounded-circle"></div>
                                </div>
                                <div>
                                    <h1>WordPress</h1>
                                    <p class="type">網站建置工具</p>
                                    <p>版本：Ver 1.0<br>更新時間：2021/12/31</p>
                                </div>

                            </div>

                            <hr>
                            <div class="content">
                                <h2>應用程式介紹</h2>
                                <p>WordPress是一個以PHP和MySQL為平台的部落格軟體和內容管理系統，常用於網站的建置與管理，也可以作為應用程式的開放原始碼軟體。另外，使用WordPress並不需要再額外學習html或其他程式語言，只需透過基本功能設定即可建置屬於自己的部落格或網站。
                                </p>
                                <h2>應用程式介紹</h2>
                                <p>WordPress是一個以PHP和MySQL為平台的部落格軟體和內容管理系統，常用於網站的建置與管理，也可以作為應用程式的開放原始碼軟體。另外，使用WordPress並不需要再額外學習html或其他程式語言，只需透過基本功能設定即可建置屬於自己的部落格或網站。
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="ms-4 me-4">
                                <div style="margin-bottom:8rem">
                            <a class="btn btn-primary w-100 mb-3" href="/apps/create/wordpress">建立此服務</a>
                            <a class="btn btn-outline-primary w-100" href="/market/apps">返回應用程式商城</a>
                        </div>
                            <h2 style="margin-bottom: 0.5rem">參考資料</h2>
                            <a class="text-dark" href="#">123</a><br>
                            <a class="text-dark" href="#">123</a><br>
                            <a class="text-dark" href="#">123</a>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
