<template>
    <div>
        <Layout>

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
                                            <input type="text" v-model="form.title" name="title" id="title"
                                                autocomplete="given-name"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                            <div v-if="form.errors.title" v-text="form.errors.title"
                                                class="text-red-900 "></div>
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="city" class="block text-sm font-medium text-gray-700">Start
                                                Date</label>
                                            <input type="date" v-model="form.start_date"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                            <div v-if="form.errors.start_date" v-text="form.errors.start_date"
                                                class="text-red-900 "></div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="region" class="block text-sm font-medium text-gray-700">End /
                                                Date</label>
                                            <input type="date" v-model="form.end_date"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                            <div v-if="form.errors.end_date" v-text="form.errors.end_date"
                                                class="text-red-900 "></div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="about"
                                                class="block text-sm font-medium text-gray-700">Description</label>
                                            <div class="mt-1">
                                                <textarea rows="3" v-model="form.description"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                    placeholder="description" />
                                                <div v-if="form.errors.description" v-text="form.errors.description"
                                                    class="text-red-900 "></div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-8 py-4 border-t border-gray-100 bg-gray-50">
                                    <LoadingButtonVue type="submit" :loading="form.processing" class="inline-block px-8 py-3 text-sm font-medium text-white transition bg-indigo-600 rounded hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-indigo-500">Create Event</LoadingButtonVue>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Layout>

    </div>
</template>
<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Layouts/Layout.vue';
import LoadingButtonVue from '../../Components/LoadingButton.vue';

const form = useForm({
    title: '',
    start_date: '',
    end_date: '',
    description: '',
})

// storing event
const store = () => {
    form.post(route('store'));
    form.reset();
}


</script>