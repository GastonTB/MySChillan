@extends('layaouts.master')

@section('content')

@for ($i = 0; $i < count($productos); $i++)
   
   {{$productos[$i]}} 
@endfor

@endsection