<template>
    <layout>
        <div class="container">
            <h2>Posts</h2>
            <div v-if="successMessages" class="alert alert-success mt-4" id="successMessages">
                {{this.successMessages}}
            </div>
            <div>
                <a href="/posts/create" class="btn btn-primary">New Post</a>
            </div>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Post Thumbnail</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Keywords</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts" :key="post.id">
                        <td>
                            <img src="https://images.unsplash.com/photo-1593642634443-44adaa06623a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=925&q=80" alt="" style="    width: 100px;
    height: 51px;">
                        </td>
                        <td>
                            {{post.title}}
                        </td>
                        <td>
                            <!-- {{post.keywords}} --> test keyword merchandise
                        </td>
                        <td>
                            <inertia-link class="btn btn-edit" :href="$route('posts.edit', post.id)">Edit</inertia-link>
                            <inertia-link class="btn btn-delete" :href="$route('posts.delete', post.id)">Delete</inertia-link>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://images.unsplash.com/photo-1593642634443-44adaa06623a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=925&q=80" alt="" style="    width: 100px;
    height: 51px;">
                        </td>
                        <td>
                            Test Title
                        </td>
                        <td>
                            test keyword merchandise
                        </td>
                        <td>
                            <inertia-link class="btn btn-edit">Edit</inertia-link>
                            <inertia-link class="btn btn-delete">Delete</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>

<style lang="scss">
    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .btn {
        padding: 5px 10px;
        border-radius: 10px;
        color: #fff;
        margin-bottom: 15px;
    }

    .btn-edit {
        background-color: #0d6efdad;

    }

    .btn-delete {
        background-color: #fd0d3ead;
    }
</style>

<script>
    import Layout from '@/Shared/Layout';
    export default {
        props: ['posts', 'successMessages'],
        components: {
            Layout,
        },
        mounted() {
           console.log(this.posts);
        },
        methods: {

        },
    }
</script>
