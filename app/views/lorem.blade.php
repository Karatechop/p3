@extends('master')



@section('content')

<div class="row">

	<div class="col-sm-12">	
	
	
	<p><a href="/" class="btn btn-warning btn-lg">Home</a>
	<a href="/users" class="btn btn-danger btn-lg">Generate users</a></p>
	
	<br>
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Collect your paragraphs below or generate yourself some Lorem Ipsum...</h3>
		</div>
		
	
		<div class="panel-body">
			{{ Form::open(array('url' => '/lorem', 'method' => 'GET')) }}
			
			<fieldset>
				<legend>Enter number of desired Lorem Ipsum paragraphs (Min. 1, Max. 15) and click "Generate". In case of invalid form entry you still get three paragraphs free of charge ;)</legend>
					<div class="form-group">
    		
					<div class="input-group">
					
					{{ Form::number('paragraphs_number', '', array('class'=>'form control input-lg col-lg-3'))}}

					{{ Form::submit('Generate', array('class'=>'btn btn-primary btn-lg')) }}

					</div>	
					 
					</div>
			</fieldset>
					{{ Form::close()}}
		</div>
	</div>
	
	
	<div class="well">
		
		<p>{{implode('<p>', $paragraphs)}}</p>
		
	</div>
	
	
	</div>
</div>

@stop