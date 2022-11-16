<template>
  <div>
    <LayoutVue>
      <Head title="Dashboard"></Head>
      <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
          <div class="bg-gray-50">
            <div
              class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-16 lg:px-8">
              <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to Add Events?</span>
                <span class="block text-indigo-600">Start your free trial today.</span>
              </h2>
              <div class="flex mt-8 lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                  <Link :href="route('create')"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">Add
                    Event</Link>
                </div>
                <div class="inline-flex ml-3 rounded-md shadow">
                  <Link :href="route('index')"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-indigo-600 bg-white border border-transparent rounded-md hover:bg-indigo-50">
                    Event List</Link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /End replace -->
      </div>
    </LayoutVue>
  </div>
</template>
  
<script setup>
import { Link, Head } from '@inertiajs/inertia-vue3';
import LayoutVue from '../Layouts/Layout.vue';

</script>