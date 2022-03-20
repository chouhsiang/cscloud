@extends('layouts.app')

@section('content')
登出中...
<form id="logoutForm" class="d-none" method="POST"
    action="{{ config('oidc-auth.provider.idTokenIssuer').'/logout?next='.route('home')}}">
    <button type="submit"></button>
</form>
@endsection

@section('script')
<script>
    document.getElementById("logoutForm").submit()
</script>
@endsection

