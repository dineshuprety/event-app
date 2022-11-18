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
                  <label class="block text-gray-700">Events:</label>
                  <select v-model="form.status" class="w-full mt-1 form-select">
                    <option :value="null" />
                    <option value="upcoming">Upcoming Event</option>
                    <option value="finished">Finished Event</option>
                    <option value="upcomingwith7days">Upcoming Event with in 7 days</option>
                    <option value="finishedwith7days">Finished Event with in 7 days</option>
                  </select>
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
                          <Link :href="route('edit', event.id)"
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 underline uppercase transition bg-transparent rounded ripple hover:text-blue-900 focus:outline-none">
                          edit
                          </Link>
                          <button
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 underline uppercase transition bg-transparent rounded ripple hover:text-blue-900 focus:outline-none"
                            @click="destory(event.id)">
                            delete
                          </button>
                        </td>
                      </tr>
                      <tr v-if="events.data.length === 0">
                        <td class="px-6 py-4 text-center border-t" colspan="6">No organizations found.</td>
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
import { Inertia } from '@inertiajs/inertia'
import { Link, Head, useForm, } from '@inertiajs/inertia-vue3';
import LayoutVue from '../../Layouts/Layout.vue';
import FlashMessageVue from '../../Components/FlashMessage.vue';
import PaginationVue from '../../Components/Pagination.vue';
import { watch } from 'vue';
import pickBy from 'lodash/pickBy';


const props = defineProps({
  events: Object,
  filters: Object,
})

let form = useForm({
    status: props.filters.status
});

watch(form, value =>{
  Inertia.get(route('index'), pickBy(value), { preserveState: true });
})

const destory = (id) => {
  Inertia.delete(route('destroy', id), {
    onBefore: () => confirm('Are you sure you want to delete this event?'),
  })
}
</script> 