@extends('layouts.app')

@section('content')
<div class="container">
<div class="row my-3">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="px-3 pt-3 border-none">
          <div class="row align-items-center ">
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
              <h3>Repository Issues</h3>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
              <div class=" d-flex align-items-center justify-content-start justify-content-lg-end my-2">
                <div class="d-flex align-items-center ">
                  <div class="dropdown">
                    <a class="btn btn-primary ml-2" href="">
                      Add
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <div class="table-responsive p-3  ">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (count($datas) > 0)
                  @foreach ($datas as $index => $data)
                    <tr>
                      <td>{{$index+1}}</td>
                      <td>{{$data['title']}}</td>
                      <td>{{$data['body']}}</td>
                      <td>
                        <a class="btn btn-success" href="{{route('editissue',$data['number'])}}">
                          Edit
                        </a>
                        <a class="btn btn-danger" href="">
                          Delete
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @else
                    <tr>
                      <td>No Record Found</td>
                    </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection