@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Transport</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url('/transports')}}">Transport</a></li>
                <li class="breadcrumb-item"><a href="javasc ript:;">Add Transport</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Add Transport</h5>
            </div>
            <div class="card-body">

              <form method="post" action="{{url('/transports/')}}">
              @csrf
                <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                      <label for="">Transport Name *</label>
                      <input type="text" placeholder="Enter Transport Name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                      <label for="">Transport ID</label>
                      <input type="text" class="form-control" id="" aria-describedby=""
                        placeholder="Enter Transport ID" name="transport_id" value="{{ old('transport_id') }}">
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                      <label for="">Vehicle No</label>
                      <input type="text" class="form-control @error('vehicle_no') is-invalid @enderror"
                        placeholder="Enter Vehicle No" name="vehicle_no" value="{{ old('vehicle_no') }}">
                        @error('vehicle_no')
                          <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <a type="button" href="{{url('/transports')}}" class="btn mr-3">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

