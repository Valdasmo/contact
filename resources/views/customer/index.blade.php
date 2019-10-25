@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KLIENTO PAVADINIMAS


                    {{-- rusiavimas start --}}
                    <a href="{{route('customer.index', ['sort'=>'a-z'])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M3 12v1.5l11 4.75v-2.1l-2.2-.9v-5l2.2-.9v-2.1L3 12zm7 2.62l-5.02-1.87L10 10.88v3.74zm8-10.37l-3 3h2v12.5h2V7.25h2l-3-3z" />
                            <path fill="none" d="M0 0h24v24H0z" /></svg>
                    </a>
                    <a href="{{route('customer.index', ['sort'=>'z-a'])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M21 12v-1.5L10 5.75v2.1l2.2.9v5l-2.2.9v2.1L21 12zm-7-2.62l5.02 1.87L14 13.12V9.38zM6 19.75l3-3H7V4.25H5v12.5H3l3 3z" />
                            <path fill="none" d="M0 0h24v24H0z" /></svg>
                    </a>
                    {{-- rusiavimas end --}}

                </div>
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