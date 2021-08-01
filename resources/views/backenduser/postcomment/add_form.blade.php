@extends('layouts.user_master')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Comment On Post</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">comment view</li>
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
                                    Comment Entry Form

                                    <a href="{{route('comment.view')}}"  style="float: right;">View</a>
                                </h5>
                                @if(session('success'))
                               
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" style="float:right;">&times;</button>
                                </div>
                                @endif
                                
                                <form action="{{route('comment.store')}}"  method="POST" class="form-horizontal">

                                    @csrf

                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Post Category</label>
                                        <div class="col-sm-9">
                                            <select id="catid" name="catid" class="form-control @error('catid') is-invalid @enderror">
                                                <option></option>
                                                <?php 
                                                $categories = App\Models\Category::all();
                                                ?>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
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
                                            <select id="post_id" name="post_id" class="form-control @error('post_id') is-invalid @enderror" disabled>
                                                <option></option>
                                                <?php 
                                                $posts = App\Models\Post::orderBy('cat_id','asc')->get();
                                                ?>
                                                @foreach($posts as $p)
                                                <option value="{{$p->id}}" class='parent-{{ $p->cat_id }} post'>{{ $p->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('post_id')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Comment On Post</label>
                                        <div class="col-sm-9">
                                            <textarea id="basic-example"  name="comment"  class="form-control @error('comment') is-invalid @enderror">...</textarea>
                                            @error('comment')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Comment Publish</label>
                                        <div class="col-sm-9">
                                            <select name="commentstatus" class="form-control @error('commentstatus') is-invalid @enderror">
                                                <option value="unpublish">Un-publish</option>
                                                <option value="publish">Publish</option>
                                            </select>
                                            @error('commentstatus')
                                                <span class="text-danger"> {{$message}}  </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $("#post_id").val("");
    $('#catid').on('change', function () {
    $("#post_id").attr('disabled', false); //enable subcategory select
    $("#post_id").val("");
    $(".post").attr('disabled', true); //disable all category option
    $(".post").hide(); //hide all subcategory option
    $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
    $(".parent-" + $(this).val()).show(); 
});
</script>      

@endsection