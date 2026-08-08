<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    stats: Object,
    featured_universities: Array
});

const form = useForm({
    name: '',
    email: '',
    message: ''
});

const submitInquiry = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('message');
        }
    });
};
</script>

<template>
    <SizaLayout>
        <Head title="Study in Zambia - Higher Education Discovery Platform" />

        <!-- 1. Hero Section -->
        <div class="relative bg-emerald-900 overflow-hidden py-24 sm:py-32">
            <div class="absolute inset-0">
                <img src="/images/hero-bg.jpg" alt="SIZA - Study in Zambia" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/95 via-emerald-950/70 to-transparent"></div>
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

        <!-- 2. Stats Section -->
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

        <!-- 3. About Review Section -->
        <div class="py-20 bg-emerald-50/50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left: About Text -->
                    <div class="space-y-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-sm font-semibold tracking-wide uppercase">
                            About SIZA
                        </span>
                        <h2 class="text-3xl font-extrabold text-emerald-950 sm:text-4xl leading-tight">
                            Bridging the Gap in Zambian Higher Education
                        </h2>
                        <p class="text-emerald-800 leading-relaxed text-lg">
                            SIZA (Study In Zambia) is a centralised platform designed to connect prospective local and international students directly with recognized Zambian universities. We remove the clutter, expensive intermediaries, and information barriers of college hunting.
                        </p>
                        <p class="text-emerald-800 leading-relaxed">
                            Specifically optimized to be fast and lightweight, our platform enables users on lower-bandwidth connections to browse accredited universities, search specific academic programmes, review verified fee structures, and express interest directly to university admissions offices.
                        </p>
                        <div class="pt-4 flex flex-col sm:flex-row gap-4">
                            <Link :href="route('about')" class="inline-flex items-center justify-center bg-emerald-800 text-white font-bold py-3 px-6 rounded-full hover:bg-emerald-700 transition-colors">
                                Read More About Us
                            </Link>
                        </div>
                    </div>

                    <!-- Right: About Image Card -->
                    <div class="relative group">
                        <div class="absolute -inset-1.5 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative bg-white p-4 rounded-2xl border border-emerald-100 shadow-md">
                            <img src="/images/about.png" alt="Students studying" class="w-full h-auto rounded-xl object-cover aspect-[4/3] shadow-inner" />
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <h4 class="text-emerald-950 font-bold">Empowering Student Careers</h4>
                                    <p class="text-sm text-emerald-600">Connecting schools, programs, and dreams.</p>
                                </div>
                                <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-lg">Est. 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Featured Universities Section -->
        <div class="py-20 bg-white">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 gap-4">
                    <div class="max-w-2xl">
                        <h2 class="text-3xl font-bold tracking-tight text-emerald-900 sm:text-4xl">Featured Institutions</h2>
                        <p class="mt-4 text-lg leading-8 text-emerald-700">Explore some of the most prestigious universities currently accepting applications.</p>
                    </div>
                    <Link :href="route('universities.index')" class="font-bold text-emerald-600 hover:text-emerald-700 shrink-0">View all universities →</Link>
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

        <!-- 5. Why Choose Us Section -->
        <div class="py-20 bg-emerald-900 text-white">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center space-y-12">
                <div class="max-w-3xl mx-auto space-y-4">
                    <span class="text-emerald-400 font-bold uppercase tracking-wider text-sm">Platform Values</span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl">Why Choose SIZA?</h2>
                    <p class="text-emerald-200">We streamline your higher education search with core values built entirely for student success.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Value 1 -->
                    <div class="bg-emerald-950/60 p-8 rounded-2xl border border-emerald-800 space-y-4 transition-all hover:bg-emerald-950/90 text-left">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-black text-xl">
                            $
                        </div>
                        <h3 class="text-xl font-bold">100% Free Platform</h3>
                        <p class="text-emerald-300 text-sm leading-relaxed">
                            SIZA is completely free. There are no registration costs, agency application fees, or hidden markups. We believe information and entry points should be freely accessible.
                        </p>
                    </div>

                    <!-- Value 2 -->
                    <div class="bg-emerald-950/60 p-8 rounded-2xl border border-emerald-800 space-y-4 transition-all hover:bg-emerald-950/90 text-left">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Strictly HEA Recognized</h3>
                        <p class="text-emerald-300 text-sm leading-relaxed">
                            Rest assured that every university, college, and course listed on our platform is officially recognized and accredited by the Higher Education Authority (HEA) of Zambia.
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div class="bg-emerald-950/60 p-8 rounded-2xl border border-emerald-800 space-y-4 transition-all hover:bg-emerald-950/90 text-left">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">All-in-One Dashboard</h3>
                        <p class="text-emerald-300 text-sm leading-relaxed">
                            Submit expressions of interest to multiple colleges, compare admission criteria, track application status, and communicate directly with staff, all from a unified student portal.
                        </p>
                    </div>
                </div>

                <div class="pt-6">
                    <Link :href="route('apply.create')" class="inline-flex items-center justify-center rounded-full bg-emerald-400 px-8 py-4 text-lg font-bold text-emerald-950 shadow hover:bg-emerald-350 transition-all transform hover:scale-105">
                        Apply Now
                    </Link>
                </div>
            </div>
        </div>

        <!-- 6. Get in Touch Section -->
        <div class="py-20 bg-emerald-50/30">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Left: Contact Details -->
                    <div class="space-y-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-sm font-semibold tracking-wide uppercase">
                            Get In Touch
                        </span>
                        <h2 class="text-3xl font-extrabold text-emerald-950 sm:text-4xl">
                            Have Questions? We are Here to Help.
                        </h2>
                        <p class="text-emerald-800 leading-relaxed">
                            Have questions about our platform, admissions processes, or need assistance applying to a university in Zambia? Drop us a message, and our coordination team will review your inquiry.
                        </p>

                        <div class="space-y-4 pt-4">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-emerald-600 font-bold uppercase tracking-wider">Email Us</p>
                                    <a href="mailto:sianamatesamuel@gmail.com" class="text-emerald-950 font-bold hover:underline">sianamatesamuel@gmail.com</a>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-emerald-600 font-bold uppercase tracking-wider">Call or WhatsApp</p>
                                    <a href="tel:0979667723" class="text-emerald-950 font-bold hover:underline">0979667723</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Contact Form -->
                    <div class="bg-white p-8 rounded-2xl border border-emerald-100 shadow-lg">
                        <h3 class="text-xl font-bold text-emerald-950 mb-4">Send an Inquiry</h3>

                        <!-- Success Alert -->
                        <div v-if="$page.props.flash && $page.props.flash.success" class="mb-6 p-4 rounded-xl bg-emerald-100 border border-emerald-200 text-emerald-900 font-semibold text-sm">
                            {{ $page.props.flash.success }}
                        </div>

                        <form @submit.prevent="submitInquiry" class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-emerald-900 mb-1">Full Name</label>
                                <input v-model="form.name" type="text" placeholder="Enter your name" class="w-full rounded-xl border-emerald-100 focus:border-emerald-500 focus:ring-emerald-500" required />
                                <span v-if="form.errors.name" class="text-red-500 text-xs mt-1 block">{{ form.errors.name }}</span>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-emerald-900 mb-1">Email Address</label>
                                <input v-model="form.email" type="email" placeholder="name@example.com" class="w-full rounded-xl border-emerald-100 focus:border-emerald-500 focus:ring-emerald-500" required />
                                <span v-if="form.errors.email" class="text-red-500 text-xs mt-1 block">{{ form.errors.email }}</span>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-emerald-900 mb-1">Message</label>
                                <textarea v-model="form.message" rows="4" placeholder="How can SIZA help you today?" class="w-full rounded-xl border-emerald-100 focus:border-emerald-500 focus:ring-emerald-500" required></textarea>
                                <span v-if="form.errors.message" class="text-red-500 text-xs mt-1 block">{{ form.errors.message }}</span>
                            </div>

                            <button type="submit" :disabled="form.processing" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-6 rounded-xl transition-all shadow-md flex items-center justify-center">
                                <span v-if="form.processing">Sending...</span>
                                <span v-else>Send Message</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </SizaLayout>
</template>
