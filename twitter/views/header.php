<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="http://panikspace-com.stackstaging.com/twitter/styles.css">
  </head>
  <body>

  	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="http://panikspace-com.stackstaging.com/twitter/">Twitter</a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      
	      <li class="nav-item">
	        <a class="nav-link" href="?page=timeline">Your Timeline</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="?page=yourtweets">Your Tweets</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
	      </li>
	      
	    </ul>
	    <div class="form-inline my-2 my-lg-0">
	    	<?php
	    		if ($_SESSION['id']) {
	    			echo '<a class="btn btn-outline-success my-2 my-sm-0" href = "?function=logout">Log Out</a>';
	    		} else {
	    			echo '<button class="btn btn-outline-success my-2 my-sm-0" data-target="#myModal" data-toggle="modal">Log In/Sign Up</button>';
	    		}
	    	?>	     
	    </div>
	  </div>
	</nav>