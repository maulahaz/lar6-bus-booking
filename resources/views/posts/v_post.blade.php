@extends('templates/material_dashboard/v_general')
@section('content')
		
	<h2><?= $pageTitle; echo $userID; ?></h2>

	<div class="row">
		<div class="col-md-12">
		    <div class="card">
		      <div class="card-header">
		        <h4 class="card-title">Regular header</h4>
		        <p class="category">Category subtitle</p>
		      </div>
		      <div class="card-body">
		        Please type Title and content of your post
				<form action="{{ route('posts') }}" method="POST">
					@csrf
					<div class="form-row">
					    <div class="col">
					      <input type="text" name="post_title" id="post_title" class="form-control" placeholder="Title">
					      @error('post_title')
					      	<p>{{ $message }}</p>
				      	  @enderror
					    </div>
					</div>
				  	<div class="form-row">
					    <div class="col">
					      <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="3" placeholder="Content"></textarea>
					    </div>
					</div>
					
					<div class="form-row">
					    <div class="col">
					    	<input type="hidden" name="user_id">
					    	<button type="submit" name="submit" class="btn btn-primary" value="Submit">Submit</button>
							<button type="submit" name="submit" class="btn btn-default" value="Cancel">Cancel</button>
					    </div>
					</div>

				</form>
		      </div>
		    </div>
		</div>
	</div>


@endsection