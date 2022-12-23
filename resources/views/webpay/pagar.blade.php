@extends('layaouts.master')

@section('content')
pagando...
<form name="pagar" method="POST" action="{{$datos->url}}">
    @csrf
    <input type="hidden" name="token_ws" value="{{$datos->token}}">
</form>

@section('js')
<script>
    window.onload = function() {
        document.pagar.submit();
    };
</script>
@endsection
@endsection