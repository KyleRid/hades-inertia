<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="min-height: 100vh;">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'dashboard'}">
                    <inertia-link :href="route('dashboard')">Dashboard</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'users.index'}">
                    <inertia-link :href="route('users.index')">Users</inertia-link>
                </li>
                <li class="nav-item" v-bind:class="{'active': this.currentRoute === 'roles.index'}">
                    <inertia-link :href="route('roles.index')">Posts</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link :href="route('dashboard')">Roles</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link :href="route('dashboard')">Configuration</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link :href="route('dashboard')">Email Campaign</inertia-link>
                </li>
            </ul>
        </div>
    </nav>

</template>

<style lang="scss">
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
            background-color: #35ca5959;
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
