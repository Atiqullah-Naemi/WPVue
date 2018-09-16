<template>
    <div class="container">
      <div class="row">
        <post-excerpt
        v-for="post in posts"
        :key="post.id"
        :post="post"
        class="col-4 col-lg-4 col-md-4"></post-excerpt>
      </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
      posts: [],
      url: wpvue.root_url + '/wp-json/wp/v2/posts'
    }
  },
  created() {
    this.getposts()
  },
  methods: {
    getposts() {
      $.ajax({
        url: this.url,
        type: 'get',
        success: (result) => {
          this.posts = result
          console.log(result)
        }
      })
    }
  }
}
</script>