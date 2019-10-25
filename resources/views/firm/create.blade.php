@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">FIRMOS PAVADINIMAS</div>

               <div class="card-body">

<form method="POST" action="{{route('firm.store')}}">
    Name: <input type="text" name="firm_name">
    Address: <input type="text" name="firm_address">
    @csrf
    <button type="submit">ADD</button>
 </form>
 
</div>
</div>
</div>
</div>
</div>
@endsection
