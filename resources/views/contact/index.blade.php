<x-app-layout>
    <!-- Professional Contact Page -->
    <div class="relative min-h-screen">
        <!-- Background matching homepage -->
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-800 to-black">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image: 
                    linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                    background-size: 30px 30px;">
                </div>
            </div>
        </div>
        
        <!-- Ambient effects -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-900/10 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-900/10 rounded-full filter blur-3xl"></div>
        
        <!-- Content -->
        <div class="relative z-10 py-24 px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Page Header -->
                <div class="text-center mb-16">
                    <h1 class="text-5xl md:text-6xl font-black mb-4 tracking-wide">
                        <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                            Contact Us
                        </span>
                    </h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                    <p class="text-gray-400 mt-6 text-xl">Get in touch for bookings, collaborations, or just to say hello</p>
                </div>

                <!-- Contact Grid -->
                <div class="grid md:grid-cols-2 gap-12 mb-16">
                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <!-- Professional Booking -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-blue-500/20 
                                    rounded-2xl p-8 hover:border-blue-500/40 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6m8 0H8"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white">Professional Booking</h3>
                            </div>
                            <p class="text-gray-300 text-lg leading-relaxed mb-4">
                                Ready to book Point of Madness for your event? We're available for festivals, venues, private events, and corporate functions.
                            </p>
                            <a href="mailto:booking@pointofmadness.com" 
                               class="inline-flex items-center gap-2 text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                booking@pointofmadness.com
                            </a>
                        </div>

                        <!-- General Inquiries -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-purple-500/20 
                                    rounded-2xl p-8 hover:border-purple-500/40 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white">General Inquiries</h3>
                            </div>
                            <p class="text-gray-300 text-lg leading-relaxed mb-4">
                                Questions about our music, collaborations, or just want to connect? We'd love to hear from you.
                            </p>
                            <a href="mailto:info@pointofmadness.com" 
                               class="inline-flex items-center gap-2 text-purple-400 hover:text-purple-300 font-semibold transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                info@pointofmadness.com
                            </a>
                        </div>

                        <!-- Press & Media -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-gray-500/20 
                                    rounded-2xl p-8 hover:border-gray-500/40 transition-all duration-300">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white">Press & Media</h3>
                            </div>
                            <p class="text-gray-300 text-lg leading-relaxed mb-4">
                                Media inquiries, interviews, and press kit requests.
                            </p>
                            <a href="mailto:press@pointofmadness.com" 
                               class="inline-flex items-center gap-2 text-gray-400 hover:text-gray-300 font-semibold transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                press@pointofmadness.com
                            </a>
                        </div>
                    </div>

                    <!-- Social Media & Links -->
                    <div class="space-y-8">
                        <!-- Social Media Section -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-pink-500/20 
                                    rounded-2xl p-8 hover:border-pink-500/40 transition-all duration-300">
                            <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </div>
                                Social Media
                            </h3>
                            
                            <div class="space-y-4 mb-6">
                                <a href="{{ \App\Models\Linktree::url('instagram', '#') }}" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-pink-400 transition-colors duration-300">Instagram</div>
                                        <div class="text-gray-400 text-sm">@pointofmadnessband</div>
                                    </div>
                                </a>
                                
                                <a href="{{ \App\Models\Linktree::url('tiktok', '#') }}" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-gray-300 transition-colors duration-300">TikTok</div>
                                        <div class="text-gray-400 text-sm">@point.of.madness</div>
                                    </div>
                                </a>
                                
                                <a href="{{ \App\Models\Linktree::url('spotify', '#') }}" target="_blank"
                                   class="flex items-center gap-4 p-4 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all duration-300 group">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold group-hover:text-green-400 transition-colors duration-300">Spotify</div>
                                        <div class="text-gray-400 text-sm">Point of Madness</div>
                                    </div>
                                </a>
                            </div>
                            
                            <p class="text-gray-400">
                                Follow us for the latest updates, behind-the-scenes content, and exclusive announcements.
                            </p>
                        </div>

                        <!-- Location -->
                        <div class="bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm border border-blue-500/20 
                                    rounded-2xl p-8 hover:border-blue-500/40 transition-all duration-300">
                            <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                Based in Netherlands
                            </h3>
                            <p class="text-gray-300 text-lg leading-relaxed">
                                Point of Madness is based in the Netherlands, bringing the authentic 80s new wave sound to audiences across Europe and beyond.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Response Promise -->
                <div class="text-center">
                    <div class="bg-gradient-to-r from-gray-700/20 to-gray-600/20 backdrop-blur-sm border border-gray-500/20 
                                rounded-xl p-8 max-w-2xl mx-auto">
                        <h2 class="text-3xl font-bold text-white mb-4">We'll Get Back to You</h2>
                        <p class="text-gray-300 text-lg">
                            We aim to respond to all inquiries within 24-48 hours. For urgent booking requests, please mention it in your subject line.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
