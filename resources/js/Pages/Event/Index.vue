<template>
    <div>
      <LayoutVue>
        <Head title="Event"></Head>
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <!-- Replace with your content -->
          <div class="px-4 py-6 sm:px-0">
           
          </div>
          <!-- /End replace -->
        </div>
      </LayoutVue>
    </div>
  </template>
    
  <script setup>
  import { Link, Head } from '@inertiajs/inertia-vue3';
  import LayoutVue from '../../Layouts/Layout.vue';
  
  defineProps({
    events: Array,
    success: Array
  })
  </script> 