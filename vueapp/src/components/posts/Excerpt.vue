<template>
	<div class="card">
		<router-link :to="'post/' + post.slug + '/' + post.id">
			<img class="card-img-top"
		  	:src="post.wpvue.thumbnail"
		  	:alt="post.title.rendered">
		</router-link>
	  	<div class="card-body">
	    	<h5 class="card-title">  {{post.title.rendered}} </h5>
	    	<p class="card-text">  {{post.wpvue.post_exp}} </p>
	    	<router-link :to="'post/' + post.slug + '/' + post.id">Continue Reading <i class="fa fa-long-arrow-alt-right"></i></router-link>
	  </div>
	</div>
</template>

<script>
	export default {
		props: ['post']
	}
</script>

<style lang="scss">
	.card {
		max-width: 31.666%;
		margin: 0 9px;
		margin-bottom: 33px;
		padding: 0;
		border-radius: 0;

		a {
			font-size: 17px;
		    font-weight: 100;
		    position: relative;
		    color: #212529;

		    i {
		    	&:before {
		    		position: absolute;
				    top: 6px;
				    margin-left: 5px;
		    	}
		    }
		}

		p {
			font-weight: 100;
		}

		h5 {
			font-weight: 400;
		}
	}
</style>