<template>
    <layout>
        <div class="container">
            <div v-if="successMessage" class="alert alert-success mt-4">
                {{successMessage}}
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
                    <tr v-for="user in users" :key="user.id">
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <inertia-link class="btn btn-edit" :href="`/users/info/${user.id}`">Info</inertia-link>
                            <inertia-link class="btn btn-edit" :href="`/users/${user.id}/edit`">Edit</inertia-link>
                            <!-- <form @submit.prevent="submit">
                                <input type="hidden" >
                                <button type="submit" onclick="return confirm('Are you sure?');"
                                        class="btn btn-primary btn-xs" >
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button> -->
                                <!-- {{ csrf_field() }} -->
                                <a href="#" class="btn btn-delete" @click="deleteUser(user.id);">Delete</a>

                            <!-- </form> -->
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
        props: ['users', 'successMessage'],
        components: {
            Layout
        },
        methods: {
            async deleteUser(id) {
                 this.$inertia.delete(`/users/${id}`, {})
                    .then(() => {
                        console.log('deleted');
                    });
            }
        }
    }
</script>
