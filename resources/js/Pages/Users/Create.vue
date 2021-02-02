<template>
    <layout>
        <div class="container">
            <div class="col-md-6">
                <div v-if="Object.keys(this.errors).length > 0" class="alert alert-danger mt-4">
                    <div v-bind:key="error" v-for="error in this.errors">
                        {{ error }}
                    </div>
                </div>
                <form action="/users" method="POST" class="my-5" @submit.prevent="createUser">
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select name="roles" id="roles">
                            <option name="role" value="client">Client</option>
                            <option name="role" value="admin">Admin</option>
                            <option name="role" value="accountant">Accountant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Currency</label>
                        <select name="roles" id="roles">
                            <option name="role" value="client">Client</option>
                            <option name="role" value="admin">Admin</option>
                            <option name="role" value="accountant">Accountant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="name" placeholder="Email" v-model="form.email">
                    </div>
                     <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" placeholder="Login (optional)" v-model="form.login">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="text" class="form-control" id="name" placeholder="Password" v-model="form.password">
                    </div>
                    <div class="form-group">
                        <label for="name">Verified</label>
                        <input type="checkbox" class="form-control" id="verified" v-model="form.verified">
                    </div>
                    <div class="form-group">
                        <label for="gender-m">Male</label>
                        <input type="radio" name="gender" class="form-control" id="gender-m" value="true" v-model="form.gender">
                        <label for="gender-f">Female</label>
                        <input type="radio" name="gender" class="form-control" id="gender-f" value="false" v-model="form.gender">
                    </div>
                     <div class="form-group">
                        <label for="name">Birthdate (optional)</label>
                        <input type="date" class="form-control" id="birthdate" v-model="form.birthdate">
                    </div>
                    <div class="form-group">
                        <label for="name">IBAN (optional)</label>
                        <input type="text" class="form-control" id="iban" v-model="form.iban">
                    </div>

                     <div class="form-group">
                        <label for="name">Bank Name (optional)</label>
                        <input type="text" class="form-control" id="bankName" v-model="form.bankName">
                    </div>
                    <div class="form-group">
                        <label for="name">Passport (optional)</label>
                        <input type="text" class="form-control" id="passport" v-model="form.passport">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone (optional)</label>
                        <input type="text" class="form-control" id="phone" v-model="form.phone">
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
        props: ['errors'],
        components: {
            Layout,
        },
        data() {
            return {
                form: {
                    role: 'client',
                    currency: 'EUR',
                    name: '',
                    email: '',
                    login: '',
                    password: '',
                    verified: false,
                    gender: true,
                    birthdate: '',
                    iban: '',
                    bankName: '',
                    passport: '',
                    phone: '',
                }
            }
        },
        methods: {
            createUser() {
                this.$inertia.post('/users', this.form)
                    .then(() => {
                        console.log('errors', this.errors);
                    });
            }
        }
    }
</script>
