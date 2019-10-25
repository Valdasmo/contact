@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KLIENTO DUOMENYS</div>

                <div class="card-body">

                    <form method="POST" action="{{route('customer.update',[$customer])}}">
                        Name: <input type="text" name="customer_name" value="{{old('customer_name', $customer->name)}}">
                        Surname: <input type="text" name="customer_surname"
                            value="{{old('customer_surname', $customer->surname)}}">
                        Phone: <input type="text" name="customer_phone"
                            value="{{old('customer_phone', $customer->phone)}}">
                        Email: <input type="text" name="customer_email"
                            value="{{old('customer_email', $customer->email)}}">
                        About: <textarea name="customer_about"
                            id="summernote">{{old('customer_about', $customer->about)}}</textarea>
                        <select name="firm_id">
                            @foreach ($firms as $firm)
                            <option value="{{$firm->id}}" @if($firm->id == $customer->firm_id) selected @endif>
                                {{$firm->name}} {{$firm->address}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">EDIT</button>
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