<div>
    <!-- Global Modals -->
    <x-modal name="linktree" maxWidth="lg">
        <div class="bg-gradient-to-br from-gray-900/90 to-black/90 backdrop-blur-sm p-8 text-white border border-white/10">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-white">Point of Madness</h2>
                    <p class="text-gray-400 text-sm mt-1">All Links & Platforms</p>
                </div>
                <button @click="$dispatch('close-modal', 'linktree')"
                    class="text-gray-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Social Media Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-300 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                    Social Media
                </h3>
                <div class="grid gap-3">
                    <a href="{{ \App\Models\Linktree::url('instagram', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-pink-600 to-purple-600 
                              rounded-xl hover:from-pink-500 hover:to-purple-500 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Instagram</div>
                            <div class="text-sm opacity-80">@pointofmadnessband</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('tiktok', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-black to-gray-800 
                              rounded-xl hover:from-gray-800 hover:to-gray-700 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5.76 20.5a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1.8-.5z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">TikTok</div>
                            <div class="text-sm opacity-80">@point.of.madness</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Streaming Platforms Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-300 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                    </svg>
                    Music Streaming
                </h3>
                <div class="grid gap-3">
                    <a href="{{ \App\Models\Linktree::url('spotify', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-green-600 to-green-500 
                              rounded-xl hover:from-green-500 hover:to-green-400 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.84-.179-.84-.599 0-.36.24-.66.54-.78 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.242 1.019zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Spotify</div>
                            <div class="text-sm opacity-80">955 monthly listeners</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('amazon_music', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-orange-600 to-yellow-500 
                              rounded-xl hover:from-orange-500 hover:to-yellow-400 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.045 18.02c.072-.116.187-.124.348-.022 3.636 2.11 8.16 3.289 12.729 3.289 3.951 0 9.251-1.248 13.194-4.111.211-.155.344-.143.419.038.075.18-.031.344-.241.487-4.083 3.06-9.6 4.37-13.729 4.37-4.548 0-9.296-1.292-12.564-3.542-.204-.14-.265-.297-.156-.509zm-.837-1.569c.086-.134.225-.142.411-.025 4.18 2.425 9.35 3.767 14.351 3.767 4.617 0 10.138-1.36 14.207-4.583.248-.196.41-.18.492.044.082.225-.02.411-.288.599-4.357 3.428-10.139 4.724-14.548 4.724-5.264 0-10.7-1.448-14.425-4.032-.243-.168-.317-.356-.2-.494zm-.768-1.7c.096-.15.258-.158.47-.028 4.75 2.74 10.654 4.239 16.262 4.239 5.211 0 11.29-1.519 15.686-5.14.282-.232.484-.212.577.056.093.267-.023.489-.342.712-4.691 3.863-11.031 5.156-16.061 5.156-5.869 0-12.086-1.61-16.592-4.995-.274-.206-.356-.42-.224-.6z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Amazon Music</div>
                            <div class="text-sm opacity-80">Stream on Amazon</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('deezer', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-600 to-pink-500 
                              rounded-xl hover:from-purple-500 hover:to-pink-400 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.81 12.74h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0-6.78h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm-4.84 0h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21h-2.69c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm-4.84-6.78h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21H9.13c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21H9.13c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21H9.13c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zM4.29 12.74h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21H4.29c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21zm0 3.39h2.69c.67 0 1.21-.54 1.21-1.21s-.54-1.21-1.21-1.21H4.29c-.67 0-1.21.54-1.21 1.21s.54 1.21 1.21 1.21z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Deezer</div>
                            <div class="text-sm opacity-80">High quality streaming</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('tidal', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-900 to-cyan-700 
                              rounded-xl hover:from-blue-800 hover:to-cyan-600 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.01 2.019c-5.495 0-9.991 4.496-9.991 9.991 0 5.494 4.496 9.99 9.991 9.99 5.494 0 9.99-4.496 9.99-9.99 0-5.495-4.496-9.991-9.99-9.991zM8.717 17.768c-.168.168-.442.168-.611 0L6.3 15.964c-.168-.168-.168-.442 0-.611l1.806-1.805c.168-.168.442-.168.611 0l1.805 1.805c.168.168.168.442 0 .611l-1.805 1.804zm6.06 0c-.168.168-.442.168-.611 0l-1.805-1.804c-.168-.168-.168-.442 0-.611l1.805-1.805c.168-.168.442-.168.611 0l1.805 1.805c.168.168.168.442 0 .611l-1.805 1.804z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Tidal</div>
                            <div class="text-sm opacity-80">Hi-Fi music streaming</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('qobuz', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-indigo-700 to-purple-700 
                              rounded-xl hover:from-indigo-600 hover:to-purple-600 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6 13.5h-1.5v-3H18v3zM15 18h-1.5v-7.5H15V18zm-3-1.5h-1.5v-9H12v9zM9 16.5H7.5v-6H9v6z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Qobuz</div>
                            <div class="text-sm opacity-80">Studio quality</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('youtube', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-red-600 to-red-500 
                              rounded-xl hover:from-red-500 hover:to-red-400 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">YouTube</div>
                            <div class="text-sm opacity-80">Music & videos</div>
                        </div>
                    </a>

                    <a href="{{ \App\Models\Linktree::url('youtube_music', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-red-800 to-orange-600 
                              rounded-xl hover:from-red-700 hover:to-orange-500 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">YouTube Music</div>
                            <div class="text-sm opacity-80">Dedicated music streaming</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Music Videos Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-300 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    Music Videos
                </h3>
                <div class="grid gap-3">

                    <a href="{{ \App\Models\Linktree::url('toxic_music_video', '#') }}" target="_blank" 
                       class="flex items-center gap-4 p-4 bg-gradient-to-r from-gray-700 to-gray-600 
                              rounded-xl hover:from-gray-600 hover:to-gray-500 transition-all duration-300 
                              transform hover:scale-[1.02] hover:shadow-lg border-2 border-red-500/30">
                        <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <div>
                            <div class="font-semibold">TOXIC - Music Video</div>
                            <div class="text-sm opacity-80">Official video clip</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center pt-6 border-t border-gray-700">
                <p class="text-sm text-gray-400 mb-2">🎵 Three-piece band • 80s New Wave Revival • Est. 2023</p>
                <p class="text-xs text-gray-500">Latest: "Secondary" (2025) • Follow for updates and tour dates</p>
            </div>
        </div>
    </x-modal>
</div>