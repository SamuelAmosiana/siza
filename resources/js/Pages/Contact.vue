<script setup>
import SizaLayout from '@/Layouts/SizaLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = ref({
    name: '',
    email: '',
    subject: '',
    message: ''
});

const isSubmitted = ref(false);
const isSubmitting = ref(false);

const submitForm = () => {
    isSubmitting.value = true;
    // Simulate API request delay
    setTimeout(() => {
        isSubmitting.value = false;
        isSubmitted.value = true;
        form.value = { name: '', email: '', subject: '', message: '' };
    }, 1500);
};
</script>

<template>
    <SizaLayout>
        <Head title="Contact Support - SIZA (Study in Zambia)" />

        <!-- Hero Section -->
        <div class="relative bg-emerald-900 overflow-hidden py-16 sm:py-24">
            <div class="absolute inset-0">
                <img src="/images/hero-bg.jpg" alt="Contact SIZA" class="w-full h-full object-cover opacity-25 filter blur-xs" />
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/90 to-emerald-50"></div>
            </div>
            
            <div class="relative max-w-5xl mx-auto px-6 lg:px-8 text-center">
                <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-4 py-1.5 text-xs font-semibold text-emerald-300 uppercase tracking-widest mb-6 backdrop-blur-md border border-emerald-500/20">
                    Get in Touch
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl">
                    We Are Here to <span class="text-emerald-400">Help</span>
                </h1>
                <p class="mt-6 text-xl leading-8 text-emerald-100 max-w-3xl mx-auto font-light">
                    Have questions about admissions, accrediting bodies, or how to list your institution? Send us a message or chat with our administrators directly.
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 -mt-8 relative z-10 pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Info Pane -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Cards with details -->
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-emerald-100/50 space-y-6">
                        <h3 class="text-xl font-bold text-emerald-900 border-b border-emerald-50 pb-4">Contact Channels</h3>
                        
                        <!-- Phone -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-emerald-900 text-sm">Call/Phone</h4>
                                <p class="text-emerald-700 text-sm mt-1">0979667723</p>
                                <p class="text-xs text-emerald-500 mt-0.5">Admin Desk (Zambia)</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-emerald-900 text-sm">Email Address</h4>
                                <p class="text-emerald-700 text-sm mt-1 hover:underline">
                                    <a href="mailto:sianamatesamuel@gmail.com">sianamatesamuel@gmail.com</a>
                                </p>
                            </div>
                        </div>

                        <!-- WhatsApp Info -->
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 flex-shrink-0">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.501-5.733-1.455L0 24zm6.59-4.846c1.6.95 3.197 1.45 4.817 1.451 5.25.003 9.524-4.269 9.527-9.522.002-2.546-.988-4.941-2.79-6.744-1.803-1.803-4.198-2.792-6.753-2.793-5.253 0-9.526 4.268-9.53 9.524-.001 1.728.452 3.417 1.312 4.908l-.995 3.633 3.734-.979zm11.168-6.195c-.3-.15-1.774-.875-2.031-.969-.258-.094-.446-.141-.634.141-.188.281-.727.969-.891 1.156-.164.188-.328.211-.627.062-.299-.15-1.262-.465-2.403-1.484-.888-.793-1.488-1.773-1.663-2.072-.175-.299-.019-.461.13-.61.135-.133.3-.347.45-.52.149-.174.199-.297.299-.497.1-.2.05-.375-.025-.524-.075-.15-.634-1.526-.867-2.09-.228-.553-.457-.478-.627-.487-.162-.008-.347-.01-.533-.01-.186 0-.488.07-.742.347-.254.278-.971.949-.971 2.315 0 1.367.994 2.688 1.134 2.875.14.188 1.957 2.988 4.741 4.191.662.286 1.179.457 1.582.585.665.211 1.27.182 1.748.11.533-.08 1.774-.726 2.025-1.43.25-.703.25-1.305.175-1.43-.075-.125-.27-.199-.57-.349z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-emerald-900 text-sm">WhatsApp Admin</h4>
                                <p class="text-emerald-700 text-sm mt-1">0979667723</p>
                                <a href="https://wa.me/260979667723" target="_blank" class="inline-flex items-center text-xs font-bold text-green-600 hover:text-green-500 mt-1">
                                    Open Chat Now →
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Guidelines Box -->
                    <div class="bg-emerald-950 text-emerald-100 rounded-2xl p-8 shadow-xl border border-emerald-800">
                        <h4 class="font-bold text-white text-lg mb-3">Operating Hours</h4>
                        <p class="text-sm text-emerald-200">Our administrators are online during the following hours (Central Africa Time):</p>
                        <ul class="text-xs text-emerald-300 mt-4 space-y-2">
                            <li class="flex justify-between"><span>Monday - Friday</span> <span>08:00 - 17:00</span></li>
                            <li class="flex justify-between"><span>Saturday</span> <span>09:00 - 13:00</span></li>
                            <li class="flex justify-between"><span>Sunday & Holidays</span> <span>Closed</span></li>
                        </ul>
                        
                        <div class="border-t border-emerald-900 mt-6 pt-6">
                            <span class="text-[10px] uppercase font-bold text-emerald-400 tracking-wider">Accreditation Info</span>
                            <p class="text-[11px] text-emerald-300 mt-2 leading-relaxed">
                                SIZA strictly handles admissions and routing questions regarding HEA-accredited institutions. If you represent a newly-licensed school, please have your official accreditation certificates prepared when submitting registration requests.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-xl border border-emerald-100/50 h-full flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-emerald-900 mb-2">Send an Inquiry</h3>
                            <p class="text-emerald-600 text-sm mb-8">
                                Complete the form below and one of our regional coordinators will respond to your registered email address within 24 hours.
                            </p>

                            <!-- Success Banner -->
                            <div v-if="isSubmitted" class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-6 mb-8 flex items-start gap-4">
                                <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-emerald-900">Message Transmitted!</h4>
                                    <p class="text-sm text-emerald-700 mt-1">
                                        Thank you for reaching out to SIZA. A support representative will check your query and email you details soon.
                                    </p>
                                </div>
                            </div>

                            <form v-else @submit.prevent="submitForm" class="space-y-6">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <!-- Name -->
                                    <div>
                                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-emerald-800 mb-2">Your Name</label>
                                        <input 
                                            id="name" 
                                            v-model="form.name" 
                                            type="text" 
                                            required 
                                            placeholder="e.g. Samuel Banda"
                                            class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl px-4 py-3 text-emerald-950 text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all"
                                        />
                                    </div>
                                    
                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-emerald-800 mb-2">Email Address</label>
                                        <input 
                                            id="email" 
                                            v-model="form.email" 
                                            type="email" 
                                            required 
                                            placeholder="e.g. samuel@example.com"
                                            class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl px-4 py-3 text-emerald-950 text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all"
                                        />
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div>
                                    <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-emerald-800 mb-2">Subject of Query</label>
                                    <input 
                                        id="subject" 
                                        v-model="form.subject" 
                                        type="text" 
                                        required 
                                        placeholder="e.g. Admission Requirements for International Students"
                                        class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl px-4 py-3 text-emerald-950 text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all"
                                    />
                                </div>

                                <!-- Message -->
                                <div>
                                    <label for="message" class="block text-xs font-bold uppercase tracking-wider text-emerald-800 mb-2">Message Body</label>
                                    <textarea 
                                        id="message" 
                                        v-model="form.message" 
                                        required 
                                        rows="6" 
                                        placeholder="Please write down details about your question, including specific institutions if applicable..."
                                        class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl px-4 py-3 text-emerald-950 text-sm focus:outline-none focus:border-emerald-500 focus:bg-white transition-all resize-none"
                                    ></textarea>
                                </div>

                                <button 
                                    type="submit" 
                                    :disabled="isSubmitting"
                                    class="w-full bg-emerald-600 hover:bg-emerald-500 text-white rounded-full py-4 text-sm font-bold shadow-md transition-all flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50"
                                >
                                    <span v-if="isSubmitting">Transmitting message...</span>
                                    <span v-else class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        Send Message
                                    </span>
                                </button>
                            </form>
                        </div>

                        <!-- Zero-Charge Banner inside Form Card -->
                        <div class="mt-8 border-t border-emerald-50 pt-8 flex items-center gap-3 text-xs text-emerald-600 bg-emerald-50/30 p-4 rounded-xl">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>
                                <strong>Ethical Notice:</strong> SIZA support is strictly free. We will never ask for credentials, bank accounts, or application fee processing charges.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SizaLayout>
</template>
