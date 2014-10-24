@extends('master')

@section('scripts')

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>	
	
	<script>
	$(function() {
			$( "#tabs" ).tabs({
					event: "mouseover"
			});
		});
	</script>
@stop

@section('content')

<div class="jumbotron">
	
	<h1>Sorry, can't find what you're looking for... but no worries</h1>
	<p>This application helps you generate "Lorem Ipsum" dummy text and random users' profile data</p>
  
 
	<p><a href="#text" class="btn btn-warning btn-lg">Generate text</a>
	<a href="#users" class="btn btn-danger btn-lg">Generate users</a></p>

</div>


<div class="row">
	<div class="col-sm-12">

<!------------------------------LOREM-IPSUM------------------------------------->
		
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 id= "text" class="panel-title">What is Lorem Ipsum?</h3>
		</div>
	
		<div class="panel-body">
			<p>Lorem Ipsum is filler text used for testing fonts and layout for publishing and printing. Lorem Ipsum has been the publishing industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software including versions of Lorem Ipsum. </p>
		</div>
	</div>

<!------------------------------PARAGRAPHS-FORM--------------------------------->
	
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
					
					{{ Form::number('paragraphs_number', null, array('class'=>'form control input-lg col-lg-3'))}}

					{{ Form::submit('Generate', array('class'=>'btn btn-primary btn-lg')) }}

					</div>	
					 
					</div>
			</fieldset>
					{{ Form::close()}}
		</div>
	</div>

<!-----------------------------PREGEN.-PRAGRAPHS------------------------------->
	
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

<!------------------------------RU---------------------------------------------->
	
	<div id="users" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Random user profiles</h3>
		</div>
	
		<div class="panel-body">
			<p>While lorem ipsum text is useful for a variety of body text filler, it has its limits: when creating user profiles for site mockups, or filling in user registration databases with random data for testing, you need fake names, face photographs of the right size, and more.</p> Source: <a href="http://demosthenes.info/blog/670/The-Face-Of-Lorem-Ipsum-Profile-Generators-And-Random-User-Images"> demosthenes.info </a>
		</div>
	</div>

<!--------------------------RU-FORM--------------------------------------------->	

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Generate yourself some random user profile data...</h3>
		</div>
		<div class="panel-body">
			{{ Form::open(array('url' => '/users', 'method' => 'GET')) }}
			
			<fieldset>
				<legend>Enter number of desired random user profiles (Min. 1, Max. 100) and click "Generate" or use fifteen pre-generated profiles displayed below. In case of invalid form entry you still get 15 profiles free of charge ;)</legend>
					<div class="form-group">
    										
						{{ Form::number('users_number', null, array('class'=>'form control input-lg col-sm-1'))}}
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
						{{ Form::label("birthday", "Include birthdays"); }}
						</div>
						
						
						
						<div class="checkbox">
						{{ Form::checkbox("address", "address", 'checked', array("id"=>"address")); }}
						{{ Form::label("address", "Include addresses"); }}
						</div>
						
					
						
						<div class="checkbox">
						{{ Form::checkbox("blurb", "blurb", 'checked', array("id"=>"blurb")); }}
						{{ Form::label("blurb", "Include Lorem Ipsum user profile"); }}
						</div>

					
					</div>
					
			</fieldset>
			{{ Form::close()}}
		</div>
	</div>

<!---------------------------TABS----------------------------------------------->

	<div class="panel panel-default">
	
			<div class="panel-heading">
				<h3 class="panel-title">... or use these 15 pre-generated random user profiles in your prefered format</h3>
			</div>
			
		<div id="tabs">
			
			<ul class="nav nav-tabs">
			    <li><a href="#tabs-1">Plain data</a></li>
			    <li><a href="#tabs-2">JSON</a></li>
			    <li><a href="#tabs-3">XML</a></li>
			</ul>

<!--------------------------------TAB-1---------------------------------------->
			
			<div id="tabs-1" class="tab-content">

					<div class="panel-body">
				
					<?php
						$faker = Faker\Factory::create();
						for ($i=0; $i < $users_number; $i++) {
							
							if ($image) {
								echo '<img src="'.Faker\Provider\Image::imageUrl($width = 95, $height = 115, 'people').'" alt="Image'.$i.'"><br>';
								}
							
								echo '<strong>Name: </strong>&nbsp;&nbsp;&nbsp;'.$faker->name . '<br>';
				
							if($birthday) {
								echo '<strong>Date of Birth: </strong>&nbsp;&nbsp;&nbsp;'.Faker\Provider\DateTime::date($format = 'Y-m-d', $max = 'now') . '<br>';
								}
								
							if ($address) {
								echo '<strong>Address: </strong>&nbsp;&nbsp;&nbsp;'.$faker->address . '<br>';
								}
			
				
							if ($blurb) {
								echo '<strong>Profile: </strong>&nbsp;&nbsp;&nbsp;'.$faker->text . '<br>';
								}
				
							if ($address OR $birthday OR $blurb) {
								echo '<br>';
								}
						}
					?>	
					
					</div>
				
	
			</div>

