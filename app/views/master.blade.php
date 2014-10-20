<!DOCTYPE html>
<html lang="en">
<head>
	<title>Boris Rugel | WebDev Aid</title>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	@yield('javascript')
	
</head>

<body>

<div id="top" class="container">

<div class="page-header" id="banner">
	<div class="row">
		<div class="col-sm-12">
          
			<h4 class="text-success">HES CSCI E-15 Dynamic Web Aplications fall 2014 Project #3 created by Boris Rugel.</h4>
		</div>
	</div>
         
</div>


@yield('content')


<footer>
	<div class="row">
		<div class="col-lg-12">	
			<ul class="list-unstyled">
				<li class="pull-left">This project on <a href="https://github.com/Karatechop/p3">GitHub</a>				
				<li class="pull-right"><a href="#top">Back to top</a></li>
			</ul>
		</div>
        </div>
        

	<div class="row">
		<div class="col-lg-12">
		<div class="well">
          
			<ul class="list-unstyled">
				<li class="pull-left">Other projects: <a href="http://p2.borisrugel.com">	P2</a> , <a href="http://p4.borisrugel.com">P4</a></li>
				<li class="pull-right">Developed by:  <a href="http://p1.borisrugel.com">Boris Rugel</a>  2014 &copy;</li>
             		</ul>
		</div>
		</div>
        </div>

</footer>

</div>

</body>

</html>