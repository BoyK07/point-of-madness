<div class="mt-12">
    <h2 class="flex justify-center font-semibold text-white text-2xl mb-2">
        Meet the band
    </h2>

    <div class="flex gap-8 mt-6">
        @php
            $members = [
                [
                    'name' => 'Floris Anker',
                    'role' => 'Bassist',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'imagePath' => 'images/member_cards/floris_anker.png',
                ],
                [
                    'name' => 'Kay Spijker',
                    'role' => 'Guitarist',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'imagePath' => 'images/member_cards/kay.png',
                ],
                [
                    'name' => 'Sem van Dongen',
                    'role' => 'Vocalist',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'imagePath' => 'images/member_cards/sem_van_dongen.png',
                ],
                [
                    'name' => 'Kai de Wild',
                    'role' => 'Drummer',
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'imagePath' => 'images/member_cards/kai.png',
                ],
            ];
        @endphp

        @foreach($members as $member)
            <x-home.partials.member-card
                :name="$member['name']"
                :role="$member['role']"
                :description="$member['description']"
                :imagePath="$member['imagePath']" />

        @endforeach
    </div>
</div>
