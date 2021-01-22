<template>
    <layout>
        <div class="container">
            <div class="col-md-6">
                <div v-if="Object.keys(errors).length > 0" class="alert alert-danger mt-4">
                    {{errors[Object.keys(errors)[0][0]]}}
                </div>
                <form class="my-5" @submit.prevent="updateUser()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Email" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="text" class="form-control" id="name" placeholder="Password" v-model="form.password">
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout';
    export default {
        props: ['errors', 'user'],
        components: {
            Layout,
        },
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                }
            }
        },
        mounted() {
            const user = this.getUser();
            console.log(this.user);
            this.form.name = this.user[0].name;
            this.form.email = this.user[0].email;
        },
        methods: {
            async getUser() {

            },
            updateUser() {
                this.$inertia.patch(`/users/${this.user[0].id}`, this.form)
                    .then((not) => {
                        console.log('updated', not);
                    });
            }
        }
    }
</script>
