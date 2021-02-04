<template>
    <layout>
        <div class="container">
            <h2>Email Campaign</h2>
            <form action="">
                <div class="form-control">
                    <label for="template">Template Name: </label>
                    <input type="text" id="template" v-model="templateName">
                </div>

                <div class="form-control">
                    <label for="interval">Interval: </label>
                    <select name="intervals" id="intervals" v-model="interval">
                        <option name="intervals" value="day">Every Day</option>
                        <option name="intervals" value="month">Every Month</option>
                        <option name="intervals" value="year">Every Year</option>
                    </select>
                </div>

                <div class="form-control">
                    <label for="sender">Sender E-mail: </label>
                    <input type="text" id="sender" v-model="sender">
                </div>

                <button class="btn btn-primary">Save</button>
            </form>

        </div>
    </layout>
</template>

<style lang="scss">
    form {
        max-width: 355px;
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .form-control {
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
