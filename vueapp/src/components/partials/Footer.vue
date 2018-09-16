<template>
    <footer class="page-footer font-small bg-info">
        <div class="container">
          <div class="row">
            <div class="col-md-12 py-5">
              <div class="mb-5 text-center">
                <a href="#" class="fb-ic">
                  <i class="fab fa-facebook-f fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <a href="#" class="tw-ic">
                  <i class="fab fa-twitter fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <a href="#" class="gplus-ic">
                  <i class="fab fa-google-plus-g fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <a href="#" class="li-ic">
                  <i class="fab fa-linkedin-in fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <a href="#" class="ins-ic">
                  <i class="fab fa-instagram fa-lg mr-md-5 mr-3 fa-2x"> </i>
                </a>
                <a href="#" class="pin-ic">
                  <i class="fab fa-pinterest-p fa-lg fa-2x"> </i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a :href="this.root_url"> wpvue</a>
        </div>
    </footer>
</template>

<script>
	export default {
		data() {
			return {
				root_url: wpvue.root_url
			}
		}
	}
</script>

<style lang="scss">
	.page-footer {
		
		a {
			i {
				color: #fff;
			}
		}

		.text-center {
			color: #fff;
			a {
				color: #fff;
			}
		}
	}
</style>