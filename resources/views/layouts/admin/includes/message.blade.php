@if ($errors->any())
<div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-md-8">
    		<div class="alert alert-danger">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        		<ul>
            	@foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            	@endforeach
        		</ul>
    		</div>
    	</div>
    </div>
</div>
@endif

@if(Session::has('success'))
<div class="container">
    <div class="row justify-content-center text-center mt-1">
      <div class="col-md-4">
	  	<div class="alert alert-success">
			<p>{{ Session::get('success') }}</p>
	  	</div>
	  </div>
	</div>
</div>
@endif

@if(Session::has('sticky_error'))
<div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-md-8">
		<div class="alert alert-danger">
			<p>{{ Session::get('sticky_error') }}</p>
		</div>
	  </div>
	</div>
</div>
@endif