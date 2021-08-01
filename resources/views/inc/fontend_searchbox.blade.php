<div class="col-md-4 col-md-4 offset-md-8 col-xs-12" style="margin-top: -30px;">
    <form action="{{route('search')}}" method="POST">
        @csrf
        
        <div class="form-group row" style="margin-bottom: 5px">
          
          <div class="col-md-8 col-xs-8">
            <input type="text" name="searchword" class="form-control @error('searchword') is-invalid @enderror" style="height: 38px;">
              
          </div>
          <div class="col-md-2 col-xs-4">
            <input type="submit" style="height: 38px;" value="Search">
          </div>
      </div>
      </form>
</div>