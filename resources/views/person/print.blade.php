@extends('layouts.main')

@section('first-content')
<div class="card my-2">
    <div class="card-header">
        Data Person
    </div>

    <div class="card-body">
        <p>Nama anda {{$person->name}}</p>
        <p>Email anda {{$person->email}}</p>
    </div>
</div>
@endsection