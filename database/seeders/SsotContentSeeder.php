<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use App\Services\SSOT\EventService;
use App\Services\SSOT\LinkService;
use App\Services\SSOT\MediaService;
use App\Services\SSOT\PhraseService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class SsotContentSeeder extends Seeder
{
    private const FALLBACK_IMAGE = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMB/axC3X8AAAAASUVORK5CYII=';

    public function run(): void
    {
        $media = $this->seedMedia();
        $links = $this->seedLinks();
        $this->seedPhrases();
        $this->seedEvents($media, $links);

        app(MediaService::class)->flush();
        app(LinkService::class)->flush();
        app(EventService::class)->flush();
        app(PhraseService::class)->flush();
    }

    /**
     * @return array<string, Media>
     */
    private function seedMedia(): array
    {
        $definitions = [
            [
                'purpose' => 'site.logo',
                'source' => public_path('images/pointofmadness_logo.png'),
                'filename' => 'media/site-logo.png',
                'alt' => 'Point of Madness logo',
            ],
            [
                'purpose' => 'homepage.hero',
                'source' => public_path('images/pointofmadness.png'),
                'filename' => 'media/homepage-hero.png',
                'alt' => 'Point of Madness live performance',
            ],
        ];

        $media = [];

        foreach ($definitions as $definition) {
            $binary = $this->resolveBinary($definition['source']);

            Storage::disk('public')->put($definition['filename'], $binary);

            $imageData = @getimagesizefromstring($binary) ?: [];

            $media[$definition['purpose']] = Media::updateOrCreate(
                ['purpose' => $definition['purpose']],
                [
                    'disk' => 'public',
                    'path' => $definition['filename'],
                    'alt' => $definition['alt'],
                    'mime' => $imageData['mime'] ?? null,
                    'width' => $imageData[0] ?? null,
                    'height' => $imageData[1] ?? null,
                    'hash' => hash('sha256', $binary),
                    'version' => 1,
                ]
            );
        }

        return $media;
    }

    private function resolveBinary(string $source): string
    {
        if (is_file($source)) {
            return (string) file_get_contents($source);
        }

        return base64_decode(self::FALLBACK_IMAGE);
    }

    private function seedLinks(): Collection
    {
        $definitions = [
            [
                'key' => 'nav.home',
                'label' => 'Home',
                'url' => '/',
                'group' => 'nav',
                'order' => 1,
            ],
            [
                'key' => 'nav.events',
                'label' => 'Events',
                'url' => '/events',
                'group' => 'nav',
                'order' => 2,
            ],
            [
                'key' => 'nav.contact',
                'label' => 'Contact',
                'url' => '/contact',
                'group' => 'nav',
                'order' => 3,
            ],
            [
                'key' => 'hero.spotify',
                'label' => 'Listen on Spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'group' => 'hero',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'hero.youtube',
                'label' => 'Watch on YouTube',
                'url' => 'https://www.youtube.com/@PointOfMadness',
                'group' => 'hero',
                'order' => 2,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'social.instagram',
                'label' => 'Instagram',
                'url' => 'https://www.instagram.com/pointofmadnessband/',
                'group' => 'social',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'social.youtube',
                'label' => 'YouTube',
                'url' => 'https://www.youtube.com/@PointOfMadness',
                'group' => 'social',
                'order' => 2,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'social.facebook',
                'label' => 'Facebook',
                'url' => 'https://www.facebook.com/PointofMadnessBand',
                'group' => 'social',
                'order' => 3,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'social.spotify',
                'label' => 'Spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'group' => 'social',
                'order' => 4,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'music.spotify',
                'label' => 'Spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'group' => 'music',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'music.apple',
                'label' => 'Apple Music',
                'url' => 'https://music.apple.com/nl/artist/point-of-madness/1733108472',
                'group' => 'music',
                'order' => 2,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'music.bandcamp',
                'label' => 'Bandcamp',
                'url' => 'https://pointofmadness.bandcamp.com',
                'group' => 'music',
                'order' => 3,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'video.youtube',
                'label' => 'YouTube',
                'url' => 'https://www.youtube.com/@PointOfMadness',
                'group' => 'video',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'video.tiktok',
                'label' => 'TikTok',
                'url' => 'https://www.tiktok.com/@pointofmadnessband',
                'group' => 'video',
                'order' => 2,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'contact.email',
                'label' => 'info@pointofmadness.nl',
                'url' => 'mailto:info@pointofmadness.nl',
                'group' => 'contact',
                'order' => 1,
            ],
            [
                'key' => 'contact.management',
                'label' => 'Management',
                'url' => 'mailto:management@pointofmadness.nl',
                'group' => 'contact',
                'order' => 2,
            ],
            [
                'key' => 'newsletter.subscribe',
                'label' => 'Join the newsletter',
                'url' => 'https://pointofmadness.us21.list-manage.com/subscribe',
                'group' => 'newsletter',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'footer.events',
                'label' => 'Events',
                'url' => '/events',
                'group' => 'footer',
                'order' => 1,
            ],
            [
                'key' => 'footer.contact',
                'label' => 'Contact',
                'url' => '/contact',
                'group' => 'footer',
                'order' => 2,
            ],
            [
                'key' => 'footer.press',
                'label' => 'Press kit',
                'url' => 'https://drive.google.com/drive/folders/1iyXafTxNcq3uf8z71i4OwioMxF5xNV1u?usp=sharing',
                'group' => 'footer',
                'order' => 3,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'events.synthwave-nights.tickets',
                'label' => 'Tickets',
                'url' => 'https://tickets.pointofmadness.nl/synthwave-nights',
                'group' => 'events',
                'order' => 1,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
            [
                'key' => 'events.electric-dusk.tickets',
                'label' => 'Tickets',
                'url' => 'https://tickets.pointofmadness.nl/electric-dusk',
                'group' => 'events',
                'order' => 2,
                'target' => '_blank',
                'rel' => 'noopener',
            ],
        ];

        $links = collect();

        foreach ($definitions as $definition) {
            $model = Link::updateOrCreate(
                ['key' => $definition['key']],
                [
                    'label' => $definition['label'],
                    'url' => $definition['url'],
                    'group' => $definition['group'],
                    'order' => $definition['order'] ?? 0,
                    'target' => $definition['target'] ?? null,
                    'rel' => $definition['rel'] ?? null,
                    'visible' => $definition['visible'] ?? true,
                ]
            );

            $links->put($definition['key'], $model);
        }

        return $links;
    }

    private function seedPhrases(): void
    {
        $phrases = [
            'site.name' => 'Point of Madness',
            'homepage.hero.title' => 'Point of Madness',
            'homepage.hero.subtitle' => 'New wave energy from the Netherlands.',
            'homepage.hero.cta' => 'View events',
            'homepage.about.title' => 'About the band',
            'homepage.about.body' => 'Point of Madness revives the 80s with shimmering synths, powerful vocals, and a modern production edge.',
            'homepage.about.secondary' => 'Stay tuned for new releases, show announcements, and behind-the-scenes stories straight from the rehearsal room.',
            'homepage.cta.title' => 'Join the mailing list',
            'homepage.cta.body' => 'Subscribe to hear about new music and gigs before anyone else.',
            'homepage.events.title' => 'Upcoming shows',
            'homepage.events.view_all' => 'View all events',
            'homepage.events.empty' => 'We are booking the next run of shows now. Check back soon!',
            'homepage.social.title' => 'Stay connected',
            'homepage.social.body' => 'Follow Point of Madness across your favourite platforms.',
            'events.title' => 'Upcoming events',
            'events.subtitle' => 'Catch the next Point of Madness performance near you.',
            'events.empty' => 'No upcoming shows are scheduled right now. Check back soon!',
            'contact.title' => 'Contact Point of Madness',
            'contact.subtitle' => 'Bookings, press enquiries, and fan mail all come through this form.',
            'contact.honeypot.label' => 'Leave this field blank',
            'contact.form.title' => 'Send us a message',
            'contact.fields.name' => 'Name',
            'contact.fields.company' => 'Company',
            'contact.fields.email' => 'Email',
            'contact.fields.phone' => 'Phone',
            'contact.fields.reason' => 'Reason',
            'contact.fields.reason.placeholder' => 'Choose an option',
            'contact.fields.reason.booking' => 'Professional booking',
            'contact.fields.reason.general' => 'General enquiry',
            'contact.fields.reason.press' => 'Press & media',
            'contact.fields.reason.fans' => 'Fans / say hello',
            'contact.fields.subject' => 'Subject',
            'contact.fields.message' => 'Message',
            'contact.fields.attachment' => 'Attachment (optional)',
            'contact.fields.attachment.help' => 'PDF or image files up to 5MB.',
            'contact.fields.acknowledgement' => 'I understand the band will reply as soon as possible.',
            'contact.submit' => 'Send message',
            'contact.details.title' => 'Direct contact',
            'contact.details.body' => 'Prefer email? Reach out through the links below.',
            'contact.social.title' => 'Follow the band',
            'dashboard.title' => 'Dashboard',
            'dashboard.intro' => 'Welcome back! Manage your profile and site content from here.',
            'footer.title' => 'Point of Madness',
            'footer.tagline' => 'Independent new wave from the Netherlands.',
            'footer.links.title' => 'Links',
            'footer.social.title' => 'Connect',
            'footer.copyright' => 'Point of Madness. All rights reserved.',
            'footer.credit' => 'Built on a single source of truth.',
            'modal.linktree.button' => 'Links & social',
            'modal.linktree.title' => 'Point of Madness',
            'modal.linktree.subtitle' => 'All official links in one place.',
            'modal.linktree.close' => 'Close',
            'modal.linktree.social.title' => 'Connect',
            'modal.linktree.social.action' => 'Follow',
            'modal.linktree.music.title' => 'Listen',
            'modal.linktree.music.action' => 'Open',
            'modal.linktree.video.title' => 'Watch',
            'modal.linktree.video.action' => 'Play',
        ];

        foreach ($phrases as $key => $text) {
            Phrase::updateOrCreate(
                ['key' => $key],
                [
                    'text' => $text,
                    'context' => null,
                    'version' => 1,
                ]
            );
        }
    }

    /**
     * @param  array<string, Media>  $media
     */
    private function seedEvents(array $media, Collection $links): void
    {
        $events = [
            [
                'title' => 'Synthwave Nights: Amsterdam',
                'starts_at' => Carbon::now()->addMonth()->setTime(20, 30),
                'ends_at' => Carbon::now()->addMonth()->setTime(23, 0),
                'location' => 'Melkweg, Amsterdam, NL',
                'description' => 'Point of Madness brings a neon-drenched synthwave set to Melkweg with brand new material.',
                'media_purpose' => 'homepage.hero',
                'link_key' => 'events.synthwave-nights.tickets',
            ],
            [
                'title' => 'Electric Dusk Festival',
                'starts_at' => Carbon::now()->addMonths(2)->setTime(18, 0),
                'ends_at' => Carbon::now()->addMonths(2)->setTime(22, 0),
                'location' => 'Rotterdam Ahoy, Rotterdam, NL',
                'description' => 'A festival appearance featuring a full live light show and collaborations with fellow synth artists.',
                'media_purpose' => 'homepage.hero',
                'link_key' => 'events.electric-dusk.tickets',
            ],
        ];

        foreach ($events as $event) {
            $payload = $event;

            $payload['media_id'] = Arr::get($media, $event['media_purpose'])?->id;
            $payload['link_id'] = $links->get($event['link_key'])?->id;

            unset($payload['media_purpose'], $payload['link_key']);

            Event::updateOrCreate(
                ['title' => $event['title']],
                $payload
            );
        }
    }
}
