<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isMenuOpen = ref(false);
</script>

<template>
    <div class="min-h-screen bg-emerald-50">
        <!-- Navigation -->
        <nav class="bg-emerald-900 text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <Link :href="route('home')" class="text-2xl font-bold tracking-tight text-white">
                            SIZA<span class="text-emerald-400">.</span>
                        </Link>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8">
                        <Link :href="route('home')" :class="{'text-emerald-400': $page.component === 'Home'}" class="hover:text-emerald-300 transition-colors font-medium">Home</Link>
                        <Link :href="route('universities.index')" :class="{'text-emerald-400': $page.component === 'Universities/Index'}" class="hover:text-emerald-300 transition-colors font-medium">Universities</Link>
                        <Link :href="route('programmes.index')" :class="{'text-emerald-400': $page.component === 'Programmes/Index'}" class="hover:text-emerald-300 transition-colors font-medium">Programmes</Link>
                        <Link :href="route('apply.create')" class="bg-emerald-500 hover:bg-emerald-600 px-5 py-2 rounded-full font-bold transition-all transform hover:scale-105">Apply Now</Link>
                    </div>

                    <!-- Mobile Toggle -->
                    <div class="md:hidden flex items-center">
                        <button @click="isMenuOpen = !isMenuOpen" class="text-emerald-300 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-show="isMenuOpen" class="md:hidden bg-emerald-800 border-t border-emerald-700 px-4 pt-2 pb-4 space-y-1">
                <Link :href="route('home')" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Home</Link>
                <Link :href="route('universities.index')" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Universities</Link>
                <Link :href="route('programmes.index')" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Programmes</Link>
                <Link :href="route('apply.create')" class="block px-3 py-2 bg-emerald-500 rounded-md font-bold text-center">Apply Now</Link>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-emerald-950 text-emerald-200 py-12 mt-20 border-t border-emerald-800">
            <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white text-xl font-bold mb-4">SIZA</h3>
                    <p class="text-sm">Connecting ambitious students with world-class education in Zambia. Your journey starts here.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><Link :href="route('universities.index')" class="hover:text-emerald-400">University Directory</Link></li>
                        <li><Link :href="route('programmes.index')" class="hover:text-emerald-400">Available Programmes</Link></li>
                        <li><Link :href="route('apply.create')" class="hover:text-emerald-400">Online Application</Link></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contact Us</h4>
                    <p class="text-sm">Email: sianamatesamuel@gmail.com</p>
                    <p class="text-sm">Phone: 0979667723</p>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 mt-12 pt-8 border-t border-emerald-900 text-center text-xs">
                &copy; {{ new Date().getFullYear() }} SIZA - Study In Zambia. All Rights Reserved.
            </div>
        </footer>
    </div>
</template>
