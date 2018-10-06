<template>
    <div class="container">
        <content-placeholders v-if="loading">
            <content-placeholders-heading :img="true" />
            <content-placeholders-text :lines="3" />
        </content-placeholders>
        <div class="row post">
            <div class="col-12 col-md-12 col-sm-12">
                <h3>{{ post.title.rendered }}</h3>

                <div class="post-img" :style="{background: 'url(' + post.wpvue.thumbnail + '), #17a2b9'}"></div>
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
                post_url: wpvue.rest_url + 'posts/',
                loading: true
            }
        },
        mounted() {
            $.get( wpvue.rest_url + 'posts/' + this.$route.params.id ).always((result) => {
                this.post    =  result
                console.log(result)
            }).done(() => {
                this.loading = false
            })
        }
    }
</script>
<style lang="scss">
    .post {
        h3 {
            font-weight: 100;
        }
        &-img {
            background-blend-mode: multiply;
            height: 300px;
            background-size: cover !important;
            background-position: center !important;
            margin: 30px 0;
            &:hover {
                background-blend-mode: unset;
            }
        }
    }
</style>