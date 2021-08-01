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
                                    Post List

                                    <a href="{{route('post.add_form')}}" class="btn btn-sm btn-success" style="float: right;">Add Niew</a>
                                </h5>

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" style="float:right;">&times;</button>
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Post Title</th>
                                                <th>Post Cagegory</th>
                                                <th>Post Comment</th>
                                                <th>Comment Status</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{ $comments->firstitem()+$loop->index }}</td>
                                                <td>{{ $comment->post->title }}</td>
                                                <td>{{ $comment->post->category->name }}</td>
                                                <td><div style="max-width: 150px;max-height: 40px; overflow: hidden;">{{strip_tags($comment->comment) }}</div></td>
                                                <td>{{ $comment->commentstatus }}</td>
                                                <td>{{ $comment->created_at }}</td>
                                                <td>
                                                    <a href="{{route('comment.edit',['id'=>$comment->id])}}" class="btn btn-success">Edit</a>
                                                    <a href="{{route('comment.delete',['id'=>$comment->id])}}" class="btn btn-danger" onclick="return confirm('Are you shure want to delete')">Delete</a>

                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                        
                                    </table>

                                    {{ $comments->links() }}

                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                



@endsection