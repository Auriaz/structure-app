<script setup>
import { computed, ref, watch } from "@vue/runtime-core";

const props = defineProps({
    color: {
        type: String,
        default: 'blue'
    },
    placeholder: {
        type: String,
        default: 'Szukaj'
    },
    icon: {
        type: Boolean,
        default: false
    },
    rightIcon: {
        type: Boolean,
        default: false
    },
    iconPosition: {
        type: String,
        default: 'left'
    },
    iconColor: {
        type: String,
        default: 'blue'
    }
});

const emit = defineEmits([
    'modelValue'
]);

const text = ref('');

let inputColor = computed(() => {
    return {
        'blue' : 'text-blue-500 focus:text-blue-600 border-blue-500 focus:border-blue-600 placeholder-blue-600',
        'red' : 'text-red-500 focus:text-red-600 border-red-500 focus:border-red-600 placeholder-red-600',
        'green' : 'text-green-500 focus:text-green-600 border-green-500 focus:border-green-600 placeholder-green-600',
        'info' : 'text-info focus:text-info border-info focus:border-info placeholder-info',
        'error' : 'text-error focus:text-error border-error focus:border-error placeholder-error',
        'success' : 'text-success focus:text-success border-success focus:border-success placeholder-success',
    } [ props.color]
});

let iconColor = computed(() => {
    return {
        'blue' : 'text-blue-600',
        'red' : 'text-red-600',
        'green' : 'text-green-600',
        'info' : 'text-info ',
        'error' : 'text-error',
        'success' : 'text-success',
    } [props.iconColor ? props.iconColor : props.color]
});

watch(() => text.value, (value) => {
    emit('modelValue', value);
});
</script>

<template>
    <div class="relative">
        <div
            v-if="icon"
            :class="[iconColor, iconPosition === 'left' ? 'left-0' : 'right-0']"
            class="absolute inset-y-0 flex items-center p-3"
        >
            <i class="fas fa-search"></i>
        </div>

        <div
            v-if="rightIcon"
            :class="[iconColor]"
            class="absolute inset-y-0 right-0 flex items-center p-3"
        >
            <i class="fas fa-search"></i>
        </div>

        <input
            v-model="text"
            :class="[inputColor, icon & iconPosition === 'left' ? 'pl-10' : 'pl-3']"
            :placeholder="placeholder"
            class="block px-3 pb-2 h-9 pt-2 w-full text-sm rounded-2xl border-1 bg-background dark:bg-background-dark appearance-none focus:right-1 focus:outline-none focus:ring-1 left-3"
            type="search"
            autofocus
        />
    </div>
</template>
