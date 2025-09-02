<!-- Hero Section - Image-Focused Design -->
<div class="relative w-full min-h-screen flex flex-col items-center justify-center overflow-hidden">
    <!-- Dark Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-800 to-black">
        <!-- Subtle texture overlay -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: 
                linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px);
                background-size: 30px 30px;">
            </div>
        </div>
    </div>
    
    <!-- Enhanced ambient effects for focus -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-900/20 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-900/20 rounded-full filter blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-blue-900/10 via-purple-900/15 to-gray-900/10 rounded-full filter blur-3xl"></div>
    
    <!-- Logo Space Reserved for Future -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 py-8">
        <!-- Space reserved for future logo implementation -->
    </div>
    
    <!-- MASSIVE Hero Image - Center of Attention -->
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 mb-12">
        <div class="relative group">
            <!-- Dramatic glow effect -->
            <div class="absolute -inset-8 bg-gradient-to-r from-blue-600/30 via-purple-600/40 to-blue-600/30 rounded-3xl blur-2xl opacity-50 group-hover:opacity-75 transition-all duration-1000"></div>
            <div class="absolute -inset-4 bg-gradient-to-r from-blue-500/20 via-purple-500/30 to-blue-500/20 rounded-2xl blur-xl opacity-70 group-hover:opacity-90 transition-all duration-700"></div>
            
            <!-- The HERO IMAGE - Massive and centered -->
            <div class="relative">
                <img src="images/pointofmadness.png" 
                     alt="Point of Madness Band" 
                     class="w-full h-auto max-h-[70vh] object-contain rounded-2xl shadow-2xl mx-auto">
                <!-- Subtle professional overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent rounded-2xl"></div>
            </div>
        </div>
    </div>
    
    <!-- Band Name - Perfectly Aligned with Image -->
    <div class="relative z-10 text-center mb-8">
        <h1 class="text-6xl md:text-8xl lg:text-9xl font-black tracking-wider leading-none">
            <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-gray-300 bg-clip-text text-transparent drop-shadow-2xl">
                POINT OF
            </span>
            <br>
            <span class="bg-gradient-to-r from-gray-300 via-blue-400 to-purple-400 bg-clip-text text-transparent drop-shadow-2xl">
                MADNESS
            </span>
        </h1>
        
        <!-- Professional Tagline -->
        <p class="text-xl md:text-3xl text-gray-300 mt-6 font-light tracking-wide">
            Professional New Wave Revival from the Netherlands
        </p>
    </div>
    
    <!-- Latest Release Highlight - Expanded -->
    <div class="relative z-10 mb-8">
        <div class="bg-gray-800/70 backdrop-blur-sm border border-gray-600/50 
                    rounded-2xl p-8 max-w-2xl mx-auto text-center shadow-2xl shadow-black/50">
            <div class="flex items-center justify-center mb-4">
                <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full text-base font-bold uppercase tracking-wider">
                    Latest Release
                </span>
            </div>
            <h3 class="text-4xl md:text-5xl font-black text-white mb-3 tracking-wide">Secondary</h3>
            <p class="text-gray-300 text-lg mb-4">Our newest single - Available on all streaming platforms</p>
            <div class="flex items-center justify-center gap-2 text-gray-400">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-sm">Released 2025</span>
                <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
            </div>
        </div>
    </div>
    
    <!-- Professional Action Buttons -->
    <div class="relative z-10 flex flex-col sm:flex-row gap-4 items-center justify-center mb-8">
        <button class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 
                      text-white font-semibold rounded-full hover:from-blue-500 hover:to-purple-500 
                      transition-all duration-300 transform hover:scale-105 hover:shadow-xl 
                      hover:shadow-blue-500/30 flex items-center gap-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
            </svg>
            Listen Now
        </button>
        
        <x-modal.linktree.button />
    </div>
    
    <!-- Professional Credentials -->
    <div class="relative z-10 flex flex-col sm:flex-row gap-6 items-center justify-center text-sm text-gray-400 mb-8">
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
            <span>Est. 2023</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
            <span>Netherlands</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
            <span>Available for bookings</span>
        </div>
    </div>
</div>
