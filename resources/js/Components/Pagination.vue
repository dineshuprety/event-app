<template>
    <div>
        <Component :is="link.url ? 'Link' : 'span'" v-for="link in links" :href="link.url" v-html="link.label"
            class="px-1" :class="{'text-gray-500' : ! link.url, 'font-bold' : link.active}" />
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link,
    },
    props: {
        links: Array
    }
}
</script>