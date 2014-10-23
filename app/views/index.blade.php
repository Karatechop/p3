@extends('master')

@stop

@section('content')

<div class="jumbotron">
	
	<h1>Developer's Best Friend App</h1>
	<p>This application helps you generate "Lorem Ipsum" dummy text and random users' profile data</p>
  
 
	<p><a href="#text" class="btn btn-warning btn-lg">Generate text</a>
	<a href="#users" class="btn btn-danger btn-lg">Generate users</a></p>

</div>


<div class="row">


	<div class="col-sm-12">
		
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 id= "text" class="panel-title">What is Lorem Ipsum?</h3>
		</div>
	
		<div class="panel-body">
			<p>Lorem Ipsum is filler text used for testing fonts and layout for publishing and printing. Lorem Ipsum has been the publishing industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software including versions of Lorem Ipsum. </p>
		</div>
	</div>
		
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Generate yourself some Lorem Ipsum...</h3>
		</div>
		<div class="panel-body">
			{{ Form::open(array('url' => '/lorem', 'method' => 'GET')) }}
			
			<fieldset>
				<legend>Enter number of desired Lorem Ipsum paragraphs (Min. 1, Max. 15) and click "Generate" or use two pre-generated paragraphs displayed below. In case of invalid form entry you still get three paragraphs free of charge ;)</legend>
					<div class="form-group">
    		
					<div class="input-group">
					
					{{ Form::text('paragraphs_number', null, array('class'=>'form control input-lg col-lg-3'))}}

					{{ Form::submit('Generate', array('class'=>'btn btn-primary btn-lg')) }}

					</div>	
					 
					</div>
			</fieldset>
					{{ Form::close()}}
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">...or use these two pre-generated paragraphs</h3>
		</div>
		<div class="panel-body">
			
			<p>{{implode('<p>', $paragraphs)}}</p>
			
			<ul class="list-unstyled">
			
				<li class="pull-right"><a href="#top">Back to top</a></li>
			
			</ul>
			
		</div>
	</div>
	
	<div id="users" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Random user profiles</h3>
		</div>
	
		<div class="panel-body">
			<p>Netus cras mauris velit mollis sit et integer egestas, habitant auctor integer sem at nam massa himenaeos</p>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Generate yourself some randon user data...</h3>
		</div>
		<div class="panel-body">
			{{ Form::open(array('url' => '/users', 'method' => 'GET')) }}
			
			<fieldset>
				<legend>Enter number of desired random user profiles (Min. 1, Max. 100) and click "Generate" or use ten pre-generated profiles displayed below. In case of invalid form entry you still get 15 profiles free of charge ;)</legend>
					<div class="form-group">
    										
						{{ Form::text('users_number', null, array('class'=>'form control input-lg col-sm-1'))}}
						{{ Form::submit('Generate', array('class'=>'btn btn-primary btn-lg')) }}
						
					</div>
					
					<div class="form-group col-sm-12">
					
						<div class="checkbox">
						{{ Form::checkbox("image", "image", 'checked', array("id"=>"image")); }} 
						{{ Form::label("image", "Include images"); }} 
						</div>
					
						
						
						<div class="checkbox">
						{{ Form::checkbox("name", "name", 'checked', array("id"=>"name")); }} 
						{{ Form::label("name", "Include names"); }} 
						</div>
						
						
						
						<div class="checkbox">
						{{ Form::checkbox("birthday", "birthday", 'checked', array("id"=>"birthday")); }}
						{{ Form::label("birthday", "Include Birthdays"); }}
						</div>
						
						
						
						<div class="checkbox">
						{{ Form::checkbox("address", "address", 'checked', array("id"=>"address")); }}
						{{ Form::label("address", "Include Addresses"); }}
						</div>
						
					
						
						<div class="checkbox">
						{{ Form::checkbox("blurb", "blurb", 'checked', array("id"=>"blurb")); }}
						{{ Form::label("blurb", "Include Lorem Ipsum User Profile"); }}
						</div>

					
					</div>
					
			</fieldset>
			{{ Form::close()}}
		</div>
	</div>

	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">...or use these 15 pre-generated user profiles</h3>
		</div>
		<div class="panel-body">
			
		<?php
			$faker = Faker\Factory::create();
			for ($i=0; $i < $users_number; $i++) {
				
				if ($image) {
					echo '<img src="'.Faker\Provider\Image::imageUrl($width = 95, $height = 115, 'people').'" alt="Image'.$i.'"><br />';
					}
				
				echo $faker->name . '<br />';
	
				if ($address) {
					echo $faker->address . '<br />';
					}
	
				if($birthday) {
					echo Faker\Provider\DateTime::date($format = 'Y-m-d', $max = 'now') . '<br />';
					}
	
				if ($blurb) {
					echo $faker->text . '<br />';
					}
	
				if ($address OR $birthday OR $blurb) {
					echo '<br />';
					}
			}
			?>	
			
		</div>
	</div>

	
	</div>
</div>
  	
@stop