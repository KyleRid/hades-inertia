<template>
    <layout>
        <div class="container">
            <h2>User Card</h2>
            <div class="col-md-6">
                <div v-for="field in this.fields">
                    <b>{{field.title}}:</b> {{field.value || '-'}}
                    <hr>
                </div>
                <!-- <div>Access: {{  }}</div>
                <div>Currency: {{  }}</div>
                <div>LastName: {{  }}</div>
                <div>Gender: {{  }}</div>
                <div>Email: {{  }}</div>
                <div>Birthdate: {{  }}</div>
                <div>IBAN: {{  }}</div>
                <div>BankName: {{  }}</div>
                <div>Passport: {{  }}</div>
                <div>Login: {{  }}</div>
                <div>Verified: {{  }}</div>
                <div>Phone: {{  }}</div>
                <div>RegistrationDate: {{  }}</div>
                <div>Creator: {{  }}</div>
                <div>LastLoginDate: {{  }}</div>
                <div>LastLoginIP: {{  }}</div>
                <div>Status: {{  }}</div>
                <div>City: {{  }}</div>
                <div>Country: {{  }}</div>
                <div>Balance: {{  }}</div> -->
            </div>
        </div>
    </layout>
</template>

<style lang="scss">
    h2 {
        margin-bottom: 15px;
        font-weight: bold;
        font-size: 24px;
    }

    div {
        padding: 3px 0;
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
            let fields = {};
            let titles = {
                birthdate: 'Birth Date',
                created_at: 'Created At',
                currency: 'Currency',
                email: 'Email',
                gender: 'Gender',
                iban: 'IBAN',
                id: 'ID',
                login: 'Login',
                name: 'Name',
                role_id: 'Role',
                updated_at: 'Updated At',
                verified: 'Verified'
            }
            for (let key in this.user[0]) {
                if (this.user[0].hasOwnProperty(key) && titles.hasOwnProperty([key])) {
                    fields[key] = {
                        title: titles[key],
                        value: this.user[0][key]
                    }
                }
            }
            console.log('fields', fields);
            return {
                fields: fields,
            }
        },
        mounted() {
            // console.log(this.user);
            // let titles = {
            //     birthdate: 'Birth Date',
            //     created_at: 'Created At',
            //     currency: 'Currency',
            //     email: 'Email',
            //     gender: 'Gender',
            //     iban: 'IBAN',
            //     id: 'ID',
            //     login: 'Login',
            //     name: 'Name',
            //     role_id: 'Role',
            //     updated_at: 'Updated At',
            //     verified: 'Verified'
            // }
            // for (let key in this.user[0]) {
            //     console.log('key', key, titles, titles.hasOwnProperty[key]);
            //     if (this.user[0].hasOwnProperty(key) && titles.hasOwnProperty([key])) {
            //         console.log('true');
            //         this.fields[key] = {
            //             title: titles[key],
            //             value: this.user[0][key]
            //         }
            //     }
            // }
            // console.log('thisfel', this.fields);
            // this.form.name = this.user[0].name;
            // this.form.email = this.user[0].email;
        },
        methods: {
        }
    }
</script>
