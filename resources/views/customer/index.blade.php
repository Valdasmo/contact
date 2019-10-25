@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KLIENTO PAVADINIMAS</div>

                {{-- Filtravimas start --}}

                <form method="GET" action="{{route('customer.index')}}">
                    <select class="form-control" name="filter">
                        @foreach ($firms as $firm)
                        <option value="{{$firm->id}}" @if($firm->id==$filter) selected @endif>{{$firm->name}}
                            {{$firm->address}}</option>
                        @endforeach
                    </select>

                    <br>
                    <button type="submit">Rodyti šios firmos klientus</button>
                </form>
                {{-- Filtravimas end --}}


                <div class="card-body">

                    @foreach ($customers as $customer)
                    <a href="{{route('customer.edit',[$customer])}}">{{$customer->name}} {{$customer->surname}}
                        {{$customer->customerFirm->name}} {{$customer->customerFirm->address}}</a>
                    <form method="POST" action="{{route('customer.destroy', [$customer])}}">
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