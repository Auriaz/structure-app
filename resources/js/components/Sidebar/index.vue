<script setup>
import { ref, onMounted } from 'vue';
import sidebar from '@/stores/sidebar.js';

</script>

<template>
    <transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="transform opacity-0 -translate-x-64"
        enter-to-class="transform opacity-100 translate-x-0"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="transform opacity-100 translate-x-0"
        leave-to-class="transform opacity-0 -translate-x-64"
    >
        <div
            v-if="sidebar.isShowSidebar"
            class="fixed top-0 left-0 lg:relative flex  col-auto min-h-full z-30 bg-gradient-to-br from-secondary via-primary to-primary dark:g-gradient-to-r dark:from-secondary-dark dark:via-primary-dark dark:to-primary-dark shadow-lg shadow-tertiary overflow-hidden"
            :class="[
                sidebar.isRightSide ? 'right-0' : 'left-0',
                sidebar.isRailSidebar ? 'w-14' : 'w-64'
            ]"
        >

            <div
                :class="[
                    sidebar.isRailSidebar ? 'w-14' : 'w-64',
                ]"
                class="fixed pt-20 lg:pt-12 left-0 top-0 h-screen overflow-auto  overscroll-contain box-border flex flex-col justify-between"
            >

                <div class="w-full">
                    <!--
                    <div class="flex lg:hidden px-4 transition-all duration-300 ease-in">
                        <v-btn v-if="isRailSidebar" color="secondary" flat icon>
                            <i   class="text-lg hover:text-hover fa-solid fa-magnifying-glass"></i>
                        </v-btn>

                        <v-search v-else />
                    </div>

                    <v-border class="flex lg:hidden" yt="4" yb="4" color="green"/>
                    -->


                    <nav class="px-2 pt-4">
                        <ul class="flex flex-col transition-all duration-300 ease-in" :class="[sidebar.isRailSidebar ? 'w-10' : 'w-full']">
                            <slot name="dashboard-link"></slot>
                        </ul>

                        <ul  class="flex flex-col transition-all duration-300" :class="[sidebar.isRailSidebar ? 'w-10' : 'w-full']">
                            <slot name="admin-link"></slot>
                        </ul>
                    </nav>

                </div>

                <div class="ease-in mb-12">
                    <div class="flex items-center justify-start " :class="[sidebar.isRailSidebar ? 'flex-col': 'flex-row']">

                    </div>

                    <v-border yt="4" yb="4" color="green"/>

                    <div class="px-2 pt-4">
                        <ul class="flex flex-col space-y-2 transition-all duration-300 ease-in">
                            <slot name="setting-link"></slot>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
