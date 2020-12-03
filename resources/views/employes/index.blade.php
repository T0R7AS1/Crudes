@extends('layouts.admin')


@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            All Registered Employes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone Number</th>
                            <th>Workplace</th>
                            <th width="300">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($employes as $employe)
                        <tr>
                            <td>{{ $employe->vardas }}</td>
                            <td>{{ $employe->e_pastas }}</td>
                            <td>{{ $employe->tel }}</td>
                            <td>{{ $employe->imone }}</td>
                            <td>
                                <a href="/employes/{{$employe->id}}" class="btn btn-info">More</a>
                                <a href="/employes/{{$employe->id}}/edit" class="btn btn-warning d-inline ">Edit</a>
                                <form action="{{action('App\Http\Controllers\EmployesController@destroy', $employe['id'])}}" method="POST" class="d-inline">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-danger btn btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $employes->links() }}
            </div>
        </div>
    </div>
@endsection