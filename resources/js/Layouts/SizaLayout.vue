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
                        <Link :href="route('home')" class="flex items-center py-1">
                            <img src="/images/siza_logo.png" alt="SIZA - Study in Zambia" class="h-10 w-auto object-contain" />
                        </Link>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-6">
                        <Link :href="route('universities.index')" :class="{'text-emerald-400': $page.component.startsWith('Universities/')}" class="hover:text-emerald-300 transition-colors font-medium">Institutions</Link>
                        <Link :href="route('programmes.index')" :class="{'text-emerald-400': $page.component.startsWith('Programmes/')}" class="hover:text-emerald-300 transition-colors font-medium">Programmes</Link>
                        <Link :href="route('about')" :class="{'text-emerald-400': $page.component === 'About'}" class="hover:text-emerald-300 transition-colors font-medium">About</Link>
                        <Link :href="route('contact')" :class="{'text-emerald-400': $page.component === 'Contact'}" class="hover:text-emerald-300 transition-colors font-medium">Contact</Link>
                        <Link :href="route('apply.create')" class="bg-emerald-500 hover:bg-emerald-600 px-4 py-2 rounded-full font-bold transition-all transform hover:scale-105">Apply Now</Link>
                        <a href="https://wa.me/260979667723" target="_blank" class="flex items-center gap-1.5 bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-full font-bold transition-all transform hover:scale-105">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.501-5.733-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.45 4.817 1.451 5.25.003 9.524-4.269 9.527-9.522.002-2.546-.988-4.941-2.79-6.744-1.803-1.803-4.198-2.792-6.753-2.793-5.253 0-9.526 4.268-9.53 9.524-.001 1.728.452 3.417 1.312 4.908l-.995 3.633 3.734-.979zm11.168-6.195c-.3-.15-1.774-.875-2.031-.969-.258-.094-.446-.141-.634.141-.188.281-.727.969-.891 1.156-.164.188-.328.211-.627.062-.299-.15-1.262-.465-2.403-1.484-.888-.793-1.488-1.773-1.663-2.072-.175-.299-.019-.461.13-.61.135-.133.3-.347.45-.52.149-.174.199-.297.299-.497.1-.2.05-.375-.025-.524-.075-.15-.634-1.526-.867-2.09-.228-.553-.457-.478-.627-.487-.162-.008-.347-.01-.533-.01-.186 0-.488.07-.742.347-.254.278-.971.949-.971 2.315 0 1.367.994 2.688 1.134 2.875.14.188 1.957 2.988 4.741 4.191.662.286 1.179.457 1.582.585.665.211 1.27.182 1.748.11.533-.08 1.774-.726 2.025-1.43.25-.703.25-1.305.175-1.43-.075-.125-.27-.199-.57-.349z"/>
                            </svg>
                            <span>Chat with us</span>
                        </a>
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
            <div v-show="isMenuOpen" class="md:hidden bg-emerald-800 border-t border-emerald-700 px-4 pt-2 pb-4 space-y-2">
                <Link :href="route('universities.index')" :class="{'text-emerald-400': $page.component.startsWith('Universities/')}" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Institutions</Link>
                <Link :href="route('programmes.index')" :class="{'text-emerald-400': $page.component.startsWith('Programmes/')}" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Programmes</Link>
                <Link :href="route('about')" :class="{'text-emerald-400': $page.component === 'About'}" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">About</Link>
                <Link :href="route('contact')" :class="{'text-emerald-400': $page.component === 'Contact'}" class="block px-3 py-2 rounded-md hover:bg-emerald-700 font-medium">Contact</Link>
                <div class="pt-2 border-t border-emerald-700 space-y-2">
                    <Link :href="route('apply.create')" class="block px-3 py-2 bg-emerald-500 rounded-md font-bold text-center text-white">Apply Now</Link>
                    <a href="https://wa.me/260979667723" target="_blank" class="flex items-center justify-center gap-1.5 px-3 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md font-bold text-center">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.501-5.733-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.45 4.817 1.451 5.25.003 9.524-4.269 9.527-9.522.002-2.546-.988-4.941-2.79-6.744-1.803-1.803-4.198-2.792-6.753-2.793-5.253 0-9.526 4.268-9.53 9.524-.001 1.728.452 3.417 1.312 4.908l-.995 3.633 3.734-.979zm11.168-6.195c-.3-.15-1.774-.875-2.031-.969-.258-.094-.446-.141-.634.141-.188.281-.727.969-.891 1.156-.164.188-.328.211-.627.062-.299-.15-1.262-.465-2.403-1.484-.888-.793-1.488-1.773-1.663-2.072-.175-.299-.019-.461.13-.61.135-.133.3-.347.45-.52.149-.174.199-.297.299-.497.1-.2.05-.375-.025-.524-.075-.15-.634-1.526-.867-2.09-.228-.553-.457-.478-.627-.487-.162-.008-.347-.01-.533-.01-.186 0-.488.07-.742.347-.254.278-.971.949-.971 2.315 0 1.367.994 2.688 1.134 2.875.14.188 1.957 2.988 4.741 4.191.662.286 1.179.457 1.582.585.665.211 1.27.182 1.748.11.533-.08 1.774-.726 2.025-1.43.25-.703.25-1.305.175-1.43-.075-.125-.27-.199-.57-.349z"/>
                        </svg>
                        <span>Chat with us</span>
                    </a>
                </div>
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
                        <li><Link :href="route('universities.index')" class="hover:text-emerald-400">Institution Directory</Link></li>
                        <li><Link :href="route('programmes.index')" class="hover:text-emerald-400">Available Programmes</Link></li>
                        <li><Link :href="route('about')" class="hover:text-emerald-400">About SIZA</Link></li>
                        <li><Link :href="route('contact')" class="hover:text-emerald-400">Contact Support</Link></li>
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
