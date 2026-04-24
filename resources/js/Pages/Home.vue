<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: Object,
    featured_universities: Array
});
</script>

<template>
    <SizaLayout>
        <Head title="Study in Zambia - Higher Education Discovery Platform" />

        <!-- Hero Section -->
        <div class="relative bg-emerald-900 overflow-hidden py-24 sm:py-32">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-950 to-transparent opacity-90"></div>
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&q=80&w=2000" alt="Zambian University" class="w-full h-full object-cover" />
            </div>
            
            <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center sm:text-left">
                <div class="max-w-2xl">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl">
                        Discover Your Future in <span class="text-emerald-400">Zambia</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-emerald-100">
                        The centralized platform for local and international students to explore, compare, and apply to top-tier higher education institutions across the Republic of Zambia.
                    </p>
                    <div class="mt-10 flex items-center justify-center sm:justify-start gap-x-6">
                        <Link :href="route('universities.index')" class="rounded-full bg-emerald-500 px-8 py-4 text-lg font-bold text-white shadow-sm hover:bg-emerald-400 transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-400">
                            Explore Universities
                        </Link>
                        <Link :href="route('programmes.index')" class="text-lg font-semibold leading-6 text-white hover:text-emerald-300">
                            View Programmes <span aria-hidden="true">→</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-white py-12 shadow-sm relative z-10 -mt-10 max-w-5xl mx-auto rounded-2xl border border-emerald-100">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-emerald-50">
                <div class="p-4">
                    <p class="text-4xl font-black text-emerald-600">{{ stats.universities_count }}</p>
                    <p class="text-sm font-bold text-emerald-900 uppercase tracking-widest mt-2">Institutions</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl font-black text-emerald-600">{{ stats.programmes_count }}</p>
                    <p class="text-sm font-bold text-emerald-900 uppercase tracking-widest mt-2">Programmes</p>
                </div>
                <div class="p-4">
                    <p class="text-4xl font-black text-emerald-600">100%</p>
                    <p class="text-sm font-bold text-emerald-900 uppercase tracking-widest mt-2">Centralized</p>
                </div>
            </div>
        </div>

        <!-- Featured Section -->
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex justify-between items-end mb-12">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold tracking-tight text-emerald-900 sm:text-4xl">Featured Institutions</h2>
                        <p class="mt-4 text-lg leading-8 text-emerald-700">Explore some of the most prestigious universities currently accepting applications.</p>
                    </div>
                    <Link :href="route('universities.index')" class="hidden sm:block font-bold text-emerald-600 hover:text-emerald-700">View all universities →</Link>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div v-for="uni in featured_universities" :key="uni.id" class="group relative bg-white rounded-2xl shadow-md overflow-hidden border border-emerald-50 transition-all hover:shadow-xl hover:-translate-y-1">
                        <div class="aspect-video bg-emerald-100">
                            <img :src="uni.cover_image || 'https://images.unsplash.com/photo-1541339907198-e08756ebafe3?auto=format&fit=crop&q=80&w=600'" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" />
                        </div>
                        <div class="p-6">
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700 uppercase mb-2">{{ uni.type }}</span>
                            <h3 class="text-xl font-bold text-emerald-900">{{ uni.name }}</h3>
                            <p class="mt-2 text-sm text-emerald-700 line-clamp-2">{{ uni.description }}</p>
                            <div class="mt-6 flex items-center justify-between">
                                <span class="text-xs font-bold text-emerald-500 uppercase tracking-tight">{{ uni.location }}</span>
                                <Link :href="route('universities.show', uni.slug)" class="text-sm font-bold text-emerald-700 group-hover:text-emerald-500">View Details</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SizaLayout>
</template>
