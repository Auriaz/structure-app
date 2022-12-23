<script setup>
    import { computed } from 'vue';

    const props = defineProps({
        href: String,
        active: Boolean,
    });

    const classes = computed(() => {
        return props.active
            ? 'inline-flex items-center cursor-auto bg-active text-sm font-medium leading-5 text-text-muted dark:text-muted-dark focus:outline-none focus:border-focus transition'
            : 'inline-flex items-center border-b-2 border-transparent text-sm font-medium leading-5 text-base-color dark:text-base-dark hover:text-inverted dark:hover:text-inverted-dark hover:bg-hover focus:outline-none focus:border-focus transition';
    });
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
