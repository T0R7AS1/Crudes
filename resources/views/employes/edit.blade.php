@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Employee Info</h3></div>
                            <a href="{{ route('employes.index')}}" class="btn btn-primary"> Back</a>
                            <div class="card-body">
                                <form action="/employes/{{$employes->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="mb-1" for="inputProjectname">Employe Name</label>
                                        <input type="text" class="form-control" placeholder="{{$employes->vardas}}" name="vardas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('vardas') Name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class="mb-1" for="inputProjectname">Employe E-Mail</label>
                                        <input type="text" class="form-control" placeholder="{{$employes->e_pastas}}" name="e_pastas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('e_pastas') Email must be valid @enderror
                                    </div>
                                        <label class="mb-1" for="inputProjectname">Employe Phone Number</label>
                                        <div class="form-group input-group-prepend"> 
                                        <span class="input-group-text" id="basic-addon1">3706</span>
                                        <input type="text" class="form-control" placeholder="{{$employes->tel}}" name="tel" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('tel') Phone number must be valid @enderror
                                    </div>
                                    <label class="mb-1" for="inputProjectname">Employe Name</label>
                                        <select name="imone" id="inputProjectname" class="form-control">
                                            <option select disabled>Select</option>
                                            @foreach ($companies as $company)
                                                <option name="imone">{{ $company->pavadinimas }}</option>
                                            @endforeach
                                        </select>
                                    <div class="mb-3 text-danger">
                                        @error('imone') Workplace must be valid @enderror
                                    </div>

                                    <input type="submit" class="btn btn-success btn-block mt-4 mb-2" name="add" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </main>
    </div>
</div>
@endsection