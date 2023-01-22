@extends('layaouts.master')

@section('content')
<div class="grid grid-cols-3 mt-10">
    <div class="col-start-2 col-span-1 flex justify-center">
        Pagando...
    </div>
</div>
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