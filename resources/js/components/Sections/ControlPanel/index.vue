<script setup>
    import { ref } from '@vue/reactivity';

    import VControlPanelHeader from '@/components/Sections/ControlPanel/ControlPanelHeader.vue';

    let props = defineProps({
        sidebar: {
            type: Boolean,
            default: false
        },
        isShowSidebar: {
            type: Boolean,
            default: false
        },
        container: {
            type: Boolean,
            default: false
        },
    });
</script>

<template>
    <section
        class="relative w-full  mx-auto px-6 pt-6"
        :class="[
            container ? 'container' : ''
        ]"
    >
        <v-control-panel-header>
            <template #title>
                <slot name="header-title"></slot>
            </template>

            <template #panel>
                <div class="flex items-center">
                    <div class="flex justify-end space-x-3">
                        <slot name="header-panel"></slot>

                        <v-btn
                            v-if="sidebar"
                            @click="isShowSidebar = !isShowSidebar"
                            class="group bg-green-500  hover:bg-hover"
                            :tooltip="{text: 'Ustawienia'}"
                            rounded
                            icon
                        >
                            <i class="fas fa-tools fa-xl text-white group-hover:bg-hover-item"></i>
                        </v-btn>
                    </div>
                </div>
            </template>
        </v-control-panel-header>

        <div class="w-full ">
            <slot name="main" />
        </div>

        <div v-if="sidebar && isShowSidebar" @click="isShowSidebar = false" class="w-screen h-screen fixed top-0 right-0 z-40 bg-slate-800/40 cursor-pointer"></div>

        <transition
            enter-active-class="transition ease-out duration-300"
            enter-from-class="transform  translate-x-96"
            enter-to-class="transform  translate-x-0"
            leave-active-class="transition ease-in duration-300"
            leave-from-class="transform  translate-x-0"
            leave-to-class="transform  translate-x-96"
        >
            <div v-if="sidebar && isShowSidebar"  class="fixed top-0 right-0 w-96 h-screen bg-secondary dark:bg-secondary-dark z-50 border-l border-green-500">
                <slot name="sidebar" />
            </div>
        </transition>
    </section>
</template>
