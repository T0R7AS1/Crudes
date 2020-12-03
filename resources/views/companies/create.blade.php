@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Form</h3></div>
                            <a href="{{ route('companies.index')}}" class="btn btn-primary">Back</a>
                            <div class="card-body">
                                <form action="/companies" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="  mb-1" for="inputProjectname">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Enter the company name" name="pavadinimas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('pavadinimas') Name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">E-Mail</label>
                                        <input class="form-control" placeholder="Enter company E-mail" name="epastas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('epastas') Email must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">Company Website</label>
                                        <input type="text" class="form-control" placeholder="Enter company website" name="svetaine" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('svetaine') Website must be valid @enderror
                                    </div>
                                    <label class=" mb-1" for="inputProjectname">Logo Of The Company</label>
                                    <div class="form-group"> 
                                        <input type="file" name="image">
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