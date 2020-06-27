@extends('admin.layout.layout')
@section('title', 'Brands')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h6 class="text-uppercase mb-0">Brands List</h6>
            </div>
            <div class="card-body">
              <table class="table card-text text-center">
                <thead>
                  <tr>
                    <th>Brand ID</th>
                    <th>Brand Image</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($brand as $brand)
                  <tr>
                    <th scope="row" class="align-middle">{{$brand->id}}</th>
                    <td class="align-middle"><img src="{{asset($brand->brand_image)}}" alt="" width="100px" height="auto"></td>
                    <td class="align-middle">{{$brand->brand_name}}</td>
                    <td class="align-middle">
                      <a href="#Modal-Brand-Description{{$brand->id}}" class="badge badge-info p-2" data-toggle="modal"><i class="fas fa-eye" style="font-size: 16px; font-weight:100;"></i></a>
                    </td>
                    <td class="align-middle">
                      <a href="#Modal-Brand-Update{{$brand->id}}" class="badge badge-warning p-2" data-toggle="modal"><i class="fas fa-edit" style="font-size: 16px; font-weight:100;"></i></a>
                      <a href="#Modal-Brand-Delete{{$brand->id}}" class="badge badge-danger p-2" data-toggle="modal"><i class="fas fa-trash-alt" style="font-size: 16px; font-weight:100;"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Content Brand -->
                  <div id="Modal-Brand-Description{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 id="exampleModalLabel" class="modal-title">{{$brand->brand_name}} Information</h4>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <textarea name="" id="" class="form-control" readonly rows="10">{{$brand->description}}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Update Brand -->
                  <div id="Modal-Brand-Update{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade bd-example-modal-lg text-left">
                    <div role="document" class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 id="exampleModalLabel" class="modal-title">Update Brand: {{$brand->brand_name}}</h4>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <form action="" method="POST" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label text-uppercase">Brand Name</label>
                                    <input type="text" class="form-control" placeholder="{{$brand->brand_name}}" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label text-uppercase">Upload Brand Image</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                      </div>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-control-label text-uppercase">Description</label>
                                    <textarea name="" id="" class="form-control" placeholder="{{$brand->description}}" rows="10"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer d-flex justify-content-center">
                                <div class="form-group ">
                                  <button type="submit" class="btn btn-warning">Update</button>
                                  <button type="reset" class="btn btn-info">Reset</button>
                                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Delete brand -->
                  <div id="Modal-Brand-Delete{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade bd-example-modal-lg text-left">
                    <div role="document" class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 id="exampleModalLabel" class="modal-title">Delete Customer: {{$brand->brand_name}}</h4>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body text-center">
                          <h2>Are you sure you want to delete?</h2>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Yes</button>
                          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection