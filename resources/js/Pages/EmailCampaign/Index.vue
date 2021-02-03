<template>
    <layout>
        <div class="container">
            <form action="">
                <div class="form-control">
                    <label for="template">Template Name</label>
                    <input type="text" id="template" v-model="templateName">
                </div>

                <div class="form-control">
                    <label for="interval">Interval</label>
                    <select name="intervals" id="intervals" v-model="interval">
                        <option name="intervals" value="day">Every Day</option>
                        <option name="intervals" value="month">Every Month</option>
                        <option name="intervals" value="year">Every Year</option>
                    </select>
                </div>

                <div class="form-control">
                    <label for="sender">Sender E-mail</label>
                    <input type="text" id="sender" v-model="sender">
                </div>
            </form>

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
        props: ['campaign'],
        components: {
            Layout
        },
        data() {
            console.log('emailCampaign', this.campaign);
            return {
                templateName: 'default',
                interval: 'day',
                sender: 'test@test.com',
            }
        },
        mounted() {

        },
        methods: {

        }
    }
</script>
