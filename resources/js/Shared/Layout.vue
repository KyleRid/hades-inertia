<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid">
            <a href="#" class="navbar-brand">Hades</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="color: white !important;">
                    <span>User name: {{this.userName}}</span>
                    <span>Balance: {{this.balance}}</span>
                    <span>Time: {{this.time}}</span>
                </div>
            </div>
        </nav>
        <div style="display: flex;">
            <sidebar />
            <article class="col-md-10" style="margin-top: 15px;">
                <slot />
            </article>
        </div>
    </main>
</template>

<style lang="scss">
    .navbar-collapse {
        width: auto;
        margin-left: auto;
    }

    .navbar-nav {

        span {
            margin-right: 15px;
        }
    }
</style>

<script>
import Sidebar from '@/Shared/Sidebar';
import { DateTime } from 'luxon';
export default {
    props: ['user'],
    components: {
        Sidebar,
    },
    data() {
        // const date = new Date();
        console.log('props', this.$page);
        setInterval(() => {
            // console.log('this.time', this.time, date.getSeconds());
            this.time = DateTime.local().toLocaleString(DateTime.TIME_24_WITH_SECONDS);
        }, 1000);
        return {
            userName: this.$page.props.user.name,
            balance: this.$page.props.user.balance || 0,
            time: DateTime.local().toLocaleString(DateTime.TIME_24_WITH_SECONDS),
        }
    }
    // inject: ['page']
}
</script>
