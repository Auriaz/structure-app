<script setup>
    import { computed } from 'vue';

const props = defineProps({
    yt: {
        type: String,
        default: 8
    },

    yb: {
        type: String,
        default: 8
    },
    color: {
        type: String,
        default: 'green'
    }
});

const ytClass = computed(() => {
    return {
        '0': 'pt-0',
        '2': 'pt-2',
        '4': 'pt-4',
        '8': 'pt-8',
    }[props.yt.toString()];
});

const ybClass = computed(() => {
    return {
        '0': 'pb-0',
        '2': 'pb-2',
        '4': 'pb-4',
        '8': 'pb-8',
    }[props.yb.toString()];
});

const colorClass = computed(() => {
    return {
        'red': 'border-red-500',
        'orange': 'border-orange-500',
        'yellow': 'border-yellow-500',
        'green': 'border-green-500',
        'lime': 'border-lime-500',
        'sky': 'border-sky-500',
        'blue': 'border-blue-500',
        'slate': 'border-slate-500',
    }[props.color];
});
</script>

<template>
    <div class="hidden sm:block">
        <div :class="[ybClass, ytClass]">
            <div class="border-t" :class="colorClass" />
        </div>
    </div>
</template>
