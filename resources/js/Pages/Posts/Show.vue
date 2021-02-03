<template>
    <layout>
        <div class="container">
            <div class="col-md-6">
                <!-- <div v-for="field in this.fields">
                    {{field.title}}: {{field.value || '-'}}
                </div> -->
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

<script>
    import Layout from '@/Shared/Layout';
    import { VueEditor } from 'vue2-editor';

    export default {
        props: ['post'],
        components: {
            Layout,
            VueEditor,
        },
        data() {
            console.log('post', this.post);
            return {

            }
        },
        mounted() {

        },
        methods: {
        },
         data() {
            return {
                content: 'test'
            }
        }
    }
</script>
