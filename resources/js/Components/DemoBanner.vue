<script setup>
const showBanner = import.meta.env.VITE_SHOW_DEMO_BANNER === 'true';
</script>

<template>
    <div
        v-if="showBanner"
        role="note"
        class="w-full bg-amber-100 px-4 py-2 text-center text-sm font-medium text-amber-900"
    >
        Demo project: please don't submit real information.
    </div>
</template>
