<script setup>
import { ref } from "@vue/reactivity";

const props = defineProps({
    link: Object,
    href: String,
    name: String,
    icon: {
        type: Boolean,
        default: false,
    },
    iconName: String,
    active: {
        type: Number,
        default: 0
    },
    isRailSidebar: {
        type: Boolean,
        default: false
    },
    children: {
        type: Boolean,
        default: false
    },
    open: {
        type: Boolean,
        default: false
    },
});

</script>

<template>
    <li class="relative text-base-color dark:text-base-dark mt-4">
        <Link v-if="!children" class="flex group items-center h-10 w-full  rounded" :href="href" :active="active"  :class="active === 1 ? 'text-active' : 'hover:bg-hover'">
            <div class="flex justify-center w-10 items-center ">
                <i class="text-2xl " :class="[iconName, active === 1 ? 'text-active-item cursor-none' : 'group-hover:text-hover-item']"></i>
            </div>

            <span class="ml-3 text-base-color dark:text-base-dark" v-if="!isRailSidebar" >{{ name }}</span>
        </Link>

       <div
            v-else
            :class="[
                active === 1 ? 'text-active' : 'cursor-pointer',
                open ? 'font-semibold text-active' : 'font-medium'
            ]"
            @click="open = !open"
            class="flex justify-between items-center group  h-10 w-full rounded  hover:bg-hover"
        >
           <div class="flex items-center">
               <div class="flex justify-center w-10 items-center">
                   <i class="text-2xl group-hover:text-hover-item" :class="iconName"></i>
               </div>

               <span class="ml-3 text-base-color dark:text-base-dark" v-if="!isRailSidebar" >{{ name }}</span>
           </div>

            <span v-if="children">
                <v-btn  icon>
                    <i class="fas fa-angle-down transition-all duration-200 ease-in group-hover:text-hover-item" :class="open ? 'fa-rotate-180 text-active' : 'fa-rotate-0 text-base-color dark:text-base-dark'"></i>
                </v-btn>
            </span>
        </div>

        <div class="overflow-hidden">
            <transition
                enter-active-class="transition ease-out duration-300"
                enter-from-class="transform opacity-0 -translate-y-[100%]"
                enter-to-class="transform opacity-100 translate-x-0"
                leave-active-class="transition ease-in duration-300"
                leave-from-class="transform opacity-100 translate-x-0"
                leave-to-class="transform opacity-0 -translate-y-[100%]"
            >
                <ul v-show="children && open" :class="[isRailSidebar ? 'w-10' : 'w-full pl-5']">
                    <slot name="children"></slot>
                </ul>
            </transition>
        </div>
    </li>
</template>
