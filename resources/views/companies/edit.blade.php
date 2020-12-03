@extends('layouts.admin')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Company Info</h3></div>
                            <a href="{{ route('companies.index')}}" class="btn btn-primary"> Back</a>
                            <div class="card-body">
                                <form action="/companies/{{$company->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="  mb-1" for="inputProjectname">Company Name</label>
                                        <input type="text" class="form-control" placeholder="{{$company->pavadinimas}}" name="pavadinimas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('pavadinimas') Name must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">E-Mail</label>
                                        <input type="text" class="form-control" placeholder="{{$company->epastas}}" name="epastas" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('epastas') Email must be valid @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class=" mb-1" for="inputProjectname">Company Website</label>
                                        <input type="text" class="form-control" placeholder="{{$company->svetaine}}" name="svetaine" autocomplete="off">
                                    </div>
                                    <div class="mb-3 text-danger">
                                        @error('svetaine') Website must be valid @enderror
                                    </div>
                                    <label class=" mb-1" for="inputProjectname">Logo Of The Company</label>
                                    <div class="form-group">
                                        <input type="file" name="image" class="mb-4">
                                        <img src="{{ URL::to('/') }}/storage/{{ $company->image}}" width="100" alt="">
                                        <input type="hidden" name="hidden_image" value="{{$company->image}}">
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