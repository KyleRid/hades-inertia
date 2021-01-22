<template>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="min-height: 100vh;">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <inertia-link href="/dashboard">Dashboard</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link href="/users">Users</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link href="/posts">Posts</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link href="/roles">Roles</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link href="/configuration">Configuration</inertia-link>
                </li>
                <li class="nav-item">
                    <inertia-link href="/email">Email Campaign</inertia-link>
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
    }
</style>

<script>
    export default {

    }
</script>
