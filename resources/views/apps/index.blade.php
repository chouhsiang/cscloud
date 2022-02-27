@extends('layouts.app')

@section('content')
<main class="apps">
    <div class="container">
        <div class="row">
            @foreach ($data as $d)
            <div class="col-lg-6">
                <div class="card pe-auto">
                    <div class="card-body d-flex">
                        <div class="me-4" style="width: 100px">
                            <div class="img-cover rounded-circle" style="background-image: url('{{ $d["icon"] }}')"></div>
                        </div>
                        <div class="flex-fill" onclick="location.href='/apps/{{ $d["name"] }}'" style="cursor: pointer;">
                            <div class="mb-2"><span class="badge badge-success">運行中</span></div>
                            <div class="mb-2">
                                <h2 class="d-inline me-3">{{ $d["name"] }}</h2><span>WordPress</span>
                            </div>
                            <div><a href="https://{{ $d['domain'] }}">{{ $d["domain"] }}</a></div>
                        </div>
                        <div class="align-self-end">
                            <div class="p-2"><a href="/apps/{{ $d["name"] }}/edit" class="text-dark"><i class="fa-solid fa-pencil"></i></a></div>
                            <div class="p-2"><a href="javascript:confirm('確定要刪除嗎')?document.getElementById('delete').submit():void(0)" class="text-dark"><i class="fa-regular fa-trash-can"></i></a></div>
                            <form method="POST" id="delete" action="/apps/{{ $d['name'] }}">
                                @csrf
                                @method('DELETE')
                                <input class="d-none" type="submit">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection