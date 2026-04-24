<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    university: Object
});
</script>

<template>
    <SizaLayout>
        <Head :title="university.name + ' - SIZA'" />

        <div class="relative bg-emerald-900 py-24 overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <img :src="university.cover_image || 'https://images.unsplash.com/photo-1541339907198-e08756ebafe3?auto=format&fit=crop&q=80&w=2000'" class="w-full h-full object-cover" />
            </div>
            <div class="relative max-w-7xl mx-auto px-6">
                <Link :href="route('universities.index')" class="text-emerald-300 font-bold flex items-center gap-2 mb-8 hover:text-emerald-100">
                    ← Back to Directory
                </Link>
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                    <div>
                        <span class="inline-flex items-center rounded-full bg-emerald-500/20 text-emerald-300 px-3 py-1 text-sm font-bold uppercase tracking-widest border border-emerald-500/30 mb-4">{{ university.type }} Institution</span>
                        <h1 class="text-4xl md:text-6xl font-black text-white">{{ university.name }}</h1>
                        <p class="mt-4 text-emerald-100 flex items-center gap-2 text-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ university.location }}, {{ university.province }}
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <a v-if="university.website" :href="university.website" target="_blank" class="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-xl font-bold transition-all border border-white/10">Visit Website</a>
                        <Link :href="route('apply.create', { university_id: university.id })" class="bg-emerald-500 hover:bg-emerald-400 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg shadow-emerald-950/50">Apply Now</Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-12">
                <section>
                    <h2 class="text-3xl font-bold text-emerald-900 mb-6 border-b border-emerald-100 pb-4">About the University</h2>
                    <p class="text-lg text-emerald-800 leading-relaxed">{{ university.description }}</p>
                </section>

                <section>
                    <h2 class="text-3xl font-bold text-emerald-900 mb-6 border-b border-emerald-100 pb-4">Available Programmes</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="prog in university.programmes" :key="prog.id" class="p-6 bg-white rounded-2xl border border-emerald-50 shadow-sm hover:shadow-md transition-shadow">
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">{{ prog.level }}</span>
                            <h4 class="text-lg font-bold text-emerald-900 mt-1 mb-4">{{ prog.name }}</h4>
                            <Link :href="route('apply.create', { programme_id: prog.id })" class="text-sm font-bold text-emerald-600 hover:text-emerald-800">Interested in this? Apply →</Link>
                        </div>
                    </div>
                </section>
            </div>

            <div class="space-y-8">
                <div class="bg-emerald-900 rounded-3xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-6">Institution Details</h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-emerald-400 text-xs font-bold uppercase tracking-widest mb-1">Established</p>
                            <p class="font-bold">{{ university.established_year || 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-emerald-400 text-xs font-bold uppercase tracking-widest mb-1">Email</p>
                            <p class="font-bold">{{ university.email || 'Contact through platform' }}</p>
                        </div>
                        <div>
                            <p class="text-emerald-400 text-xs font-bold uppercase tracking-widest mb-1">Phone</p>
                            <p class="font-bold">{{ university.phone || 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-8 border border-emerald-100 shadow-sm">
                    <h3 class="text-xl font-bold text-emerald-900 mb-4">Admissions Open</h3>
                    <p class="text-emerald-700 text-sm mb-6">Start your initial application process today. SIZA helps you send your profile directly to the admissions office.</p>
                    <Link :href="route('apply.create', { university_id: university.id })" class="block text-center w-full bg-emerald-600 text-white py-4 rounded-xl font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-100 transition-all">Start Application</Link>
                </div>
            </div>
        </div>
    </SizaLayout>
</template>
