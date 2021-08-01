@extends('layouts.app')
@section('content')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">

      @include('inc.fontend_searchbox')

        <div class="col-md-9 col-lg-9 col-xl-7">

            
          
          <!--========== Post preview ================-->
            <div class="post-preview">
                <?php 
                   $post_id =""; 
                ?>
                @isset($post)                    
                @forelse($post as $key => $p)
                <?php 
                    $post_id =$p->id; 
                ?>
                <h2 class="post-title">{{$p->title}}</h2>
                <div style="text-align: justify;">
                    {!! $p->description !!}
                </div>

                
                <p class="post-meta">
                    <div style="float: right;font-size: 14px;">
                    Posted by
                    <a href="javascript:">{{$p->user->name}}</a>
                    {{\Carbon\Carbon::parse($p->created_at)->format('d-m-Y')}}
                    </div>
                </p>
                <br>
                <hr>
                <div style="width: 100%;height:50px;margin-top:10px;">
                    <a href="javascript:" id="myBtn" style="color: #0c58ce;">Add a comment</a>
                    
                </div>

                    
                @empty
                    
                <div style="text-align: justify;">
                    No Information Found
                </div>
                
                @endforelse
                @endisset
            </div>



            <!----======== Show Comment of this post ===============------->

            
              <?php 
                 $post_idn =""; 
              ?>
              @isset($postcomments)                    
              @foreach($postcomments as $pc)
              <?php 
                  $post_idn =$pc->post_id; 
              ?>
              <hr>
              <div class="post-preview comment row">
              <div style="text-align: justify;">
                  {!! $pc->comment !!}
              </div>

              
              <p class="post-meta">
                  <div style="float: right;font-size: 14px;">
                  Commented &nbsp; {{\Carbon\Carbon::parse($pc->created_at)->format('d-m-Y')}}<br>
                  <a href="javascript:">{{$pc->user->name}}</a>
                  
                  </div>
              </p>
              
              
            </div>
              @endforeach
              @endisset
          
              
        </div>

        <!--====== Post Category ==========-->
        @include('inc.fontend_postcategory')
        
    </div>
</div>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      -webkit-animation-name: fadeIn; /* Fade in the background */
      -webkit-animation-duration: 0.4s;
      animation-name: fadeIn;
      animation-duration: 0.4s
    }
    
    /* Modal Content */
    .modal-content {
      position: fixed;
      bottom: 0;
      background-color: #fefefe;
      width: 100%;
      -webkit-animation-name: slideIn;
      -webkit-animation-duration: 0.4s;
      animation-name: slideIn;
      animation-duration: 0.4s
    }
    
    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    
    .modal-header {
      padding: 2px 16px;
      background-color: #939397;
      color: white;
    }
    
    .modal-body {padding: 2px 16px;}
    
    .modal-footer {
      padding: 2px 16px;
      background-color: #939397;
      color: white;
    }
    
    /* Add Animation */
    @-webkit-keyframes slideIn {
      from {bottom: -300px; opacity: 0} 
      to {bottom: 0; opacity: 1}
    }
    
    @keyframes slideIn {
      from {bottom: -300px; opacity: 0}
      to {bottom: 0; opacity: 1}
    }
    
    @-webkit-keyframes fadeIn {
      from {opacity: 0} 
      to {opacity: 1}
    }
    
    @keyframes fadeIn {
      from {opacity: 0} 
      to {opacity: 1}
    }
    .tox-tinymce{height: 200px !important;}
    </style>
<!-- Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h2>Login</h2>
        <span class="close">&times;</span>
        
      </div>
      <div class="modal-body" style="padding-top: 20px;padding-bottom:20px;">
        <div class="row">
          <div class="col-md-2"></div> 
          <div class="col-md-8"> 
          <form action="{{route('commenterlogin',['id'=>$post_id])}}" method="POST">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              
              <div class="form-group row" style="margin-bottom: 5px">
                  <label for="email" class="col-md-2 col-form-label text-md-right">Login E-Mail</label>

                  <div class="col-md-8">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row" style="margin-bottom: 5px">
                  <label for="password" class="col-md-2 col-form-label text-md-right">Login Password</label>

                  <div class="col-md-8">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row" style="margin-bottom: 5px">
                <label for="fname" class="col-md-2 col-form-label text-md-right">Comment On Post</label>
                <div class="col-md-8">
                    <textarea id="basic-example"  name="comment"  class="form-control @error('comment') is-invalid @enderror" style="height: 120px;">...</textarea>
                    @error('comment')
                        <span class="text-danger"> {{$message}}  </span>
                    @enderror
                </div>
            </div>

              
          
              <div class="form-group row mb-0" style="margin-bottom: 5px">
                  <div class="col-md-8 offset-md-2">
                      <button type="submit"  class="btn btn-primary">
                          Submit
                      </button>

                      @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                          </a>
                      @endif
                  </div>
              </div>
            </form>
          </div>
          <div class="col-md-2"></div>
          </div>
      </div>
      
      <div class="modal-footer">
          
      </div>
    </div>
  
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

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





<script type="text/javascript">
    
    
    function checkuser(postid)
    {   
        //alert(postid);
        var useremail = document.getElementById('email').value;
        var userpass = document.getElementById('password').value; 
        
        $.ajax({
            type:'POST',
            url: '/commenterlogin/'+postid,
            
            dataType:'json',
            success:function(data){
               alert(data);
                //if(data.validuser)

            }
        })
    }
      //end 
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">


@endsection