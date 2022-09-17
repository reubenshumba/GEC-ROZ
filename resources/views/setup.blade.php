@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Your almost done') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container text-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class=" "><h4>Setup My account </h4></div>
                                    <div class="">
                                        <form method="POST" action="{{ route('setup') }}" class="shadow-lg p-4" >
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="gec"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('I belong to ') }}</label>

                                                <div class="col-md-8">
                                                    <select id="gec" name="gec" class="form-select" aria-label="gec">
                                                        <option selected value="-1">. . . </option>
                                                        <option value="church">Church Arm</option>
                                                        <option value="campus">Campus Ministry</option>
                                                        <option value="none">Am not an envoys</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row mb-3" id="church" >
                                                <label for="church"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Select Zone') }}</label>

                                                <div  class="col-md-8">
                                                    <select name="zone"  class="form-control form-select @error('name') is-invalid @enderror"
                                                             aria-label="church">
                                                        <option value="-1">. . . </option>
                                                        @foreach($zones as $zone)
                                                            <option @if(old('zone') ==$zone->id )  selected @endif value="{{$zone->id}}">{{$zone->zoneName}}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('zone')
                                                    <span class="invalid-feedback"
                                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="row mb-3" id="campus">
                                                <label for="campus"
                                                       class="col-md-5 col-form-label text-md-end">{{ __('Select Campus Zone?') }}</label>

                                                <div  class="col-md-7">
                                                    <select  class="form-select"  class="form-control form-select @error('zone') is-invalid @enderror" aria-label="campus">
                                                        <option name="zone" selected value="r-1">. . . </option>
                                                        @foreach($campusZones as $zone)
                                                            <option  value="{{$zone->id}}">{{$zone->zoneName}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('zone')
                                                    <span class="invalid-feedback"
                                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Save') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="p-4 ">
                                        <img src="{{ asset('image/logo.jpeg') }}" width="80%" class="shadow-lg"/>
                                    </div>

                                </div>
                            </div>

                        </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


