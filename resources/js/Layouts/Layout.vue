<template>
    <div class="min-h-full">
        <NavbarVue />
        <main>
            <slot />
        </main>
        <FooterVue />
    </div>
</template>
<script setup>
import NavbarVue from '../Components/Navbar.vue';
import FooterVue from '../Components/Footer.vue';
</script>