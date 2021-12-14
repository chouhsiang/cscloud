@extends('layout')
@section('body')
    <main class="home">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <h2 class="card-header">總使用量</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="cpu"></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-between flex-column h-100">
                                        <div class="d-flex">
                                            <div class="legend legend-primary"></div>
                                            <div>已使用<br>75.2%</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="legend legend-gray"></div>
                                            <div>未使用<br>75.2%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="mem"></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-between flex-column h-100">
                                        <div class="d-flex">
                                            <div class="legend legend-primary"></div>
                                            <div>已使用<br>75.2%</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="legend legend-gray"></div>
                                            <div>未使用<br>75.2%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card">
                        <h2 class="card-header">服務統計</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-item">
                                        <div class="line line-dark"></div>
                                        <span class="text">已安裝的服務總計</span>
                                        <span class="num">7</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="count-item">
                                        <div class="line line-primary"></div>
                                        <span class="text">運行中</span>
                                        <span class="num">5</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="count-item">
                                        <div class="line line-gray"></div>
                                        <span class="text">已停用</span>
                                        <span class="num">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <h2 class="card-header">個別使用量</h2>
                        <div class="card-body">
                            <div class="filter">
                                <input type="text" class="form-control">
                                <button type="button" class="btn btn-light">全部</button>
                                <button type="button" class="btn btn-link">使用中</button>
                                <button type="button" class="btn btn-link">已停用</button>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">服務名稱</th>
                                        <th scope="col" class="text-center">CPU使用量</th>
                                        <th scope="col" class="text-center">記憶體使用量</th>
                                        <th scope="col" class="text-center">運作狀態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="title">
                                                <div class="logo"></div>Wanda's Website<div
                                                    class="image">Wordpress</div>
                                            </div>
                                        </td>
                                        <td class="text-center">25.1 %</td>
                                        <td class="text-center">1.25 GB</td>
                                        <td class="text-center"><span class="badge badge-success">運行中</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title">
                                                <div class="logo"></div>Online Pet Supermarket<div
                                                    class="image">Wordpress</div>
                                            </div>
                                        </td>
                                        <td class="text-center">11.3 %</td>
                                        <td class="text-center">2.02 GB</td>
                                        <td class="text-center"><span class="badge badge-success">運行中</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title">
                                                <div class="logo"></div>Learning Meterials of Coding<div
                                                    class="image">Custom Image</div>
                                            </div>
                                        </td>
                                        <td class="text-center">4.41 %</td>
                                        <td class="text-center">1.71 GB</td>
                                        <td class="text-center"><span class="badge badge-secondary">已停用</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        var bar = new ProgressBar.SemiCircle("#cpu", {
            strokeWidth: 10,
            trailColor: '#F2F2F2',
            trailWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            svgStyle: null,
            text: {
                value: '',
                alignToBottom: false
            },

            // Set default step function for all animate calls
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
                var value = Math.round(bar.value() * 100);
                if (value === 0) {
                    bar.setText('');
                } else {
                    bar.setText(value + "%<p>CPU</p>");
                }

                bar.text.style.color = state.color;
            }
        });
        bar.text.style.fontSize = '2rem';

        bar.animate(0.45); // Number from 0.0 to 1.0

        var mem = new ProgressBar.SemiCircle("#mem", {
            strokeWidth: 10,
            trailColor: '#F2F2F2',
            trailWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            svgStyle: null,
            text: {
                value: '',
                alignToBottom: false
            },

            // Set default step function for all animate calls
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
                var value = Math.round(bar.value() * 100);
                if (value === 0) {
                    bar.setText('');
                } else {
                    bar.setText(value + "%<p>Memory</p>");
                }

                bar.text.style.color = state.color;
            }
        });
        mem.text.style.fontSize = '2rem';

        mem.animate(0.7); // Number from 0.0 to 1.0
    </script>
@endsection
