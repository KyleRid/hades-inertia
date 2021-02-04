<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="min-height: 100vh;">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'dashboard'}">
                    <inertia-link :href="route('dashboard')">Dashboard</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute.includes('users.')}">
                    <inertia-link :href="route('users.index')">Users</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute.includes('posts.')}">
                    <inertia-link :href="route('posts.index')">Posts</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'roles.index'}">
                    <inertia-link :href="route('roles.index')">Roles</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'configuration.index'}">
                    <inertia-link :href="route('configuration.index')">Configuration</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'emailCampaign.index'}">
                    <inertia-link :href="route('emailCampaign.index')">Email Campaign</inertia-link>
                </li>
            </ul>
        </div>
    </nav>

</template>

<style lang="scss">
    .sidebar {
        overflow: hidden;
        width: 250px;
    }

    .nav-item {

        a {
            padding: 10px 15px;
            display: inline-block;
            width: 100%;

             &:hover {
                 background: #eaeaea;
             }
        }

        &.active {
            // background-color: #35ca5959;
            background-color: #35ca408a;
        }
    }
</style>

<script>
    export default {
        data() {
            return {
                currentRoute: 'dashboard',
            }
        },
        mounted() {
            this.currentRoute = route().current();
            console.log('current route', route().current());
        }
    }
</script>
