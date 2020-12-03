@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Employee</h3></div>
                            <a href="{{ route('employes.index')}}" class="btn btn-primary"> Back</a>
                            <div class="card-body">
                                <form action="/employes" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class=" mb-1" for="inputProjectname">Employee Name</label>
                                        <input type="text" class="form-control" placeholder="Enter employe name" name="vardas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('vardas') Name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">Employee E-Mail</label>
                                        <input class="form-control" placeholder="Enter employee E-mail" name="e_pastas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('e-pastas') Email must be valid @enderror
                                    </div>
                                    <label class=" mb-1" for="inputProjectname">Employee phone number</label>
                                    <div class="form-group input-group-prepend"> 
                                        <span class="input-group-text" id="basic-addon1">3706</span>
                                        <input type="text" class="form-control" placeholder="Enter employe phone number" name="tel" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('tel') You dont need to write 3706 @enderror
                                    </div>
                                    <label class="mb-1">Employee workplace</label>
                                    <select name="imone" id="inputProjectname" class="form-control">
                                        <option select disabled>Select</option>
                                        @foreach ($companies as $company)
                                            <option name="imone">{{ $company->pavadinimas }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mb-3 text-danger">
                                        @error('imone') Workplace must be valid @enderror
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block mt-4 mb-2" name="add" value="Add">
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