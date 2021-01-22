<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="#" class="navbar-brand">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigaton">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="color: white !important;">
                    <inertia-link href="/">Home</inertia-link>
                    <inertia-link href="/about">About</inertia-link>
                    <inertia-link href="/contact">Contact</inertia-link>
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
<script>
import Sidebar from '@/Shared/Sidebar';
export default {
    components: {
        Sidebar,
    },
    // inject: ['page']
}
</script>
