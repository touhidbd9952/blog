<div class="col-md-3 col-lg-3 col-xl-5" style="margin-top: 30px;">
    <!-- Post preview-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">Post Category</div>
        <div class="list-group list-group-flush">
            <?php 
                $categories = App\Models\Category::latest()->orderBy('id','desc')->get();
            ?>

            @foreach ($categories as $cat)
            <a href="{{route('postcategory.view',['id'=>$cat->id])}}" class="list-group-item list-group-item-action list-group-item-light"  style="padding: 6px 6px 6px 16px;font-size: 14px;">{{$cat->name}}</a>
            @endforeach
            
        </div>
    </div>
    
</div>