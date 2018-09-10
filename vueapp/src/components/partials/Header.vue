<template>
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
	  <div class="container">
	  	<a class="navbar-brand" href="/wpvue/">Navbar</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    	<ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			        <a class="nav-link" href="/wpvue/">Home <span class="sr-only">(current)</span></a>
			    </li>
	    	</ul>
	  	</div>
	  </div>
	</nav>
</template>

<script>
	export default {

	}
</script>

<style lang="scss">
	.navbar {
		margin-bottom: 30px;
		
		a {
			color: #fff;
		}
	}
</style>