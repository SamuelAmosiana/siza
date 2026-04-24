<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    programmes: Array,
    filters: Object
});

const search = ref(props.filters.search || '');
const level = ref(props.filters.level || '');

watch([search, level], () => {
    router.get(route('programmes.index'), { search: search.value, level: level.value }, {
        preserveState: true,
        replace: true
    });
});
</script>

<template>
    <SizaLayout>
        <Head title="Academic Programmes - SIZA" />

        <div class="bg-emerald-900 py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-4xl font-bold text-white">Find Your Programme</h1>
                <p class="mt-4 text-emerald-100 max-w-2xl mx-auto">Explore certificates, diplomas, and degrees offered by Zambian universities.</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-12">
            <!-- Search & Filters -->
            <div class="flex flex-col md:flex-row gap-4 mb-12">
                <div class="flex-1 bg-white rounded-2xl shadow-sm border border-emerald-100 flex items-center px-6">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input v-model="search" type="text" placeholder="Search by programme name or faculty..." class="w-full border-none focus:ring-0 bg-transparent py-4 placeholder-emerald-300 text-emerald-900 font-medium" />
                </div>
                <select v-model="level" class="w-full md:w-64 rounded-2xl border-emerald-100 shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-emerald-900 font-bold px-6">
                    <option value="">All Levels</option>
                    <option value="certificate">Certificate</option>
                    <option value="diploma">Diploma</option>
                    <option value="bachelor">Bachelor's Degree</option>
                    <option value="master">Master's Degree</option>
                    <option value="doctorate">Doctorate</option>
                </select>
            </div>

            <!-- List -->
            <div class="space-y-4">
                <div v-for="prog in programmes" :key="prog.id" class="group bg-white p-6 rounded-2xl border border-emerald-50 shadow-sm hover:border-emerald-300 transition-all flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold uppercase">{{ prog.level }}</span>
                            <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">{{ prog.faculty }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-900 group-hover:text-emerald-600 transition-colors">{{ prog.name }}</h3>
                        <p class="text-sm text-emerald-500 font-medium mt-1">{{ prog.university.name }} • {{ prog.duration_years }} Years • {{ prog.study_mode }}</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <Link :href="route('apply.create', { programme_id: prog.id })" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-emerald-700 transition-colors whitespace-nowrap shadow-md shadow-emerald-100">
                            Apply Now
                        </Link>
                    </div>
                </div>
            </div>

            <div v-if="programmes.length === 0" class="text-center py-20">
                <p class="text-emerald-900 font-bold text-xl">No programmes found matching your search.</p>
                <button @click="search = ''; level = ''" class="mt-4 text-emerald-600 font-bold underline">Show all programmes</button>
            </div>
        </div>
    </SizaLayout>
</template>
