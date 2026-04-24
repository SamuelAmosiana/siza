<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps({
    universities: Array,
    filters: Object
});

const search = ref(props.filters.search || '');
const type = ref(props.filters.type || '');

watch([search, type], () => {
    router.get(route('universities.index'), { search: search.value, type: type.value }, {
        preserveState: true,
        replace: true
    });
});
</script>

<template>
    <SizaLayout>
        <Head title="University Directory - SIZA" />

        <div class="bg-emerald-900 py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-4xl font-bold text-white">University Directory</h1>
                <p class="mt-4 text-emerald-100 max-w-2xl mx-auto">Browse through verified higher education institutions in Zambia. Filter by location, name, or institution type.</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-12">
            <!-- Filters -->
            <div class="flex flex-col md:flex-row gap-4 mb-12 bg-white p-6 rounded-2xl shadow-sm border border-emerald-100">
                <div class="flex-1">
                    <label class="block text-xs font-bold text-emerald-900 uppercase tracking-widest mb-2">Search Institutions</label>
                    <input v-model="search" type="text" placeholder="e.g. UNZA, Lusaka..." class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500" />
                </div>
                <div class="w-full md:w-64">
                    <label class="block text-xs font-bold text-emerald-900 uppercase tracking-widest mb-2">Institution Type</label>
                    <select v-model="type" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">All Types</option>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="uni in universities" :key="uni.id" class="bg-white rounded-2xl border border-emerald-100 shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700 uppercase tracking-tight">{{ uni.type }}</span>
                            <span class="text-xs font-bold text-emerald-400">{{ uni.programmes_count }} Programmes</span>
                        </div>
                        <h3 class="text-2xl font-bold text-emerald-900 mb-2">{{ uni.name }}</h3>
                        <p class="text-emerald-600 text-sm font-medium mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ uni.location }}, {{ uni.province }}
                        </p>
                        <p class="text-emerald-700 text-sm line-clamp-3 mb-8 leading-relaxed">{{ uni.description }}</p>
                        <Link :href="route('universities.show', uni.slug)" class="block text-center w-full bg-emerald-50 py-3 rounded-xl font-bold text-emerald-700 hover:bg-emerald-600 hover:text-white transition-all">
                            View Institution
                        </Link>
                    </div>
                </div>
            </div>
            
            <div v-if="universities.length === 0" class="text-center py-20 bg-white rounded-3xl border border-emerald-100">
                <p class="text-emerald-900 font-bold text-xl">No institutions found matching your search.</p>
                <button @click="search = ''; type = ''" class="mt-4 text-emerald-600 font-bold underline">Clear filters</button>
            </div>
        </div>
    </SizaLayout>
</template>
