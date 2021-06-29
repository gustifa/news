@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card-body">
                    <h4 class="card-title">Category Page</h4>
                    <div class="template-demo">
                      <a href="{{route('add.category')}}"><button type="button" class="btn btn-success btn-fw" style="float: right;"> + Add Category</button></a>
                      

                    </div>
                 
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Category English </th>
                            <th> Category Indonesia </th>
                            <th> Action </th>
                      
                          </tr>
                        </thead>
                        <tbody>
                            @php($key = 1)
                          @foreach($category as $row)
                          <tr>
                            <td width="5%"> {{$key++}} </td>
                            <td> {{$row->category_eng}} </td>
                            <td>
                              {{$row->category_hin}}
                            </td>
                            <td width="20%">
                              <a href="{{route('edit.category', $row->id)}}" class="btn btn-warning btn-fw"> Edit</a>
                              <a id="delete" href="{{route('delete.category', $row->id)}}" class="btn btn-danger btn-fw"> Delete</a>
                            </td>
                            
                          </tr>

                          @endforeach

                        </tbody>
                      </table>
                      <br>
                      
                        <div class="position-absolute top-100 start-100 translate-middle">
                        {{$category->links('pagination-links')}}

                        </div>
                    

                      </div>
                      
                  </div>
            </div>

@endsection