<!--------------------------------TAB-2---------------------------------------->
		
			<div id="tabs-2" class="tab-content">

				<div class="panel-body">
				
					<?php
						$faker = Faker\Factory::create();
						
						if ($address OR $birthday OR $blurb) {
							
							echo '[ <br><br> { <br> <br>';
						
							for ($i=0; $i < $users_number; $i++) {
							
						
							if ($image) {
								echo '<strong>"Image URL" : </strong>&nbsp;&nbsp;&nbsp;'.'"'.Faker\Provider\Image::imageUrl($width = 95, $height = 115, 'people').'",'.'<br>';
								}
							
								echo '<strong>"Name" : </strong>&nbsp;&nbsp;&nbsp;'.'"'.$faker->name .'",'. '<br>';
				
							if($birthday) {
								echo '<strong>"Date of Birth": </strong>&nbsp;&nbsp;&nbsp;'.'"'.Faker\Provider\DateTime::date($format = 'Y-m-d', $max = 'now') .'",'. '<br>';
								}
								
							if ($address) {
								echo '<strong>"Address" : </strong>&nbsp;&nbsp;&nbsp;'.'"'.$faker->address .'",'. '<br>';
								}
			
				
							if ($blurb) {
								echo '<strong>"Profile" : </strong>&nbsp;&nbsp;&nbsp;'.'"'.$faker->text .'"'. '<br>';
								}
				
							
							
							if ($i==($users_number-1)) {	
								echo '<br> } <br><br>';
							} else {
								echo '<br> }, <br><br>';	
							};
							
							};
							
							echo ']';
						
						} else {
							echo '[ <br> {';
							echo '<strong>"Name" : </strong>&nbsp;&nbsp;&nbsp;'.'"'.$faker->name .'",'. '<br>';
							echo '} <br> ]';
						};
							
					?>	
				
				
				
				</div>
	
			</div>
		
<!--------------------------------TAB-3---------------------------------------->	
		
			<div id="tabs-3" class="tab-content">
				
				<div class="panel-body">
				
					<?php
						$faker = Faker\Factory::create();
					?>
					
					
							&lt;?xml version="1.0" encoding="UTF-8"?&gt;
							
							<br>
							<br>
							&lt;RANDOM USERS&gt;
							<br>
							<br>
					
					<?php
							for ($i=0; $i < $users_number; $i++) {
							
							echo '&lt;RANDOM USER '.($i+1).'&gt; <br>';
							
								
							if ($image) {
								echo '&nbsp;&nbsp;&lt;IMAGE URL&gt;'.Faker\Provider\Image::imageUrl($width = 95, $height = 115, 'people').'&lt;/IMAGE URL&gt;<br>';
								}
								
								echo '&nbsp;&nbsp;&lt;NAME&gt;'.$faker->name.'&lt;/NAME&gt;<br>';
				
							if($birthday) {
								echo '&nbsp;&nbsp;&lt;BIRTH DATE&gt;'.Faker\Provider\DateTime::date($format = 'Y-m-d', $max = 'now') .'&lt;/BIRTH DATE&gt;<br>';
								}
								
							if ($address) {
								echo '&nbsp;&nbsp;&lt;ADDRESS&gt;'.$faker->address .'&lt;/ADDRESS&gt;<br>';
								}
			
				
							if ($blurb) {
								echo '&nbsp;&nbsp;&lt;PROFILE&gt;'.$faker->text .'&lt;/PROFILE&gt;<br>';
								}
							
							
								
							echo '&lt;/RANDOM USER '.($i+1).'&gt; <br><br>';
							};
						
					?>
					&lt;/RANDOM USERS&gt;
			
				</div>
			</div>
<!----------------------------------------------------------------------------->		 
			
		</div>
				
	</div>
	 
	
	 
<!----------------------------------------------------------------------------->	 
	</div>
</div>

@stop