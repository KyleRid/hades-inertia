<template>
    <layout>
        <div class="container">
            <form action="" class="row" @submit.prevent="savePost">
                <div class="col-md-6">
                    <input type="text" v-model="title" class="post-title" placeholder="Title">
                    <vue-editor v-model="content" />
                    <span>Updated At: {{ this.updatedAt }}</span>
                    <span>Created At: {{ this.createdAt }}</span>
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
                        <label for="thumbnail">Thumbnail: </label>
                        <input id="thumbnail" type="file" @change="previewFile">
                        <div id="preview">
                            <img v-if="url" :src="url" />
                        </div>
                    </div>
                </div>
                <button type="submit">Submit</button>
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
</style>
