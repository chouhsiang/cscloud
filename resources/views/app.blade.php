@extends('layout')
@section('body')
    <main class="app">
        <div class="container">

            <div class="row">
                <div class="col-md-3 icon">
                    <div class="card link">
                        <div class="card-body">
                            <a class="btn w-100" href="#basic"><i class="fas fa-sliders-h"></i>基本設定</a>
                            <a class="btn w-100" href="#moniter"><i class="fas fa-tachometer-alt"></i>資源監控</a>
                            <a class="btn w-100" href="#event"><i class="fas fa-file-alt"></i>容器事件</a>
                            <a class="btn w-100" href="#console"><i class="fas fa-terminal"></i>Console</a>
                            <a class="btn w-100" href="#env"><i class="fas fa-code"></i>環境變數</a>
                            <a class="btn w-100" href="#database"><i class="fas fa-database"></i>資料庫</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="accordion accordion-flush mb-4" id="basic">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-basic">
                                    基本設定
                                </button>
                            </h2>
                            <div id="show-basic" class="collapse show">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">服務類型</label>
                                    <label class="col-sm-10 col-form-label">Wordpress v2.0.7</label>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">運作狀態</label>
                                    <label class="col-sm-10 col-form-label"><span
                                            class="badge badge-success">運行中</span></label>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">服務名稱</label>
                                    <label class="col-sm-10 col-form-label">Wanda s Website</label>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Image名稱</label>
                                    <label class="col-sm-10 col-form-label">wanda225.nycucs.com.tw</label>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">網域名稱</label>
                                    <label class="col-sm-10 col-form-label">wandasweb</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush mb-4" id="monitor">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-monitor">
                                    資源監控
                                </button>
                            </h2>
                            <div id="show-monitor" class="collapse show">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">CPU使用量</th>
                                            <th scope="col">記憶體使用量</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>25.1 %</th>
                                            <td>1.25 GB (15.2%)</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <span class="update">最後更新時間: 2021/12/20 17:20:33</span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush mb-4" id="event">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-event">
                                    容器事件
                                </button>
                            </h2>
                            <div id="show-event" class="collapse show">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><a class="btn btn-light">類型<i class="ms-3 fas fa-sort"></i></a>
                                            </th>
                                            <th scope="col"><a class="btn btn-light">事件原因<i
                                                        class="ms-3 fas fa-sort"></i></a></th>
                                            <th scope="col"><a class="btn btn-light">事件訊息<i
                                                        class="ms-3 fas fa-sort"></i></a></th>
                                            <th scope="col"><a class="btn btn-light">最後更新<i
                                                        class="ms-3 fas fa-sort"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Normal</th>
                                            <td>Created</td>
                                            <td>Created container rocketchat</td>
                                            <td>25 分鐘之前</td>
                                        </tr>
                                        <tr>
                                            <th>Normal</th>
                                            <td>Created</td>
                                            <td>Created container rocketchat</td>
                                            <td>25 分鐘之前</td>
                                        </tr>
                                        <tr>
                                            <th>Normal</th>
                                            <td>Created</td>
                                            <td>Created container rocketchat</td>
                                            <td>25 分鐘之前</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="accordion accordion-flush mb-4" id="console">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-console">
                                    Console
                                </button>
                            </h2>
                            <div id="show-console" class="collapse show">
                                <img class="w-100" src="/Console.png">
                            </div>
                        </div>
                    </div>


                    <div class="accordion accordion-flush mb-4" id="env">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-env">
                                    環境變數
                                </button>
                            </h2>
                            <div id="show-env" class="collapse show">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><a class="btn btn-light">變數<i class="ms-3 fas fa-sort"></i></a>
                                            </th>
                                            <th scope="col"><a class="btn btn-light">值<i class="ms-3 fas fa-sort"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>LANG</th>
                                            <td>Zh_tw</td>
                                        </tr>
                                        <tr>
                                            <th>USER</th>
                                            <td>Ｗanda_L</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush mb-4" id="database">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#show-database">
                                    資料庫
                                </button>
                            </h2>
                            <div id="show-database" class="collapse show">
                                <label class="col-sm-2 col-form-label">資料庫</label>
                                <label class="col-sm-10 col-form-label">正在使用MySQL</label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </main>
@endsection
