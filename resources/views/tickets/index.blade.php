@extends('layouts.app')

@section('content')
<div class="container">
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<!--Add Issue Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Issue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="formsec">
          <form action="{{route('createissue')}}" class="form-horizontal" method="POST" role="form">
            @csrf
            {{method_field('POST')}}
              <div class="row align-items-center mb-4">
                  <div class="col-md-3 mb-2">
                      <span class="f-md f-semi secondaryclr">Title</span>
                  </div>
                  <div class="col-md-9">
                      <div class="d-flex align-items-center w-100">
                          <input type="text" class="form-control" placeholder="Title" name="title" required/>
                      </div>
                  </div>  
              </div>
              <div class="row align-items-center mb-4">
                  <div class="col-md-3 mb-2">
                      <span class="f-md f-semi secondaryclr ">Description</span>
                  </div>
                  <div class="col-md-9">
                      <div class="d-flex align-items-center w-100">
                          <input type="text" class="form-control" placeholder="Description" name="description" required/>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
              <div class=" d-flex justify-content-end align-items-center">
                  <button type="submit" class="btn btn-primary m-2">
                     Add
                  </button> 
                  <a class="btn btn-secondary" href="{{route('issues')}}">
                     Cancel 
                  </a>
              </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Add
                    </button>
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
                      <td>{{Str::limit($data['body'],100)}}</td>
                      <td>
                        <a class="btn btn-success" href="{{route('editissue',$data['number'])}}">
                          Edit
                        </a>
                        {{-- <a class="btn btn-danger" href="">
                          Delete
                        </a> --}}
                        @if($data['locked'] == 1)
                        <a class="btn btn-warning" href="{{route('unlockissue',$data['number'])}}">
                          Unlock
                        </a>
                        @else
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#lockModal-{{$data['number']}}">
                          Lock
                        </button>
                        
                        <!--Lock Isssue Modal -->
                        <div class="modal fade" id="lockModal-{{$data['number']}}" tabindex="-1" aria-labelledby="lockModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="{{route('lockissue',$data['number'])}}" class="form-horizontal" method="POST" role="form" id="locklink">
                                  @csrf
                                  {{method_field('POST')}}
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lock conversation on this issue</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              
                              <div class="modal-body">
                                <select class="form-select" aria-label="Default select example" name="lock_reason" required>
                                  <option value="" selected>Choose a reason</option>
                                  @foreach ($lock_reasons as $reason)
                                  <option value="{{$reason}}">{{$reason}}</option>
                                  @endforeach
                                  
                                </select>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        @endif
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

@section('scripts')
    <script>
      $(document).ready(function () {
          $("#lockModal").on("show.bs.modal", function (e) {
              var id = $(e.relatedTarget).data('target-id');
              var strLink = 'lockissue/' + id;
              document.getElementById("locklink").setAttribute("action",strLink);
          });
      });
    </script>
@endsection
