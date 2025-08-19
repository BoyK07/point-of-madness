<div class="mt-10">
    <h2 class="font-semibold text-white text-lg mb-2">
        Meet the band
    </h2>

    <div class="flex gap-8 mt-6">
        @php
            $members = [
                [
                    'name' => 'Floris Anker',
                    'role' => 'Bassist',
                    'description' => 'Gay',
                    'imagePath' => 'images/about_cards/floris_anker.png',
                ],
                [
                    'name' => 'Kay Spijker',
                    'role' => 'Guitarist',
                    'description' => 'Not Gay',
                    'imagePath' => 'images/about_cards/kay.png',
                ],
                [
                    'name' => 'Sem van Dongen',
                    'role' => 'Vocalist',
                    'description' => 'Not Gay',
                    'imagePath' => 'images/about_cards/sem_van_dongen.png',
                ],
                [
                    'name' => 'Kai de Wild',
                    'role' => 'Drummer',
                    'description' => 'Not Gay',
                    'imagePath' => 'images/about_cards/kai.png',
                ],
            ];
        @endphp

        @foreach($members as $member)
            <x-home.about-card
                :name="$member['name']"
                :role="$member['role']"
                :description="$member['description']"
                :imagePath="$member['imagePath']" />

        @endforeach
    </div>
</div>
