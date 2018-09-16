<template>
    <div class="container">
        <div class="row restaurant">
            <div class="col-12 col-md-12 col-sm-12">
                <h3>{{ post.title.rendered }}</h3>

                <div class="restaurant-img" :style="{background: 'url(' + post.wpvue.thumbnail + ')'}"></div>
                <div v-html="post.content.rendered"></div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                post:   {
                    title:          {
                        rendered:   '',
                    },
                    wpvue:       {
                        thumbnail: ''
                    },
                    content:        {
                        rendered:   ''
                    }
                },
                post_url: wpvue.rest_url + 'posts/'
            }
        },
        mounted() {
            $.get( wpvue.rest_url + 'posts/' + this.$route.params.id ).always((result) => {
                this.post    =  result
                console.log(result)
            })
        }
    }
</script>
<style lang="scss">
    .restaurant {
        h3 {
            font-weight: 100;
        }
        &-img {
            height: 300px;
            background-size: cover !important;
            background-position: center !important;
            margin: 30px 0;
        }
    }
</style>