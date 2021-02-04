<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid">
            <div>
                <a href="#" class="navbar-brand">Hades</a>
                <button class="bars" @click="toggleSidebar">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>

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
    .bars {
        color: #fff;

        button {

            &:focus {
                outline: none !important;
            }
        }
    }
    .navbar-collapse {
        width: auto;
        margin-left: auto;
    }

    .navbar-nav {

        span {
            margin-right: 15px;
        }
    }

    @media (min-width: 900px) {
        .bars {
            display: none;
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
            showSidebar: true,
        }
    },
    methods: {
        toggleSidebar() {
            console.log(this.showSidebar);
            if (this.showSidebar) {
                console.log('hide',document.querySelector('nav.sidebar').style.width);
                console.log('hide',document.querySelector('nav.sidebar').style);
                document.querySelector('nav.sidebar').style.width = '0px';
                this.showSidebar = false;
            } else {
                console.log('show',document.querySelector('nav.sidebar').style.width);
                console.log('hide',document.querySelector('nav.sidebar').style);
                document.querySelector('nav.sidebar').style.width = '250px';
                this.showSidebar = true;
            }
            console.log(Sidebar);
        }
    }
    // inject: ['page']
}
</script>
