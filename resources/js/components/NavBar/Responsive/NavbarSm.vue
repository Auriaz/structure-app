<script setup>
    import { useNavbar } from '@/Composables/useNavbar.js';
    import { ref } from '@vue/reactivity';
    import { useClassColor } from '@/Composables/useClassColor.js';

    const props = defineProps({
        links: Object,
    });

    const { isNavbarDropdown, activeNavbarDropdown } = useNavbar();

    let isShowNavbar = ref(false);

    const { classTextColor } = useClassColor();
</script>

<template>
    <!-- Small Navigation Menu -->
    <div class="flex h-full w-10 lg:hidden items-center md:order-2 absolute top-0 right-0">
        <x-btn
            @click="isShowNavbar = !isShowNavbar"
            icon
        >
            <x-icon v-if="isShowNavbar" class="text-xl" icon="fa-solid fa-xmark" />
            <x-icon v-else class="text-xl" icon="fa-solid fa-bars" />
        </x-btn>
    </div>

    <transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="transform opacity-0 translate-x-0"
        enter-to-class="transform opacity-100 translate-x-100"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="transform opacity-100 translate-y-100"
        leave-to-class="transform opacity-0 translate-y-0"
    >
        <ul v-if="isShowNavbar && links" class="relative  flex-row lg:hidden mt-20 p-4 justify-center items-center w-screen text-sm uppercase bg-slate-400 dark:bg-slate-800">
            <div class="w-full flex justify-between items-center">
                <div class="w-full relative flex justify-start items-center z-20">
                    <slot name="action"></slot>
                </div>

                <div class="w-20 z-10">
                    <slot name="account"></slot>
                </div>
            </div>

            <li class="w-full relative bg-slate-300 dark:bg-slate-600 mt-2 rounded-md hover:bg-slate-400 hover:dark:bg-slate-500">
                <slot name="content"></slot>
            </li>

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
                    class="w-full absolute top-0 left-0 translate-y-36 bg-primary dark:bg-primary-dark shadow-sm border-y border-slate-600 dark:border-slate-400"
                >
                    <div class="grid py-5 px-2 mx-auto max-w-screen-xl text-sm md:grid-cols-3 md:px-6">
                        <ul class="mb-4 space-y-4 md:mb-0 block">
                            <slot name="dropdown"></slot>
                        </ul>
                    </div>
                </div>
            </transition>
        </ul>
    </transition>
    <!-- Small Navigation Menu -->
</template>
