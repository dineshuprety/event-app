<template>
    <Link :href="route(url)">{{name}}</Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    url: String,
    name: String
});
</script>