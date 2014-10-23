@extends('master')

@stop

@section('content')

<div class="row">

	<div class="col-sm-12">	
	
	
	<p><a href="/" class="btn btn-warning btn-lg">Home</a>
	<a href="/lorem" class="btn btn-danger btn-lg">Generate text</a></p>
	
	<br>
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Collect your user profiles below or generate more...</h3>
		</div>
	<div class="panel-body">
			{{ Form::open(array('url' => '/users', 'method' => 'GET')) }}
			
			<fieldset>
				<legend>Enter number of desired random user profiles (Min. 1, Max. 100) and click "Generate". </legend>
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
		
		
		
		
		
		
		
		
<div class="well">		
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

@stop