@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">FIRMOS PAVADINIMAS</div>

               <div class="card-body">

<form method="POST" action="{{route('firm.update',[$firm])}}">
    Name: <input type="text" name="firm_name" value="{{$firm->name}}">
    Address: <input type="text" name="firm_address" value="{{$firm->address}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>
 
</div>
</div>
</div>
</div>
</div>
@endsection
