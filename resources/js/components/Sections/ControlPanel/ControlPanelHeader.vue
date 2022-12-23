<template>
    <header class="relative  w-full flex justify-start items-center px-6 py-2 space-x-5 rounded-xl">
        <div class="h-full flex flex-row flex-wrap justify-center items-center">
            <h1 class=" font-semibold text-xl text-base-color dark:text-base-dark leading-tight">
                <slot name="title"></slot>
            </h1>
        </div>

        <div class="h-full flex justify-center items-center bg-slate-500/20 px-3 py-2 rounded-lg  space-x-3">
            <slot name="panel"/>
        </div>
    </header>
</template>
