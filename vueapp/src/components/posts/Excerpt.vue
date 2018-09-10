<template>
	<div class="card">
	  <img class="card-img-top"
	  :src="post.wpvue.thumbnail"
	  alt="Card image cap">
	  <div class="card-body">
	    <h5 class="card-title">  {{post.title.rendered}} </h5>
	    <p class="card-text">  {{post.wpvue.post_exp}} </p>
	    <a href="#">Continue Reading</a>
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
		padding: 0;
		border-radius: 0;

		a {
			border-radius: 0;
		}
	}
</style>