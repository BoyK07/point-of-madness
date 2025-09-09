<x-app-layout>
    <!-- Hero Section - Full Width -->
    <x-home.hero :$latestRelease/>

    <!-- Content Sections with Consistent Spacing -->
    <div class="max-w-full">
        <x-home.about :$latestRelease />

        <x-home.music :$latestRelease :popular-tracks="$popularTracks" />

        <x-home.members />

        <x-home.upcoming />
    </div>
</x-app-layout>
