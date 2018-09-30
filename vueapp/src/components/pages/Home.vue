<template>
    <div class="app">
      <content-placeholders v-if="loading">
        <content-placeholders-heading :img="true" />
        <content-placeholders-text :lines="3" />
      </content-placeholders>
      <div class="search-container">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group">
              <input type="text"
              class="form-control search-input"
              placeholder="Search WPVue"
              v-model="search">
              <i class="fa fa-times fa-lg mr-md-5 mr-3" @click="closeSearch"></i>
            </div>
          </div>
        </div>
      </div>
      <div v-show="!loading" class="container">
        <nav>
          <div class="nav nav-tabs categories" id="nav-tab" role="tablist">
            <div class="row categories-row">
              <a @click="getposts()" class="nav-item nav-link col-3 col-md-3 col-sm-3 category default-select active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">  All </a>
              <a v-for="category in categories" @click="updateCategory(category.id)" class="nav-item nav-link col-3 col-md-3 col-sm-3 category wp-category" :class="{active: active_category == category.id}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">  {{category.name}} </a>
            </div>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <transition-group
            tag="div"
            class="row"
            name="post-excerpt"
            >
              <post-excerpt
              v-for="post in searchPost"
              :key="post.id"
              :post="post"
              class="col-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"></post-excerpt>
            </transition-group>
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
      active_category: 0,
      search: '',
      loading: true
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
      }).done(() => {
        this.loading = false
      })
      $('.wp-category').removeClass('active')
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
        }
      })
      $('.default-select').removeClass('active')
    },
    closeSearch() {
      $('.search-container').hide('slow')
      $('.search-input').val('')
    }
  },
  computed: {
    searchPost() {
      return this.posts.filter(post => {
        return post.title.rendered.toLowerCase().includes(this.search.toLowerCase())
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
    .tab-content {
      .post-excerpt-enter-active,
      .post-excerpt-leave-active {
        transition: all 3s;
      }

      .post-excerpt-enter,
      .post-excerpt-leave-to {
        transform: translateX(1rem);
        opacity: 0;
      }

      .post-excerpt-leave-active {
        position: absolute;
      }

      .post-excerpt-move {
        transition: all 3s;
      }
    }
    .search-container {
      position: absolute;
        z-index: 999;
        top: -15px;
        right: 0;
        width: 100%;
        display: none;
      .container-fluid {
        i {
          background: #17a2b8;
          position: absolute;
          top: 49px;
          right: 0;
          font-size: 30px;
          color: #fff;
          padding: 15px;
          border-radius: 50%;
          cursor: pointer;
          margin-right: 0 !important;
        }
        .form-group {
            width: 100%;
            margin-top: 46px;
            font-size: 30px;
            font-weight: 100;
            input {
              min-height: 57px;
              width: 100%;
              border-top: none;
              font-size: 30px;
              padding-left: 30px;
              border: none;
              border-radius: 0;
            }
        }
      }
    }
</style>