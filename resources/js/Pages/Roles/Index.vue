<template>
    <layout>
        <div class="container">
            <h2>Roles</h2>
            <div v-if="successMessage" class="alert alert-success mt-4">
                {{successMessage}}
            </div>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="role in roles" :key="role.id">
                        <td>{{role.name}}</td>
                        <td>{{role.description}}</td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary" @click="saveChanged(role.id);">Save</a> -->
                            <a href="#" class="btn btn-delete" @click="deleteRole(role.id);">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="Name" style="border: none; border-bottom: 1px solid black;">
                        </td>
                        <td>
                            <input type="text" placeholder="Description" style="border: none; border-bottom: 1px solid black;">
                        </td>
                        <td>
                            <a href="/users/create" class="btn btn-primary">Add role</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </layout>
</template>

<style lang="scss">
    h2 {
        font-weight: bold;
        font-size: 24px;
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
        props: ['roles', 'successMessage'],
        components: {
            Layout
        },
        mounted() {
            console.log('roles', this.roles);
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
