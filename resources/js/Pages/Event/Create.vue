<template>
    <LayoutVue>

        <Head title="Create"></Head>
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form @submit.prevent="store">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name"
                                            class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" v-model="form.title"  id="title" autocomplete="given-name"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                            
                                    </div>
                                    <div v-if="form.errors.title">{{ form.errors.title }}</div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city" class="block text-sm font-medium text-gray-700">Start
                                            Date</label>
                                        <input type="date"  v-model="form.start_date"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="region" class="block text-sm font-medium text-gray-700">End /
                                            Date</label>
                                        <input type="date" v-model="form.end_date"
                                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="about"
                                            class="block text-sm font-medium text-gray-700">Description</label>
                                        <div class="mt-1">
                                            <textarea rows="3" v-model="form.description"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                placeholder="description" />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <button type="submit" :disabled="form.processing"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </LayoutVue>
</template>
<script setup>
import LayoutVue from '../../Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    title: null,
    start_date: null,
    end_date: null,
    description: null,
})

// storing event
const store = () => {
    form.post(route('store'));
}


</script>