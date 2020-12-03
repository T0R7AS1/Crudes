@extends('layouts.admin')

@section('content')
    <div class="container mt-5 jumbotron text-center">
        <div id="invoice">
        <p class="h5" ><b>Company Name:</b> {{$company->pavadinimas}}</p>
        <p class="h5" ><b>Company E-Mail:</b> {{$company->epastas}}</p>
        <p class="h5" ><b>Company Website:</b> <a href="{{$company->svetaine}}">{{$company->svetaine}}</a></p>
        <p class="h5" ><b>Logo of the company:</b> <center><img src="{{ URL::to('/') }}/storage/{{ $company->image }}" width="10%" alt=""></center></p>
        <hr>
        </div>
    <a href="/companies/{{$company->id}}/edit" class="btn btn-warning mt-3">Edit</a>
    <form action="{{action('App\Http\Controllers\CompaniesController@destroy', $company['id'])}}" method="POST" class="d-inline ">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn-danger btn mt-3">Delete</button>
    <a href="{{ route('companies.index')}}" class="btn btn-primary mt-3"> Back</a>
    </form>
    </div>
@endsection