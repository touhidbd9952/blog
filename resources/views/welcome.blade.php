@extends('layouts.app')
@section('content')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">

        @include('inc.fontend_searchbox')

        <div class="col-md-9 col-lg-9 col-xl-7">

            


            <!-- Post preview-->
            <div class="post-preview">
                @isset($posts)                    
                @forelse($posts as $key => $post)

                <a href="{{route('postdetails.view',['id'=>$post])}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                </a>

                <p class="post-meta">
                    Posted by
                    <a href="javascript:">{{$post->user->name}}</a>
                    {{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                </p>
                @empty
                    
                <div style="text-align: justify;">
                    No Information Found
                </div>

                @endforelse
                @endisset

                @empty($posts)
                <div>
                    A blog is a discussion or informational website published on the World Wide Web consisting of 
                    discrete, often informal diary-style text entries. Posts are typically displayed in reverse 
                    chronological order, so that the most recent post appears first, at the top of the web page
                </div> 
                @endempty
                
            </div>
            
        </div>
        
        <!--====== Post Category ==========-->
        @include('inc.fontend_postcategory')

    </div>
</div>

@endsection