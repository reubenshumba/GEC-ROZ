@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-3 col-md-3 col-sm-12 p-4">
                <div class="card " style="width: 18rem;">
{{--                    <img src="{{ asset('image/logo.jpeg') }}" class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">Total Registration</h5>
                        <p class="card-text"> {{count($records)}}</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 p-4">
                <div class="card" style="width: 18rem;">
{{--                    <img src="{{ asset('image/logo.jpeg') }}" class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">Born Again</h5>
                        <p class="card-text"> {{count($records)}}</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 p-4">
                <div class="card" style="width: 18rem;">
{{--                    <img src="{{ asset('image/logo.jpeg') }}" class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">Not Going to church</h5>
                        <p class="card-text"> {{count($records)}}</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 p-4">
                <div class="card" style="width: 18rem;">
{{--                    <img src="{{ asset('image/logo.jpeg') }}" class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">Retention</h5>
                        <p class="card-text"> {{count($records)}}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container text-center">

                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="text-success text-muted  text-start"><span
                                        class="h1 "> {{$zone->zoneName }} </span></div>
                                <div class="table-responsive">

                                    <table class="table table-hover table-sm align-middle">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Occupation</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Saved</th>
                                            <th scope="col">Have a Church</th>
                                            <th scope="col">Call me</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records as $record)
                                        <tr>
                                            <th scope="row">{{$record->index}}</th>
                                            <td>{{$record->name}}</td>
                                            <td>{{$record->email}}</td>
                                            <td>{{$record->number}}</td>
                                            <td>{{$record->address}}</td>
                                            <td>{{$record->occupation}}</td>
                                            <td>{{$record->maritalStatus}}</td>
                                            <td>{{$record->saved}}</td>
                                            <td>{{$record->church}}</td>
                                            <td>{{$record->callMe}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
