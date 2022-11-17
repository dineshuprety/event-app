<template>
    <div class="min-h-full">
        <NavbarVue />
        <main>
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot />
            </div>
        </main>
        <FooterVue />
    </div>
</template>
<script setup>
import NavbarVue from '../Components/Navbar.vue';
import FooterVue from '../Components/Footer.vue';
</script>