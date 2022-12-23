<script setup>
    import VNavbar from '@/components/Navbar/index.vue';

    import { isDark, themeSwitch, themeCheck } from '@/Composables/useTheme.js';
    import sidebar from '@/stores/sidebar.js';

    const props = defineProps({

    });

    function toggleShowSidebar() {
        sidebar.toggleShow();
    }

    function changeSizeSidebar() {
        sidebar.changeSizeSidebar();
    }
</script>

<template>
    <v-navbar action-field>
        <template  #bar>
            <div
                class="flex justify-between lg:border-r-[1px] border-sky-900 px-4"
                :class="[sidebar.isRailSidebar ? '' : 'w-64']"
            >
                <v-btn @click="toggleShowSidebar()" class=" bg-slate-400/80 hover:bg-slate-600/80" color="secondary" rounded icon>
                    <i v-if="sidebar.isShowSidebar" class="text-lg fa-solid fa-xmark" ></i>
                    <i v-else class="text-lg fa-solid fa-bars" ></i>
                </v-btn>

                <v-btn v-if="sidebar.isShowSidebar" @click="changeSizeSidebar()" color="secondary" class="hidden lg:inline-block ml-3 bg-slate-400/80 hover:bg-slate-600/80" rounded icon>
                    <i class="text-lg transition-all duration-300 ease-in fa-solid fa-arrow-left" :class="{'rotate-180' : sidebar.isRailSidebar}"></i>
                </v-btn>
            </div>

            <v-search
                class="hidden lg:inline-block ml-8"
                color="green"
                icon-color="green"
                icon
            />
        </template>

        <template #logo>
            <!-- Page Heading -->

        </template>

        <template #action>
            <v-btn @click="themeSwitch" color="secondary" :tooltip="{text: `Zmień motyw na ${isDark ? 'jasny' : 'ciemny'}`}" flat icon>
                <i v-if="isDark" class="text-lg fa-solid fa-sun" ></i>
                <i v-else class="text-lg fa-solid fa-moon" icon="" ></i>
            </v-btn>
        </template>

        <template #account>
            <slot name="account"></slot>
        </template>
    </v-navbar>
</template>