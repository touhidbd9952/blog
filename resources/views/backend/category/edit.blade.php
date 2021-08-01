@extends('layouts.admin_master')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Category</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">category view</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Category Edit Form

                                    <a href="{{route('category.view')}}"  style="float: right;">View</a>
                                </h5>

                                @if(session('success'))
                               
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" style="float:right;">&times;</button>
                                </div>
                                @endif
                                
                                <form action="{{route('category.update',['id'=>$categories->id])}}"  method="POST" class="form-horizontal">

                                    @csrf

                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="name" value="{{$categories->name}}" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name Here">
                                            @error('name')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                    
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        
                    </div>
                    
                    
                </div>
                



@endsection