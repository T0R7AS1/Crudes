@extends('layouts.admin')

@section('content')
    <div class="container mt-5 jumbotron text-center">
        <div id="invoice">
        <p class="h5" ><b>Employee name:</b> {{$employes->vardas}}</p>
        <p class="h5" ><b>Employee e-Mail:</b> {{$employes->e_pastas}}</p>
        <p class="h5" ><b>Employee phone number:</b> {{$employes->tel}}</p>
        <p class="h5" ><b>Employee workplace</b> {{ $employes->imone }}</p>
        <hr>
        </div>
    <a href="/employes/{{$employes->id}}/edit" class="btn btn-warning mt-3">Edit</a>
    <form action="{{action('App\Http\Controllers\EmployesController@destroy', $employes['id'])}}" method="POST" class="d-inline ">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn-danger btn mt-3">Delete</button>
    <a href="{{ route('employes.index')}}" class="btn btn-primary mt-3"> Back</a>
    </form>
    </div>
@endsection