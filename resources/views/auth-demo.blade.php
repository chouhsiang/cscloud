@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <h2 class="title text-center">OIDC Claims</h2>
    @foreach ($claims as $key => $val)
        <pre>
            {{ $key }} =&gt; {{ json_encode($val,  JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) }}
        </pre>
    @endforeach
    <pre>
       {{$test}}
    </pre>
    <a href="/logout">Logout</a>
</div>
@endsection

@section('script')
@endsection
