@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="p-4 ">
                                    <img src="{{ asset('image/logo.jpeg') }}" width="100%" class="shadow-lg"/>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class=" "><h4>Register </h4></div>
                                <div class="">
                                    <form method="POST" action="{{ route('register') }}" class="shadow-lg p-4" >
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                                            <div class="col-md-8">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{ old('name') }}" required
                                                       autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback"
                                                      role="alert"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required
                                                       autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="number"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                            <div class="col-md-8">
                                                <input id="number" type="number"
                                                       class="form-control @error('number') is-invalid @enderror"
                                                       name="number" required autocomplete="Phone Number">

                                                @error('number')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="address"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Residential Address') }}</label>

                                            <div class="col-md-8">
                                                <input id="address" type="text" class="form-control"
                                                       name="address" required
                                                       autocomplete="Residential Address">
                                            </div>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <label for="occupation"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                            <div class="col-md-8">
                                                <input id="occupation" type="text" class="form-control"
                                                       name="occupation" required
                                                       autocomplete="Occupation">
                                            </div>
                                            @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Marital Status"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Marital Status') }}</label>

                                            <div class="col-md-8">
                                                <select class="form-select" aria-label="Marital Status">
                                                    <option selected value="rather keep it private">Select Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widow">Widow</option>
                                                    <option value="Divorced">Divorced</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="saved"
                                                   class="col-md-4 col-form-label text-md-end">{{ __('Are you born again') }}</label>

                                            <div class="col-md-8">
                                                <select class="form-select" aria-label="saved">
                                                    <option selected value="-1">. . . </option>
                                                    <option  value="Yes">Yes</option>
                                                    <option value="NO">Not Yet</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="church"
                                                   class="col-md-5 col-form-label text-md-end">{{ __('Member of a Church or not?') }}</label>

                                            <div class="col-md-7">
                                                <select class="form-select" aria-label="church">
                                                    <option selected value="r-1">. . . </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Marital Status "
                                                   class="col-md-5 col-form-label text-md-end">{{ __('Would they like to be contacted?') }}</label>

                                            <div class="col-md-7">
                                                <select class="form-select" aria-label="Marital Status">
                                                    <option selected value="-1">. . . </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
