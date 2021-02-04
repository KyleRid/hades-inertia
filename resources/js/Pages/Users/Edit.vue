<template>
    <layout>
        <div class="container">
            <h2>Edit User</h2>
            <div class="col-md-6">
                <div v-if="Object.keys(errors).length > 0" class="alert alert-danger mt-4">
                    {{errors[Object.keys(errors)[0][0]]}}
                </div>
                  <form @submit.prevent="updateUser()">
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select name="roles" id="roles" v-model="form.role_id">
                            <option name="role" value="1">Client</option>
                            <option name="role" value="2">Admin</option>
                            <option name="role" value="3">Accountant</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="currencies">Currency</label>
                           <select name="currencies" id="currencies" v-model="form.currency">
                            <option name="currency" value="EUR">EUR</option>
                            <option name="currency" value="USD">USD</option>
                            <option name="currency" value="RUB">RUB</option>
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
                        <input type="radio" name="gender" class="form-control" id="gender-m" value="1" v-model="form.gender">
                        <label for="gender-f">Female</label>
                        <input type="radio" name="gender" class="form-control" id="gender-f" value="0" v-model="form.gender">
                    </div>
                     <div class="form-group">
                        <label for="name">Birthdate (optional)</label>
                        <input type="date" class="form-control" id="birthdate" v-model="form.birthdate">
                    </div>
                    <div class="form-group">
                        <label for="name">IBAN (optional)</label>
                        <input type="text" class="form-control" id="iban" v-model="form.iban" placeholder="IBAN (optional)">
                    </div>

                     <div class="form-group">
                        <label for="name">Bank Name (optional)</label>
                        <input type="text" class="form-control" id="bankName" v-model="form.bankName" placeholder="Bank name (optional)">
                    </div>
                    <div class="form-group">
                        <label for="name">Passport (optional)</label>
                        <input type="text" class="form-control" id="passport" v-model="form.passport" placeholder="Passport (optional)">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone (optional)</label>
                        <input type="text" class="form-control" id="phone" v-model="form.phone" placeholder="Phone (optional)">
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </layout>
</template>

<style lang="scss">

    form {
        margin-bottom: 20px;
    }
    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 15px;

        .currencies {
            margin-left: 10px;
        }

        #roles {
            margin-left: 32px;
        }
    }
</style>

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
                    role_id: 1,
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
        mounted() {
            console.log(this.user);
            this.form.role_id = this.user[0].role_id || 1;
            this.form.currency = 'EUR';
            this.form.name = this.user[0].name;
            this.form.email = this.user[0].email;
            this.form.login = this.user[0].login;
            this.form.verified = this.user[0].verified;
            this.form.gender = this.user[0].gender;
            this.form.birthdate = this.user[0].birthdate;
            this.form.iban = this.user[0].iban;
            this.form.bankName = this.user[0].bankName;
            this.form.passport = this.user[0].passport;
            this.form.phone = this.user[0].phone;
            console.log(this.form);
        },
        methods: {
            updateUser() {
                this.$inertia.patch(`/users/${this.user[0].id}`, this.form)
                    .then((not) => {
                        console.log('updated', not);
                    });
            }
        }
    }
</script>
