<template>
    <layout>
        <div class="container">
            <h2>Edit Post</h2>
            <form action="" class="row" @submit.prevent="savePost">
                <div class="col-md-6">
                    <input type="text" v-model="title" class="post-title" placeholder="Title">
                    <vue-editor v-model="content" />
                    <span><b>Updated At:</b> {{ this.updatedAt ||  '2017-04-20'}}</span> <br>
                    <span><b>Created At:</b> {{ this.createdAt || '2017-04-20'}}</span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keywords">Keywords: </label>
                        <input id="keywords" type="text" v-model="keywords" placeholder="keywords">
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags: </label>
                        <input id="tags" type="text" v-model="tags" placeholder="tags">
                    </div>
                      <div class="form-group">
                        <div>
                             <div style="margin-bottom: 15px">
                                <label for="thumbnail">Thumbnail: </label>
                                <input id="thumbnail" type="file" @change="previewFile">
                            </div>

                            <div id="preview" >
                                <!-- <img v-if="url" :src="url" /> -->
                                <img src="https://images.unsplash.com/photo-1593642634443-44adaa06623a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=925&q=80" alt="" style="    width: 250px;
                            height: auto;">
                            </div>
                        </div>

                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout';
    import { VueEditor } from 'vue2-editor';
    export default {
        props: ['post'],
        components: {
            VueEditor,
            Layout,
        },
        data() {
            console.log('post', this.post);
            return {
                title: this.post[0].title,
                content: this.post[0].content,
                createdAt: this.post[0].created_at,
                updatedAt: this.post[0].updated_at,
                thumbnail: this.post[0].thumbnail,
                keywords: this.post[0].keywords,
                tags: this.post[0].tags,
                url: '',
            }
        },
        mounted() {

        },
        methods: {
            previewFile(event) {
                const file = event.target.files[0];
                this.thumbnail = file;
                this.url = URL.createObjectURL(file);
            },
            savePost() {
                let photo = document.getElementById("thumbnail").files[0];
                let formData = new FormData();

                formData.append("photo", photo);
                // fetch('/upload/image', {method: "POST", body: formData});

                this.$inertia.patch(`/posts/${this.post[0].id}`, formData)
                    .then((not) => {
                        console.log('updated', not);
                });
            }
        }
    }
</script>

<style lang="scss">
    h2 {
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 30px;
    }
    .post-title {
        border: none;
        border-bottom: 1px solid #000;
        margin-bottom: 15px;
        width: 100%;
        &:focus {
            outline: none;
            --tw-ring-offset-shadow: none;
        }
    }

    .btn {
        margin-left: 15px;
        width: auto;
    }

    .col-md-6 {
        margin-bottom: 15px;
    }

    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 300px;
        margin-bottom: 15px;
    }
</style>
