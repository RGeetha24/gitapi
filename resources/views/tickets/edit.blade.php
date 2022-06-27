@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="row my-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mb-3">
            <div class="card-header">Edit Issue</div>
                <div class="card-body">
                    <div class="formsec">
                        <form action="{{route('updateissue',$data['number'])}}" class="form-horizontal" method="POST" role="form">
                            @csrf
                            {{method_field('POST')}}
                            <div class="row align-items-center mb-4">
                                <div class="col-md-3 mb-2">
                                    <span class="f-md f-semi secondaryclr">Title</span>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center w-100">
                                        <input type="text" class="form-control" value="{{$data['title']}}" name="title" required/>
                                    </div> 
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> 
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-3 mb-2">
                                    <span class="f-md f-semi secondaryclr ">Description</span>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center w-100">
                                        <input type="text" class="form-control" value="{{$data['body']}}" name="description" required/>
                                    </div>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class=" d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary m-2">
                                   Update
                                </button> 
                                <a class="btn btn-secondary" href="{{route('issues')}}">
                                   Back 
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>   
</div>
@endsection
