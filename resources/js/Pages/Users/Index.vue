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
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>
                            <inertia-link :href="`/users/${user.id}/edit`">Edit</inertia-link>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout';
    export default {
        props: ['users', 'successMessage'],
        components: {
            Layout,
        }
    }
</script>
