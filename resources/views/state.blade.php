@extends('layout.base')
@section('content')
    <div class="container">
        <form action="{{ route('savestate') }}" class="form-group" method="post">
            @csrf
            @if(session('success'))
        <div class="error row">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
            
        @endif
        <div class="row">
            <div class="col-md-6">
                <lable>Country</lable>
                <select class="form-select" name="country" id="country" aria-label="Default select example">
                <option selected value="">Select Country</option>
                @foreach($country as $item)
                <option value="{{ $item->id }}">{{$item->country_name}}</option>
                @endforeach
                </select>
                    @if($errors->has('country'))
                        <div class="error text-danger">{{ $errors->first('country') }}</div>
                    @endif
            </div>
        
        </div>

        <div class="row">
        
            <div class="col-md-6">
                <label>State</label>
                <input type="text" class="form-control" name="state_name" id="state_name">
            </div>
            @if($errors->has('state_name'))
                <div class="error text-danger">{{ $errors->first('state_name') }}</div>
            @endif
        </div>
        <br>
        <div class="row">
        <div class="col-md-6">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
        </form>
    </div>
@endsection