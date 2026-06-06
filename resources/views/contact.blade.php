@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="bg-white min-h-[80vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-24">
            
            <!-- Left Info Block -->
            <div class="lg:w-5/12">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 tracking-tight mb-6">Get in touch</h1>
                <p class="text-gray-600 text-lg mb-10 leading-relaxed">Whether you have a question about our collections, need help with an order, or want to inquire about wholesale, we'd love to hear from you.</p>
                
                <div class="space-y-8">
                    <!-- Location -->
                    <div class="flex gap-5 items-start group">
                        <div class="w-14 h-14 rounded-2xl bg-brand/10 flex items-center justify-center text-brand flex-shrink-0 group-hover:bg-brand group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div class="pt-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Visit our Studio</h3>
                            <p class="text-gray-600 font-medium">123 Artisan Way<br>Portland, OR 97204</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="flex gap-5 items-start group">
                        <div class="w-14 h-14 rounded-2xl bg-brand/10 flex items-center justify-center text-brand flex-shrink-0 group-hover:bg-brand group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div class="pt-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Email Us</h3>
                            <p class="text-gray-600 font-medium">hello@everclaystudio.com<br>support@everclaystudio.com</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex gap-5 items-start group">
                        <div class="w-14 h-14 rounded-2xl bg-brand/10 flex items-center justify-center text-brand flex-shrink-0 group-hover:bg-brand group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div class="pt-1">
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Call Us</h3>
                            <p class="text-gray-600 font-medium">+1 (555) 123-4567<br>Mon-Fri, 9am to 5pm</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Contact Form -->
            <div class="lg:w-7/12">
                <div class="bg-gray-50 rounded-3xl p-8 lg:p-12 border border-gray-100 shadow-sm">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand shadow-sm transition-all text-gray-900" placeholder="Jane">
                            </div>
                            <div>
                                <label for="last_name" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand shadow-sm transition-all text-gray-900" placeholder="Doe">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand shadow-sm transition-all text-gray-900" placeholder="jane@example.com">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Subject</label>
                            <select id="subject" name="subject" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand shadow-sm transition-all text-gray-900 font-medium">
                                <option>General Inquiry</option>
                                <option>Order Support</option>
                                <option>Wholesale request</option>
                                <option>Press & Media</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand focus:border-brand shadow-sm transition-all text-gray-900" placeholder="How can we help you today?"></textarea>
                        </div>
                        
                        <button type="button" onclick="alert('Message sent successfully!')" class="w-full bg-brand text-white font-bold tracking-wide py-4 rounded-xl shadow-lg shadow-brand/20 hover:bg-brand-dark transition-all transform hover:-translate-y-0.5 flex justify-center items-center gap-2 mt-2">
                            Send Message
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
