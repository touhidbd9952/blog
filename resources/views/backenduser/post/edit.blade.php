@extends('layouts.user_master')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Post</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">post view</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Post Edit Form

                                    <a href="{{route('post.view')}}"  style="float: right;">View</a>
                                </h5>
                                @if(session('success'))
                               
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" style="float:right;">&times;</button>
                                </div>
                                @endif
                                
                                <form action="{{route('post.update',['id'=>$post->id])}}"  method="POST" class="form-horizontal">

                                    @csrf

                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Post Category</label>
                                        <div class="col-sm-9">
                                            <select name="catid" class="form-control @error('catid') is-invalid @enderror">
                                                <option></option>
                                                <?php 
                                                $categories = App\Models\Category::all();
                                                ?>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" {{$post->cat_id == $cat->id ? 'selected':''}}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('catid')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Post Title</label>
                                        <div class="col-sm-9">
                                            <input type="text"  name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Blog Title Here">
                                            @error('title')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Post Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="basic-example"  name="description" class="form-control @error('description') is-invalid @enderror">{{$post->description}}</textarea>
                                            @error('description')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Post Publish</label>
                                        <div class="col-sm-9">
                                            <select name="poststatus" class="form-control @error('poststatus') is-invalid @enderror">
                                                <option value="unpublish" {{$post->poststatus == 'unpublish'? 'selected':''}}>Un-publish</option>
                                                <option value="publish" {{$post->poststatus == 'publish'? 'selected':''}}>Publish</option>
                                            </select>
                                            @error('poststatus')
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
                
                <link rel="stylesheet" type="text/css" id="mce-u0" referrerpolicy="origin" href="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5.8.2-114/skins/ui/oxide/skin.min.css">
                <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>
                <script>
                    tinymce.init({
                        selector: 'textarea#basic-example',
                        height: 500,
                        menubar: false,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        });
            
                </script>

@endsection