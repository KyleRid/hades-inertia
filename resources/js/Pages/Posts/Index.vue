<template>
    <layout>
        <div class="container">
            <div v-if="successMessages" class="alert alert-success mt-4" id="successMessages">
                {{this.successMessages}}
            </div>
            <div class="my-5">
                <a href="/users/create" class="btn btn-primary">Create User</a>
            </div>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts" :key="post.id">
                        <td>

                        </td>
                        <td>
                            <inertia-link class="btn btn-edit" :href="$route('posts.show', post.id)">{{post.title}}</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>

<style lang="scss">
    .btn {
        padding: 5px 10px;
        border-radius: 10px;
        color: #fff;
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
            Layout
        },
        mounted() {
           console.log(this.posts);
        },
        methods: {

        }
    }
</script>
