<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <SizaLayout>
        <Head title="About Us - SIZA (Study in Zambia)" />

        <!-- About Hero Section -->
        <div class="relative bg-emerald-900 overflow-hidden py-20 sm:py-28">
            <div class="absolute inset-0">
                <img src="/images/hero-bg.jpg" alt="Study in Zambia" class="w-full h-full object-cover opacity-25 filter blur-xs" />
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/90 to-emerald-50"></div>
            </div>
            
            <div class="relative max-w-5xl mx-auto px-6 lg:px-8 text-center">
                <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-4 py-1.5 text-xs font-semibold text-emerald-300 uppercase tracking-widest mb-6 backdrop-blur-md border border-emerald-500/20">
                    Our Mission
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl">
                    Bridging Education and <span class="text-emerald-400">Opportunity</span>
                </h1>
                <p class="mt-6 text-xl leading-8 text-emerald-100 max-w-3xl mx-auto font-light">
                    SIZA (Study In Zambia) is a centralized higher-education discovery platform designed to simplify, illuminate, and democratize the journey to higher learning across Zambia.
                </p>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 -mt-8 relative z-10">
            <!-- Core Core Value Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1: 100% Free -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-emerald-100/50 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-emerald-900 mb-3">100% Free Platform</h3>
                    <p class="text-emerald-700 leading-relaxed text-sm">
                        Zero application fees, zero registration fees, and zero hidden costs. SIZA is completely free for all prospective students globally.
                    </p>
                </div>

                <!-- Card 2: HEA Recognized -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-emerald-100/50 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-emerald-900 mb-3">Strictly HEA Recognized</h3>
                    <p class="text-emerald-700 leading-relaxed text-sm">
                        We list only institutions officially registered and recognized by the Higher Education Authority (HEA) of Zambia, guaranteeing quality and legitimacy.
                    </p>
                </div>

                <!-- Card 3: Centralized Discovery -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-emerald-100/50 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-emerald-900 mb-3">All-in-One Dashboard</h3>
                    <p class="text-emerald-700 leading-relaxed text-sm">
                        Search and filter universities, compare academic programmes, and express interest in secondary, college, and tertiary institutions in one unified place.
                    </p>
                </div>
            </div>

            <!-- Detailed Presentation -->
            <div class="py-20 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-emerald-900 sm:text-4xl tracking-tight">
                        Connecting Prospective Students with World-Class Education
                    </h2>
                    <p class="mt-6 text-lg text-emerald-800 leading-relaxed">
                        SIZA acts as a digital bridge between students—both local Zambian citizens and international prospects—and the leading educational entities of Zambia. We address the systemic information gap that often isolates remote or global students from discoverable academic paths.
                    </p>
                    <p class="mt-4 text-emerald-700 leading-relaxed">
                        Whether your interest lies in historic public research universities, state-of-the-art private colleges, or distinguished secondary institutions, SIZA hosts a curated space to evaluate structures, courses, and qualifications under a single, user-friendly portal.
                    </p>

                    <div class="mt-8 border-l-4 border-emerald-500 pl-4 italic text-emerald-800 bg-emerald-50/50 py-3 pr-2 rounded-r-xl">
                        "Our goal is to ensure that no aspiring student is limited by a lack of accessible information. Education is the foundation of national development."
                    </div>
                </div>

                <div class="space-y-8">
                    <!-- Feature Row 1 -->
                    <div class="flex gap-4">
                        <div class="flex-none w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-emerald-900 text-lg">Universities & Colleges</h4>
                            <p class="text-emerald-700 text-sm mt-1">Explore top public and private tertiary institutions, and discover their unique research programs, amenities, and campus locations.</p>
                        </div>
                    </div>
                    <!-- Feature Row 2 -->
                    <div class="flex gap-4">
                        <div class="flex-none w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-emerald-900 text-lg">Comprehensive Secondary Schools</h4>
                            <p class="text-emerald-700 text-sm mt-1">Discover distinguished boarding and day schools across provinces to lay a strong foundation for future university success.</p>
                        </div>
                    </div>
                    <!-- Feature Row 3 -->
                    <div class="flex gap-4">
                        <div class="flex-none w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-emerald-900 text-lg">Simplified Applications</h4>
                            <p class="text-emerald-700 text-sm mt-1">Submit interest requests to multiple institutions concurrently without filling out complex, repetitive application portals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Zero-Fee / Ethical Policy Banner Section -->
            <div class="relative bg-emerald-950 rounded-3xl overflow-hidden shadow-2xl py-12 px-8 sm:px-16 text-white mb-20 border border-emerald-800">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,0.15),transparent)]"></div>
                <div class="relative max-w-3xl">
                    <span class="inline-flex items-center rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-bold text-emerald-400 uppercase tracking-widest mb-4">
                        Zero Profit & Legal Policy
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl tracking-tight">Our Absolute Financial & Ethical Guarantee</h2>
                    <p class="mt-6 text-emerald-200 leading-relaxed">
                        SIZA operates as a <strong>completely free, non-commercial service platform</strong>. We do not extract profits, charge placement fees, or accept commissions from either prospective applicants or standard listings.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 border-t border-emerald-900 pt-8">
                        <div>
                            <h4 class="font-bold text-emerald-400 flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                                No Application Fees
                            </h4>
                            <p class="text-emerald-300 text-sm mt-2">
                                SIZA will <strong>never</strong> request money, transaction charges, or processing fees from students under any pretext.
                            </p>
                        </div>
                        <div>
                            <h4 class="font-bold text-emerald-400 flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                HEA Registration Only
                            </h4>
                            <p class="text-emerald-300 text-sm mt-2">
                                We maintain a rigorous screening policy. SIZA lists only institutions that possess active status and accreditation with the Higher Education Authority (HEA) of Zambia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Final Call To Action -->
            <div class="text-center pb-20">
                <h3 class="text-2xl font-bold text-emerald-900 mb-6">Ready to explore higher education opportunities in Zambia?</h3>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <Link :href="route('universities.index')" class="w-full sm:w-auto rounded-full bg-emerald-600 px-8 py-4 text-lg font-bold text-white shadow-md hover:bg-emerald-500 transition-all transform hover:scale-102">
                        Browse Universities
                    </Link>
                    <Link :href="route('apply.create')" class="w-full sm:w-auto rounded-full bg-white border-2 border-emerald-600 text-emerald-700 px-8 py-4 text-lg font-bold hover:bg-emerald-50 transition-all transform hover:scale-102">
                        Apply Online for Free
                    </Link>
                </div>
            </div>
        </div>
    </SizaLayout>
</template>
