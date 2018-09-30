<template>
	<div class="app-header">
		<nav class="navbar navbar-expand-lg navbar-info bg-info">
		  <div class="container">
		  	<a class="navbar-brand" href="/wpvue/">  {{this.site_name}} </a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
				    <li class="nav-item" v-for="item in menu_items">
				        <a class="nav-link" :href="item.url">{{item.title}}</a>
				    </li>
		    	</ul>
		    	<ul class="navbar-nav ml-auto">
				    <li class="nav-item search-icon" @click="getSearch">
				    	<i class="fa fa-search fa-lg mr-md-5 mr-3"></i>
				    </li>
		    	</ul>
		  	</div>
		  </div>
		</nav>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				menu_items: [],
				site_name: wpvue.site_name,
				menus_url: wpvue.root_url + '/wp-json/wpvue/v1/menus/primary'
			}
		},
		created() {
		    this.getMenus()
		},
	  	methods: {
		    getMenus() {
		      $.ajax({
		        url: this.menus_url,
		        type: 'get',
		        success: (result) => {
		          this.menu_items = result
		        }
		      })
		    },
		    getSearch() {
		      $('.search-container').show('slow')
		      $('.search-input').focus()
		      console.log(1)
		    }
	  	}
	}
</script>

<style lang="scss">
	.navbar {
		margin-bottom: 30px;
		
		a {
			color: #fff;
		}
		.search-icon {
			i {
				color: #fff;
				cursor: pointer;
				margin-top: 10px;
			}			
		}
	}
</style>