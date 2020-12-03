@extends('layouts.admin')


@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            All Registered Companies
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>E-Mail</th>
                            <th>Logo</th>
                            <th width="300">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($company as $companies)
                        <tr>
                            <td>{{ $companies->pavadinimas }}</td>
                            <td>{{ $companies->epastas }}</td>
                            <td width="10%"><img src="{{ URL::to('/') }}/storage/{{ $companies->image }}" width="75" alt=""></td>
                            <td>
                                <a href="/companies/{{$companies->id}}" class="btn btn-info">More</a>
                                <a href="/companies/{{$companies->id}}/edit" class="btn btn-warning d-inline ">Edit</a>
                                <form action="{{action('App\Http\Controllers\CompaniesController@destroy', $companies['id'])}}" method="POST" class="d-inline">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-danger btn btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $company->links() }}
            </div>
        </div>
    </div>
@endsection