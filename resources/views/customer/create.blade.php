@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KLIENTO DUOMENYS</div>

                <div class="card-body">

                    <form method="POST" action="{{route('customer.store')}}">
                        Name: <input type="text" name="customer_name" value="{{old('customer_name')}}">
                        Surname: <input type="text" name="customer_surname" value="{{old('customer_surname')}}">
                        Phone: <input type="text" name="customer_phone" value="{{old('customer_phone')}}">
                        Email: <input type="text" name="customer_email" value="{{old('customer_email')}}">
                        About: <textarea name="customer_about" id="summernote">{{old('customer_about')}}</textarea>
                        <select name="firm_id">
                            @foreach ($firms as $firm)
                            <option value="{{$firm->id}}">{{$firm->name}} {{$firm->address}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
           $('#summernote').summernote();
         });
</script>

@endsection