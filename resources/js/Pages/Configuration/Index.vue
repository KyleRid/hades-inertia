<template>
    <layout>
        <div class="container">
            <div v-if="isLoading">
                Loading...
            </div>
            <form @submit.prevent="save()"  v-if="!isLoading">
                <div class="form-group">
                    <label for="sitename">Site name</label>
                    <input id="sitename" type="text" placeholder="Site Name">
                </div>

                <div class="form-group">
                    <label for="sitedescription">Site description</label>
                    <input id="sitedescription" type="text" placeholder="Site Description">
                </div>

                 <div class="form-group">
                    <label for="sitename">Title Tag</label>
                    <input id="sitename" type="text" placeholder="Site Name">
                </div>

                <div class="form-group">
                    <label for="allowlogin">Allow Login</label>
                    <input id="allowlogin" type="checkbox" v-model="allowLogin">
                </div>

                <div class="form-group">
                    <label for="allowregistration">Allow Registration</label>
                    <input id="allowregistration" type="checkbox" v-model="allowRegistration">
                </div>

                <div class="form-group">
                    <label for="maintenance">Maintenance Mode</label>
                    <input id="maintenance" type="checkbox" v-model="maintenanceMode">
                </div>
                <button class="btn btn-success" type="submit">Save</button>
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
        props: ['configuration'],
        components: {
            Layout
        },
        data() {
            return {
                siteData: null,
                isLoading: true,
                siteName: 'Hades',
                siteDescription: 'Test Description',
                titleTag: 'Title Tag',
                allowLogin: true,
                allowRegistration: true,
                maintenanceMode: false,
            };
        },
        async mounted() {
            this.siteData = await this.getSiteInfo();
            console.log(this.siteData);
            this.isLoading = false;
        },
        methods: {
            async getSiteInfo() {
                return {
                    siteName: 'Hades',
                    siteDescription: 'Test Description',
                    titleTag: 'Title Tag',
                    allowLogin: true,
                    allowRegistration: true,
                    maintenanceMode: false,
                }
            },
            async save() {
                 console.log('saved');
            }
        }
    }
</script>
