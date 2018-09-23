<template>
    <div class="container">
      <nav>
        <div class="nav nav-tabs categories" id="nav-tab" role="tablist">
          <div class="row categories-row">
            <a v-for="category in categories" @click="updateCategory(category.id)" class="nav-item nav-link col-4 col-md-4 col-sm-4 category" :class="{active: active_category == category.id}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">  {{category.name}} </a>
          </div>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <post-excerpt
            v-for="post in posts"
            :key="post.id"
            :post="post"
            class="col-4 col-lg-4 col-md-4"></post-excerpt>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
      posts: [],
      categories: [],
      posts_url: wpvue.root_url + '/wp-json/wp/v2/posts',
      categories_url: wpvue.root_url + '/wp-json/wp/v2/categories',
      category: '',
      active_category: 0
    }
  },
  created() {
    this.getposts()
    this.getCategories()
  },
  methods: {
    getposts() {
      $.ajax({
        url: this.posts_url,
        type: 'get',
        success: (result) => {
          this.posts = result
          console.log(result)
        }
      })
    },
    getCategories() {
      $.ajax({
        url: this.categories_url,
        type: 'get',
        success: (result) => {
          this.categories = result
        }
      })
    },
    updateCategory(catID) {
      $.ajax({
        url: this.posts_url + '?categories=' + catID,
        type: 'get',
        success: (result) => {
          this.posts = result
          this.active_category = catID
          console.log(result)
        }
      })
    }
  }
}
</script>
<style lang="scss">
    .categories {
      border: none;
      width: calc(100% + 0.333em);
      margin-left: -5px;
      .categories-row {
        width: 100%;
        margin: 30px 0;
        margin-top: 0;
        min-height: 100px;
        text-align: center;
        background: #004C66;
        .category {
          width: 33.333%;
          font-size: 30px;
          font-weight: 100;
          padding-top: 30px;
          color: #fff;
          border-right: 1px solid #fff;
          border-radius: 0;
        }
        .category.active {
          color: #fff;
          background: #17a2b8;
        }
      }
    }
</style>