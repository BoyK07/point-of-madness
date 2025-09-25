<!-- Professional Members Section -->
<div class="relative py-16 sm:py-24 px-4 sm:px-6 lg:px-12">
    <!-- Professional Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/30 to-gray-800/30"></div>
    <div class="absolute top-1/2 left-0 w-56 h-56 sm:w-64 sm:h-64 bg-blue-900/10 rounded-full filter blur-3xl hidden sm:block"></div>
    <div class="absolute top-1/2 right-0 w-56 h-56 sm:w-64 sm:h-64 bg-purple-900/10 rounded-full filter blur-3xl hidden sm:block"></div>

    <div class="relative max-w-screen-xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    @phrase('home.members.heading', 'Meet the Band')
                </span>
            </h2>
            <div class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            <p class="text-gray-400 mt-6 text-base sm:text-lg">@phrase('home.members.subheading', 'Four professional musicians creating the new wave revival')</p>
        </div>

        @php
            $members = [
                [
                    'name' => phrase('home.members.floris.name', 'Floris Anker'),
                    'role' => phrase('home.members.floris.role', 'Bassist'),
                    'description' => phrase('home.members.floris.description', 'Driving the rhythm section with precision and creating the foundation of our distinctive sound.'),
                    'imagePath' => ssot_image_url('members.floris') ?? 'images/member_cards/floris_anker.png',
                    'accent' => 'blue',
                ],
                [
                    'name' => phrase('home.members.kay.name', 'Kay Spijker'),
                    'role' => phrase('home.members.kay.role', 'Guitarist'),
                    'description' => phrase('home.members.kay.description', 'Crafting atmospheric guitar work and signature riffs that define our musical identity.'),
                    'imagePath' => ssot_image_url('members.kay') ?? 'images/member_cards/kay.png',
                    'accent' => 'purple',
                ],
                [
                    'name' => phrase('home.members.sem.name', 'Sem van Dongen'),
                    'role' => phrase('home.members.sem.role', 'Singer'),
                    'description' => phrase('home.members.sem.description', 'Delivering captivating vocals that bring emotion and energy to our performances.'),
                    'imagePath' => ssot_image_url('members.sem') ?? 'images/member_cards/sem_van_dongen.png',
                    'accent' => 'gray',
                ],
                [
                    'name' => phrase('home.members.kai.name', 'Kai de Wild'),
                    'role' => phrase('home.members.kai.role', 'Drummer'),
                    'description' => phrase('home.members.kai.description', 'Providing the dynamic beats and rhythmic foundation that drives our live performances.'),
                    'imagePath' => ssot_image_url('members.kai') ?? 'images/member_cards/kai.png',
                    'accent' => 'indigo',
                ],
            ];
        @endphp

        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6 sm:gap-8">
            @foreach($members as $member)
                <div class="group relative">
                    <!-- Professional Card Container -->
                    <div class="relative bg-gradient-to-br from-gray-800/50 to-black/50 backdrop-blur-sm 
                                border border-{{ $member['accent'] }}-500/20 rounded-2xl overflow-hidden 
                                transform transition-all duration-300 hover:scale-105 hover:border-{{ $member['accent'] }}-500/40
                                hover:shadow-xl hover:shadow-{{ $member['accent'] }}-500/20">
                        
                        <!-- Member Image -->
                        <div class="relative h-72 sm:h-80 overflow-hidden">
                            <img src="{{ $member['imagePath'] }}" alt="{{ $member['name'] }}"
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            
                            <!-- Professional Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            
                            <!-- Role Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="bg-gradient-to-r from-{{ $member['accent'] }}-600 to-{{ $member['accent'] }}-700 
                                           text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $member['role'] }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Member Info -->
                        <div class="p-5 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-bold text-white mb-2">{{ $member['name'] }}</h3>
                            <p class="text-gray-300 text-sm leading-relaxed">{{ $member['description'] }}</p>
                            
                            <!-- Professional Line -->
                            <div class="mt-4 w-full h-px bg-gradient-to-r from-{{ $member['accent'] }}-500/50 to-transparent"></div>
                        </div>
                        
                        <!-- Subtle Hover Effect -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-br from-{{ $member['accent'] }}-500/5 to-transparent"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Professional Bottom Section -->
        <div class="mt-12 sm:mt-16 text-center">
            <div class="bg-gray-800/30 backdrop-blur-sm border border-gray-600/30 rounded-xl p-6 sm:p-8 max-w-2xl mx-auto">
                <h3 class="text-lg sm:text-xl font-semibold text-white mb-4">@phrase('home.members.booking.title', 'Professional Booking')</h3>
                <p class="text-gray-400 text-sm mb-4">
                    @phrase('home.members.booking.description', 'Available for festivals, venues, private events, and corporate functions. Contact us for professional performance inquiries.')
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 text-sm text-gray-500">
                    <span class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        @phrase('home.members.booking.established', 'Est. 2023')
                    </span>
                    <span class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        @phrase('home.members.booking.origin', 'Netherlands')
                    </span>
                    <span class="flex items-center justify-center gap-2">
                        <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                        @phrase('home.members.booking.size', '4-piece band')
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
