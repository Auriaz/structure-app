<script setup>

    const props = defineProps({
        actionField: {
            type: Boolean,
            default: false
        },
    });
</script>

<template>
    <nav
        id="navbar"
        class="relative lg:flex lg:items-center w-full lg:mx-auto lg:px-2 "
    >
        <div class="h-full flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <div class="h-full absolute left-0 top-0 flex items-center justify-center">
                <div class="flex items-center justify-center">
                    <span class="flex items-center justify-center">
                        <slot name="bar"></slot>
                    </span>
                </div>

                <div class="relative h-full lg:ml-8">
                    <slot name="logo"></slot>
                </div>
            </div>

            <div class="w-full flex flex-1  md:justify-start lg:justify-end items-center">
                <slot name="content"></slot>
            </div>
        </div>

        <div v-if="actionField" class="relative h-full flex flex-row flex-wrap items-center justify-center">
            <span class="hidden lg:flex h-full items-center justify-center gap-4 border-l-[1px] border-sky-900 px-5 ">
                <slot name="action"></slot>
            </span>

            <span class="hidden lg:flex flex-row h-full flex-wrap gap-4 border-l-[1px] border-sky-900 px-5 uppercase mr-5">
                <slot name="account"></slot>
            </span>
        </div>

        <slot name="dropdown"></slot>
    </nav>
</template>
