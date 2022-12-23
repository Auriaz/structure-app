<script setup>
import { ref } from 'vue';
import VTooltip from '@/components/Tooltip/index.vue';

const props = defineProps({
    text: {
        type: String,
        default: 'Click'
    },
    link: {
        type: Boolean,
        default: false
    },
    icon: String,
    to: {
        type: String,
        required: false,
    },
    rounded: {
        type: Boolean,
        default: false,
    },
    icon: {
        type: Boolean,
        default: false,
    },
    type: {
        type: String,
        default: 'button'
    },
    disabled: {
        type: Boolean,
        default: false
    },
    position: {
        type: String,
        default: 'relative',
    },
    href: {
        type: String,
        default: ''
    },
    blank: {
        type: Boolean,
        default: false
    },
    ring: {
        type: Boolean,
        default: false
    },
    tooltip: Object,
    confirm: String,
    confirmText: String,
    confirmButton: String,
    cancelButton: String,

});

const ripple = ref(false);
let isTooltip = ref(false);

// function rippleClick () {
//     ripple.value = !ripple.value;

//     setTimeout(() => {
//     ripple.value = !ripple.value;
//     }, 300);
// }
</script>

<template>
    <button
        @click="rippleClick"
        @mouseover="isTooltip = true"
        @mouseleave="isTooltip = false"
        :type="type"
        class=" transition duration-300 font-bold text-xs cursor-pointer tracking-wider"
        :class="[
            ring ? 'rounded-full' : '',
            icon ? 'p-2' : 'px-5 py-3',
            rounded ? `rounded-lg`: '',
            position ? position : '',
        ]"
        :disabled="disabled"
    >
        <Link v-if="link" class="btn-link flex justify-center item-center  p-1" :confirm="confirm" :confirm-text="confirmText" :confirm-button="confirmButton" :cancel-button="cancelButton"  :href="to">
            <span v-if="icon" class="text-base-color dark:text-base-dark">
                <slot>{{ text }}</slot>
                <slot :name="icon ? true : false"></slot>
            </span>

            <div v-else>
                <slot >{{ text }}</slot>
            </div>
        </Link>

        <a v-else-if="href" :href="href" :target="blank ? '_blank' : ''">
            <span v-if="icon" class="text-base-color dark:text-base-dark" >
                <slot>{{ text }}</slot>
                <slot :name="icon ? true : false"></slot>
            </span>

            <span v-else>
                <slot >{{ text }}</slot>
            </span>
        </a>

        <div v-else>
            <span v-if="icon" class="text-base-color dark:text-base-dark" >
                <slot>{{ text }}</slot>
                <slot :name="icon ? true : false"></slot>
            </span>

            <span v-else>
                <slot >{{ text }}</slot>
            </span>
        </div>

        <v-tooltip
            v-if="tooltip && isTooltip"
            :position="tooltip.position"
            :text="tooltip.text"
        />
    </button>
</template>

<style  scoped>
.btn-link {
    /* line-height: 200%; */
    font-variant: small-caps;
    font-weight: bold;
    text-decoration: none;
}

/* .btn-ripple {
    position: absolute;
    transform: translate(-50%, -50%);
    pointer-events: none;
    border-radius: 50%;
    animation: ripple-btn 0.3s linear infinite;
    z-index: 7;
    background-color: #fff;
    top: 50%;
    left: 50%;
}

@keyframes ripple-btn {
    0% {
        width: 0;
        height: 0;
        opacity: 1;
    }
    25% {
        width: 50%;
        height: 100%;
        opacity: 0.8;
    }
    50% {
        width: 100%;
        height: 200%;
        opacity: 0.6;
    }
    75% {
        width: 150%;
        height: 300%;
        opacity: 0.4;
    }
    100% {
        width: 200%;
        height: 400%;
        opacity: 0.2;
    }
} */
</style>
