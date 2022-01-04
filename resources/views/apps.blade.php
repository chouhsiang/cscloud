@extends('layout')
@section('body')
    <style>
        .card:hover{
            transform:  scale(1.03);
        }
        </style>
    <main class="apps">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 8; $i++)
                <div class="col-lg-6">
                    <div class="card pe-auto" onclick="location.href='/apps/1'" style="cursor: pointer;" >
                        <div class="card-body d-flex">
                            <div class="me-4" style="width: 100px">
                                <div class="img w-100 bg-gray3 rounded-circle"></div>
                            </div>
                            <div class="flex-fill">
                                <div class="mb-2"><span class="badge badge-success">運行中</span></div>
                                <div class="mb-2"><h2 class="d-inline me-3">Wanda s Website</h2><span>WordPress</span></div>
                                <div><a href="https://passdesignproject2021.nycucs.com.tw">https://passdesignproject2021.nycucs.com.tw</a></div>
                            </div>
                            <div class="align-self-end"  >
                                <div class="mb-2"><i class="fa-solid fa-pencil" ></i></div>
                                <div><i class="fa-regular fa-trash-can"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

        </div>
    </main>
@endsection
