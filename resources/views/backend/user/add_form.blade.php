@extends('layouts.admin_master')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">user view</li>
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
                                    User Entry Form

                                    <a href="{{route('user.view')}}"  style="float: right;">View</a>
                                </h5>
                                @if(session('success'))
                               
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" style="float:right;">&times;</button>
                                </div>
                                @endif
                                
                                <form action="{{route('user.store')}}"  method="POST" class="form-horizontal">

                                    @csrf

                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-sm-3 text-end control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="name" value="{{ old('name') }}"  class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name Here">
                                            @error('name')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-sm-3 text-end control-label col-form-label">E-Mail</label>
                                        <div class="col-sm-9">
                                            <input id="email" type="email"  name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="email address">
                                            @error('email')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Password"
                                            class="col-sm-3 text-end control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input id="password" type="password"  name="password" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="new-password">
                                            @error('password')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-sm-3 text-end control-label col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input id="password-confirm" type="password"  name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="confirm-password">
                                            @error('password_confirmation')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-sm-3 text-end control-label col-form-label">User Type</label>
                                        <div class="col-sm-9">
                                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                                <option value="2">General User</option>
                                                <option value="1">Admin</option>
                                                
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Register</button>
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