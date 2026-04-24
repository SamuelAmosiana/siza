<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    universities: Array,
    selected_programme: Object
});

const form = useForm({
    university_id: props.selected_programme ? props.selected_programme.university_id : '',
    programme_id: props.selected_programme ? props.selected_programme.id : '',
    full_name: '',
    email: '',
    phone: '',
    nationality: '',
    personal_statement: '',
});

const submit = () => {
    form.post(route('apply.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <SizaLayout>
        <Head title="Submit Application - SIZA" />

        <div class="bg-emerald-900 py-20">
            <div class="max-w-3xl mx-auto px-6 text-center text-white">
                <h1 class="text-4xl font-black mb-4">Start Your Journey</h1>
                <p class="text-emerald-300">Submit your initial interest application to your preferred Zambian institution.</p>
            </div>
        </div>

        <div class="max-w-3xl mx-auto px-6 -mt-10 pb-20">
            <form @submit.prevent="submit" class="bg-white rounded-3xl shadow-xl border border-emerald-50 p-8 md:p-12 space-y-8">
                <!-- Programme Info -->
                <div v-if="selected_programme" class="bg-emerald-50 p-6 rounded-2xl border border-emerald-100 mb-10">
                    <p class="text-xs font-bold text-emerald-500 uppercase tracking-widest mb-1">Applying For</p>
                    <h3 class="text-xl font-bold text-emerald-900">{{ selected_programme.name }}</h3>
                    <p class="text-emerald-700 text-sm">{{ selected_programme.university.name }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Institution</label>
                        <select v-model="form.university_id" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" :disabled="selected_programme">
                            <option value="">Select University</option>
                            <option v-for="uni in universities" :key="uni.id" :value="uni.id">{{ uni.name }}</option>
                        </select>
                        <p v-if="form.errors.university_id" class="mt-1 text-sm text-red-600 font-medium">{{ form.errors.university_id }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Full Name</label>
                        <input v-model="form.full_name" type="text" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" placeholder="Enter your full name" />
                        <p v-if="form.errors.full_name" class="mt-1 text-sm text-red-600 font-medium">{{ form.errors.full_name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Email Address</label>
                        <input v-model="form.email" type="email" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" placeholder="e.g. name@example.com" />
                        <p v-if="form.errors.email" class="mt-1 text-sm text-red-600 font-medium">{{ form.errors.email }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Phone Number</label>
                        <input v-model="form.phone" type="text" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" placeholder="e.g. +260..." />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Nationality</label>
                        <input v-model="form.nationality" type="text" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" placeholder="e.g. Zambian, Kenyan..." />
                        <p v-if="form.errors.nationality" class="mt-1 text-sm text-red-600 font-medium">{{ form.errors.nationality }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-emerald-900 mb-2">Personal Statement / Inquiry</label>
                        <textarea v-model="form.personal_statement" rows="5" class="w-full rounded-xl border-emerald-100 focus:ring-emerald-500 focus:border-emerald-500 py-3" placeholder="Tell the admissions office why you are interested in this programme..."></textarea>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" :disabled="form.processing" class="w-full bg-emerald-600 text-white py-5 rounded-2xl font-bold text-xl hover:bg-emerald-700 transition-all shadow-xl shadow-emerald-100 flex items-center justify-center gap-3">
                        <span v-if="form.processing">Processing...</span>
                        <span v-else>Submit Application</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                    </button>
                    <p class="mt-4 text-center text-xs text-emerald-500 font-medium tracking-tight uppercase">Safe & Secure Submission via SIZA Discovery platform</p>
                </div>
            </form>
        </div>
    </SizaLayout>
</template>
