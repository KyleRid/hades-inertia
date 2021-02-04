<template>
    <layout>
        <div class="container">
            <div v-if="successMessages" class="alert alert-success mt-4" id="successMessages">
                {{this.successMessages}}
            </div>
            <div class="buttons">
                <a href="/users/create" class="btn btn-primary">Create User</a>
            </div>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Login</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.login || '-'}}</td>
                        <td>
                            <inertia-link class="btn btn-edit" :href="$route('users.info', user.id)">Info</inertia-link>
                            <inertia-link class="btn btn-edit" :href="$route('users.edit', user.id)">Edit</inertia-link>
                            <inertia-link class="btn btn-delete" @click="deleteUser(user.id)" as="button">Delete</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>

<style lang="scss">
    .buttons {
        margin-top: 0;
        margin-bottom: 15px;
    }

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
        props: ['users', 'successMessages'],
        components: {
            Layout
        },
        mounted() {
            if (this.successMessages) {
                const timeout = setTimeout(() => {
                    document.getElementById('successMessages').remove();
                    clearTimeout(timeout);
                }, 5000);
            }
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
