<script setup>
import { useNavbar } from '@/Composables/useNavbar.js';
import { Link } from '@inertiajs/inertia-vue3';
import { useClassColor } from '@/Composables/useClassColor.js';

const props = defineProps({
    links: Object,
    categories: Object
});

const { isNavbarDropdown, activeNavbarDropdown } = useNavbar();

const { classTextColor } = useClassColor();
</script>

<template>
    <ul v-if="links" class="hidden lg:flex justify-end items-center w-full text-sm lg:w-auto lg:order-1">
        <li
            v-for="(link, index) in links" :key="index"
            class="ml-1 first:hidden xl:first:inline-block"
        >
            <v-nav-link
                v-if="link.dropdown"
                :href="link.url"
                @mousemove="activeNavbarDropdown"
                :active="route().current(link.name)"
                class="px-3 py-2 rounded-md"
            >
                {{ link.title }}
            </v-nav-link>

            <v-nav-link
                v-else
                :href="link.route ? route(link.name) : link.url"
                @mousemove="isNavbarDropdown = false"
                :active="route().current(link.name)"
                class="px-3 py-2 rounded-md"
            >
                {{ link.title }}
            </v-nav-link>
        </li>
    </ul>

    <transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="transform opacity-0 scale-x-0"
        enter-to-class="transform opacity-100 scale-x-100"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="transform opacity-100 scale-x-100"
        leave-to-class="transform opacity-0 scale-x-0 "
    >
        <div
            v-if="isNavbarDropdown"
            @mousemove="activeNavbarDropdown"
            @mouseleave="isNavbarDropdown = false"
            class="w-full h-44 absolute bottom-0 left-0 translate-y-48 bg-primary dark:bg-primary-dark shadow-sm border-y border-slate-600 dark:border-slate-400"
        >
            <div class="grid py-5 px-8 mx-auto max-w-screen-xl text-sm md:grid-cols-3 md:px-6">
                <ul class="hidden mb-4 md:mb-0 md:grid grid-cols-2 gap-4 grid-rows-3">
                    <li v-for="category in categories" :key="category.id">
                        <Link :href="route('articles.category', {slug: category.slug})" class="px-3 py-2 hover:text-base-color hover:dark:text-base-dark hover:bg-hover" :class="classTextColor(category.color)">
                            {{category.name}}
                        </Link>
                    </li>
                </ul>

                <a href="#" class="p-8 text-left bg-local bg-gray-500 bg-center bg-no-repeat bg-cover rounded-lg bg-blend-multiply hover:bg-blend-soft-light dark:hover:bg-blend-darken" style="background-image: url(/storage/images/miasto.suwalki.jpg)">
                    <p class="mb-5 max-w-xl font-extrabold tracking-tight leading-tight text-white">Tu może być logo lub następna reklama.</p>
                    <button type="button" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-center text-white border border-white rounded-lg hover:bg-white hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-700">
                        Get started
                        <svg class="ml-1 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </a>
            </div>
        </div>
    </transition>
</template>
