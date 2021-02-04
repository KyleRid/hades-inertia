<template>
    <layout>
        <div class="container">
            <h2>Project Configuration</h2>
            <div v-if="isLoading">
                Loading...
            </div>
            <form @submit.prevent="save()"  v-if="!isLoading">
                <div class="form-group">
                    <label for="sitename">Site name: </label>
                    <input id="sitename" type="text" placeholder="Site Name" v-model="form.siteName.value">
                </div>

                <div class="form-group">
                    <label for="sitedescription">Site description: </label>
                    <input id="sitedescription" type="text" placeholder="Site Description" v-model="form.siteDescription.value">
                </div>

                 <div class="form-group">
                    <label for="titleTag">Title Tag: </label>
                    <input id="titleTag" type="text" placeholder="Site Title" v-model="form.siteTitle.value">
                </div>

                <div class="form-group">
                    <label for="adminEmail">Admin Email: </label>
                    <input id="adminEmail" type="text" placeholder="Admin Email" v-model="form.adminEmail.value">
                </div>

                <div class="form-group">
                    <label for="allowlogin">Allow Login: </label>
                    <input id="allowlogin" type="checkbox" v-model="form.allowLogin.value">
                </div>

                <div class="form-group">
                    <label for="allowregistration">Allow Registration: </label>
                    <input id="allowregistration" type="checkbox" v-model="form.allowRegistration.value">
                </div>

                <div class="form-group">
                    <label for="maintenance">Maintenance Mode: </label>
                    <input id="maintenance" type="checkbox" v-model="form.maintenanceMode.value">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </layout>
</template>

<style lang="scss">
    h2 {
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 15px;
    }
    .form-group {
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
        props: ['configuration'],
        components: {
            Layout
        },
        data() {
            return {
                form: {
                    siteName: 'Hades',
                    siteDescription: 'Test Description',
                    siteTitle: 'Site Title',
                    allowLogin: true,
                    allowRegistration: true,
                    maintenanceMode: false,
                },
                isLoading: true,
            };
        },
        async mounted() {
            this.configuration.forEach((item) => {
                this.form[item.option_name] = {
                    id: item.option_id,
                    value: this.getValue(item.option_name, item.option_value),
                    name: item.option_name,
                }
            });
            console.log(this.siteData);
            this.isLoading = false;
            console.log('configuration', this.configuration);
            console.log('form', this.form);
        },
        methods: {
            async save() {
                this.$inertia.patch('/configuration', this.form).then(() => {
                    console.log('saved');
                });
            },
            getValue(name, value) {
                switch (name) {
                    case 'maintenanceMode':
                    case 'allowRegistration':
                    case 'allowLogin':
                        return !!+value;
                        break;
                    default:
                        return value;
                }
            }
        }
    }
</script>
