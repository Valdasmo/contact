@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">FIRMOS PAVADINIMAS</div>

               <div class="card-body">

@foreach ($firms as $firm)
<a href="{{route('firm.edit',[$firm])}}">{{$firm->name}} {{$firm->address}}</a>
<form method="POST" action="{{route('firm.destroy', [$firm])}}">
    @csrf
    <button type="submit">DELETE</button>
   </form>
   <br>
 
@endforeach

</div>
</div>
</div>
</div>
</div>
@endsection
