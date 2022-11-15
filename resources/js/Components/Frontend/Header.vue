<template>
  <header aria-label="Page Header">
    <div class="max-w-screen-xl px-4 mx-auto sm:py-12 sm:px-6 lg:px-8">
      <div class="
          absolute
          inset-x-0
          top-[-10rem]
          -z-10
          transform-gpu
          overflow-hidden
          blur-3xl
          sm:top-[-20rem]
        ">
        <svg class="
            relative
            left-[calc(50%-11rem)]
            -z-10
            h-[21.1875rem]
            max-w-none
            -translate-x-1/2
            rotate-[30deg]
            sm:left-[calc(50%-30rem)] sm:h-[42.375rem]
          " viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
          <defs>
            <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645"
              gradientUnits="userSpaceOnUse">
              <stop stop-color="#9089FC" />
              <stop offset="1" stop-color="#FF80B5" />
            </linearGradient>
          </defs>
        </svg>
      </div>
      <div class="px-6 pt-6 lg:px-8">
        <div>
          <nav class="flex items-center justify-between h-9" aria-label="Global">
            <div class="flex lg:min-w-0 lg:flex-1" aria-label="Global">
              <Link :href="route('home')" class="-m-1.5 p-1.5">
              <span class="sr-only">Your Company</span>
              <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                  Fortran Coder
                </h1>

                <p class="mt-1.5 text-sm text-gray-500">
                  Let's write a future 🎉
                </p>
              </div>
              </Link>
            </div>
            <div class="flex lg:hidden">
              <button type="button" class="
                  -m-2.5
                  inline-flex
                  items-center
                  justify-center
                  rounded-md
                  p-2.5
                  text-gray-700
                " @click="mobileMenuOpen = true">
                <span class="sr-only">Open main menu</span>
                <Bars3Icon class="w-6 h-6" aria-hidden="true" />
              </button>
            </div>
            <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-center lg:gap-x-12">
              <Link v-for="item in navigation" :key="item.name" :href="route(item.href)"
                class="font-semibold text-gray-900 hover:text-gray-900">{{item.name}}</Link>
            </div>
            <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-end">
              <button @click="openModal" class="
                  inline-block
                  rounded-lg
                  px-3
                  py-1.5
                  text-sm
                  font-semibold
                  leading-6
                  text-gray-900
                  shadow-sm
                  ring-1 ring-gray-900/10
                  hover:ring-gray-900/20
                ">
                Log in
              </button>
            </div>
          </nav>
          <Dialog as="div" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <DialogPanel focus="true" class="fixed inset-0 z-10 px-6 py-6 overflow-y-auto bg-white lg:hidden">
              <div class="flex items-center justify-between h-9">
                <div class="flex">
                  <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                  </a>
                </div>
                <div class="flex">
                  <button type="button" class="
                      -m-2.5
                      inline-flex
                      items-center
                      justify-center
                      rounded-md
                      p-2.5
                      text-gray-700
                    " @click="mobileMenuOpen = false">
                    <span class="sr-only">Close menu</span>
                    <XMarkIcon class="w-6 h-6" aria-hidden="true" />
                  </button>
                </div>
              </div>
              <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                  <div class="py-6 space-y-2">
                    <Link v-for="item in navigation" :key="item.name" :href="route(item.href)"
                      class="block px-3 py-2 -mx-3 text-base font-semibold leading-7 text-gray-900 rounded-lg hover:bg-gray-400/10">
                    {{ item.name }}
                    </Link>
                  </div>
                  <div class="py-6">
                    <a href="#" class="
                        -mx-3
                        block
                        rounded-lg
                        py-2.5
                        px-3
                        text-base
                        font-semibold
                        leading-6
                        text-gray-900
                        hover:bg-gray-400/10
                      ">Log in</a>
                  </div>
                </div>
              </div>
            </DialogPanel>
          </Dialog>
        </div>
      </div>
    </div>
  </header>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
        leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-full p-4 text-center">
          <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class="w-full max-w-md p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                Sign in to your account
              </DialogTitle>
              <div class="mt-2">
                <form action="">
                  <div>
                    <label for="email" class="text-sm font-medium">Email</label>

                    <div class="relative mt-1">
                      <input type="email" id="email"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm "
                        placeholder="Enter email" />

                      <span class="absolute inset-y-0 inline-flex items-center right-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div>
                    <label for="password" class="text-sm font-medium">Password</label>

                    <div class="relative mt-1">
                      <input type="password" id="password"
                        class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm "
                        placeholder="Enter password" />

                      <span class="absolute inset-y-0 inline-flex items-center right-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div class="mt-4">
                    <button type="submit"
                      class="block w-full px-5 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg ">
                      Sign in
                    </button>
                  </div>
                </form>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";
// import LoadingButton from '../Shared/LoadingButton.vue';
const isOpen = ref(false);

function closeModal() {
  isOpen.value = false;
}
function openModal() {
  isOpen.value = true;
}
const navigation = [
  { name: "Home", href: "home"},
  { name: "Service", href: "service" },
  { name: "Teams", href: "teams" },
  { name: "About", href: "about" },
  { name: "Contact", href: "contact" },
];

const mobileMenuOpen = ref(false);
</script>