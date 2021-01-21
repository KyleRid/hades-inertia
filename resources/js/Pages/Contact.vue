<template>
    <layout>Contact</layout>
</template>

<script>
    import Layout from '@/Shared/Layout';
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },
        components: {
            Layout,
        }
    }
</script>
