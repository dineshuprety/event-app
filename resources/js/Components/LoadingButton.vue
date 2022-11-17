<template>
    <button :disabled="loading" class="flex items-center justify-center " disabled>
        <div v-if="loading">
            <svg class="w-5 h-5 mr-3 bg-blue-400 animate-spin" viewBox="0 0 24 24">
            </svg>
        </div>
        <slot />
    </button>
</template>
  
<script>
export default {
    props: {
        loading: Boolean,
    },
}
</script>