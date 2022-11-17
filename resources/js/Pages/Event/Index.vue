<template>
  <div>
    <LayoutVue>

      <Head title="Event"></Head>
      <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
          <FlashMessageVue />
          <div class="w-full p-8 bg-white rounded-md">
            <div class="flex items-center justify-between pb-6 ">
              <div>
                <h2 class="font-semibold text-gray-600">Events</h2>
                <span class="text-xs">All Event item</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center p-2 rounded-md bg-gray-50">
                  <!-- select -->
                </div>
                <div class="ml-10 space-x-8 lg:ml-40">
                  <Link :href="route('create')"
                    class="px-4 py-2 font-semibold tracking-wide text-white bg-indigo-600 rounded-md cursor-pointer">Add
                  Event</Link>
                </div>
              </div>
            </div>
            <div>
              <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          Title
                        </th>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          Start Date
                        </th>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          End Date
                        </th>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          Description
                        </th>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          Status
                        </th>
                        <th
                          class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="event in events.data" :key="event.id">
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                              {{ event.title }}
                            </p>
                          </div>

                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <p class="text-gray-900 whitespace-no-wrap">{{ event.start_date }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ event.end_date }}
                          </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ event.description }}
                          </p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                            <span aria-hidden class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                            <span class="relative">{{ event.status }}</span>
                          </span>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                          <Link :href="route('edit',event.id)"
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 underline uppercase transition bg-transparent rounded ripple hover:text-blue-900 focus:outline-none">
                            edit
                          </Link>
                          <Link :href="route('destory',event.id)"
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 underline uppercase transition bg-transparent rounded ripple hover:text-blue-900 focus:outline-none">
                            delete
                          </Link>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                  <div>
                    <PaginationVue :links="events.links" class="mt-6" />
                  </div>
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
import LayoutVue from '../../Layouts/Layout.vue';
import FlashMessageVue from '../../Components/FlashMessage.vue';
import PaginationVue from '../../Components/Pagination.vue';

defineProps({
  events: Object,
})
</script> 