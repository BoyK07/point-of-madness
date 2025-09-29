<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Link;
use App\Models\Media;
use App\Models\Phrase;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SsotSeeder extends Seeder
{
    public function run(): void
    {
        $phrases = [
            'site.title' => 'Point of Madness',
            'site.subtitle' => 'Mystieke metalband uit Nederland',
            'brand.name' => 'Point of Madness',
            'brand.logo.alt' => 'Point of Madness Logo',
            'nav.home.label' => 'Home',
            'nav.events.label' => 'Upcoming Events',
            'nav.contact.label' => 'Contact',
            'home.hero.image.alt' => 'Point of Madness Band',
            'home.hero.title.top' => 'POINT OF',
            'home.hero.title.bottom' => 'MADNESS',
            'home.hero.tagline' => 'Professional New Wave Revival from the Netherlands',
            'home.hero.latest_release.badge' => 'Latest Release',
            'home.hero.latest_release.subtitle' => 'Our newest release - Available on all streaming platforms',
            'home.hero.latest_release.released_prefix' => 'Released',
            'home.hero.listen_button' => 'Listen Now',
            'home.hero.stats.established' => 'Est. 2023',
            'home.hero.stats.origin' => 'Netherlands',
            'home.hero.stats.availability' => 'Available for bookings',
            'home.about.heading' => 'About the Band',
            'home.about.paragraph_1' => 'Meet Point Of Madness, a four-piece band born from a shared love of 80s new wave. Formed in 2023, their music is fueled by drum computers, catchy basslines, and fiery guitar riffs.',
            'home.about.paragraph_2' => "With Floris Anker on bass, Kay Spijker on guitar, Sem van Dongen on vocals, and Kai de Wild on drums, they're on a mission to revive the spirit of the past in today's tech-driven world.",
            'home.about.paragraph_3' => "Get ready to experience a blend of retro vibes and modern sounds that'll transport you back in time while keeping you rooted in the present.",
            'home.about.quickfacts.title' => 'Quick Facts',
            'home.about.quickfacts.formed_label' => 'Formed',
            'home.about.quickfacts.formed_value' => '2023',
            'home.about.quickfacts.origin_label' => 'Origin',
            'home.about.quickfacts.origin_value' => 'Netherlands',
            'home.about.quickfacts.genre_label' => 'Genre',
            'home.about.quickfacts.genre_value' => 'New Wave Revival',
            'home.about.quickfacts.members_label' => 'Members',
            'home.about.quickfacts.members_value' => '4',
            'home.about.latest_release.title' => 'Latest Release',
            'home.about.latest_release.caption_prefix' => 'Latest Release',
            'home.music.heading' => 'Latest Releases',
            'home.music.subheading' => 'Professional new wave sound available on all platforms',
            'home.music.latest.badge.album' => 'Latest Album',
            'home.music.latest.badge.single' => 'Latest Single',
            'home.music.latest.released_prefix' => 'Released',
            'home.music.latest.spotify_button' => 'Spotify',
            'home.music.popular.playcount_suffix' => 'plays',
            'home.music.follow.monthly_listeners_suffix' => 'monthly listeners',
            'home.music.follow.subtitle' => 'Follow us on Spotify for new releases',
            'home.music.follow.button' => 'Follow',
            'home.members.heading' => 'Meet the Band',
            'home.members.subheading' => 'Four professional musicians creating the new wave revival',
            'home.members.floris.name' => 'Floris Anker',
            'home.members.floris.role' => 'Bassist',
            'home.members.floris.description' => 'Driving the rhythm section with precision and creating the foundation of our distinctive sound.',
            'home.members.kay.name' => 'Kay Spijker',
            'home.members.kay.role' => 'Guitarist',
            'home.members.kay.description' => 'Crafting atmospheric guitar work and signature riffs that define our musical identity.',
            'home.members.sem.name' => 'Sem van Dongen',
            'home.members.sem.role' => 'Singer',
            'home.members.sem.description' => 'Delivering captivating vocals that bring emotion and energy to our performances.',
            'home.members.kai.name' => 'Kai de Wild',
            'home.members.kai.role' => 'Drummer',
            'home.members.kai.description' => 'Providing the dynamic beats and rhythmic foundation that drives our live performances.',
            'home.members.booking.title' => 'Professional Booking',
            'home.members.booking.description' => 'Available for festivals, venues, private events, and corporate functions. Contact us for professional performance inquiries.',
            'home.members.booking.established' => 'Est. 2023',
            'home.members.booking.origin' => 'Netherlands',
            'home.members.booking.size' => '4-piece band',
            'home.upcoming.heading' => 'On Tour',
            'home.upcoming.subheading' => 'Professional live performances',
            'home.upcoming.cta.title' => 'Stay Connected',
            'home.upcoming.cta.description' => 'Follow our latest updates, tour announcements, and connect with us across all platforms.',
            'events.index.heading' => 'Upcoming Events',
            'events.index.subheading' => 'Catch Point of Madness live',
            'events.index.cta.title' => 'Stay Updated',
            'events.index.cta.description' => 'Follow us on social media for the latest tour announcements, behind-the-scenes content, and exclusive updates.',
            'events.index.cta.instagram' => 'Follow on Instagram',
            'events.index.cta.tiktok' => 'Follow on TikTok',
            'footer.brand.heading' => 'POINT OF MADNESS',
            'footer.brand.subtitle' => 'Reviving 80s New Wave • Netherlands • Since 2023',
            'footer.listen.heading' => 'Listen',
            'footer.connect.heading' => 'Connect',
            'footer.contact.heading' => 'Contact',
            'footer.listen.spotify' => 'Spotify',
            'footer.listen.youtube' => 'YouTube',
            'footer.listen.apple_music' => 'Apple Music',
            'footer.connect.instagram' => 'Instagram',
            'footer.connect.tiktok' => 'TikTok',


            'footer.contact.booking' => 'Booking',
            'footer.contact.presskit' => 'Press Kit',
            'footer.contact.management' => 'Management',
            'footer.copyright.owner' => 'Point of Madness',
            'footer.copyright.rights' => 'All rights reserved.',
            'footer.craft' => 'Made with 💜 for the new wave revival',
            'footer.established' => 'Est. 2023 • Netherlands',
            'modal.linktree.button' => 'Links & Social',
            'modal.linktree.title' => 'Point of Madness',
            'modal.linktree.subtitle' => 'All Links & Platforms',
            'modal.linktree.section.social' => 'Social Media',
            'modal.linktree.section.streaming' => 'Music Streaming',
            'modal.linktree.section.videos' => 'Music Videos',
            'modal.linktree.instagram.label' => 'Instagram',
            'modal.linktree.instagram.handle' => '@pointofmadnessband',
            'modal.linktree.tiktok.label' => 'TikTok',
            'modal.linktree.tiktok.handle' => '@point.of.madness',
            'modal.linktree.spotify.label' => 'Spotify',
            'modal.linktree.spotify.description' => '955 monthly listeners',
            'modal.linktree.amazon.label' => 'Amazon Music',
            'modal.linktree.amazon.description' => 'Stream on Amazon',
            'modal.linktree.deezer.label' => 'Deezer',
            'modal.linktree.deezer.description' => 'High quality streaming',
            'modal.linktree.tidal.label' => 'Tidal',
            'modal.linktree.tidal.description' => 'Hi-Fi music streaming',
            'modal.linktree.qobuz.label' => 'Qobuz',
            'modal.linktree.qobuz.description' => 'Studio quality',
            'modal.linktree.youtube.label' => 'YouTube',
            'modal.linktree.youtube.description' => 'Music & videos',
            'modal.linktree.youtube_music.label' => 'YouTube Music',
            'modal.linktree.youtube_music.description' => 'Dedicated music streaming',
            'modal.linktree.video.toxic.title' => 'TOXIC - Music Video',
            'modal.linktree.video.toxic.description' => 'Official video clip',
            'modal.linktree.footer.tagline' => '🎵 Three-piece band • 80s New Wave Revival • Est. 2023',
            'modal.linktree.footer.latest' => 'Follow for updates and tour dates',
            'contact.heading' => 'Contact Us',
            'contact.subheading' => 'Get in touch for bookings, collaborations, or just to say hello',
            'contact.form.title' => 'Send us a message',
            'contact.form.required_notice' => 'All fields are required unless marked optional.',
            'contact.form.honeypot_label' => 'Leave this field empty',
            'contact.form.name.label' => 'Name / Company name',
            'contact.form.name.placeholder' => 'Your full name or company name',
            'contact.form.email.label' => 'Email address',
            'contact.form.email.placeholder' => 'you@example.com',
            'contact.form.reason.label' => 'Reason for contacting',
            'contact.form.reason.option_default' => 'Select an option',
            'contact.form.reason.option_booking' => 'Professional Booking',
            'contact.form.reason.option_general' => 'General Inquiries',
            'contact.form.reason.option_press' => 'Press & Media',
            'contact.form.reason.option_fans' => 'Fans / Say Hi',
            'contact.form.reason.help_default' => 'Please choose the option that best fits your message.',
            'contact.form.reason.description.booking' => 'Bookings for festivals, venues, private events, and corporate functions.',
            'contact.form.reason.description.general' => 'Questions about our music, collaborations, or general information.',
            'contact.form.reason.description.press' => 'Media inquiries, interviews, and press kit requests.',
            'contact.form.reason.description.fans' => 'For fans who want to say hi, share feedback, or send a personal message.',
            'contact.form.subject.label' => 'Subject',
            'contact.form.subject.placeholder' => 'How can we help?',
            'contact.form.message.label' => 'Message / Description',
            'contact.form.message.placeholder' => 'Share as much detail as possible',
            'contact.form.phone.label' => 'Phone (optional)',
            'contact.form.phone.placeholder' => 'Include country code',
            'contact.form.company.label' => 'Company (optional)',
            'contact.form.company.placeholder' => 'Your organisation',
            'contact.form.attachment.label' => 'Attachment (optional)',
            'contact.form.attachment.hint' => 'Accepted formats: pdf, jpg, jpeg, png, webp up to 5 MB.',
            'contact.form.acknowledgement_copy' => '“I understand that it may take some time for Point of Madness to reply and that spam messages will not be answered.”',
            'contact.form.submit' => 'Send message',
            'contact.form.success' => 'Thank you! Your message has been sent successfully.',
            'contact.form.validation_error' => "We couldn't send your message yet. Please review the details below.",
            'contact.form.captcha_failed' => 'Captcha verification failed. Please reload the page and try again.',
            'contact.form.error' => 'Something went wrong while sending your message. Please try again in a moment.',
            'contact.social.heading' => 'Social Media',
            'contact.social.instagram.label' => 'Instagram',
            'contact.social.instagram.handle' => '@pointofmadnessband',
            'contact.social.tiktok.label' => 'TikTok',
            'contact.social.tiktok.handle' => '@point.of.madness',
            'contact.social.spotify.label' => 'Spotify',
            'contact.social.spotify.handle' => 'Point of Madness',
            'contact.social.description' => 'Follow us for the latest updates, behind-the-scenes content, and exclusive announcements.',
            'contact.location.heading' => 'Based in Netherlands',
            'contact.location.description' => 'Point of Madness is based in the Netherlands, bringing the authentic 80s new wave sound to audiences across Europe and beyond.',
            'contact.response.title' => "We'll Get Back to You",
            'contact.response.description' => 'We aim to respond to all inquiries within 24-48 hours. For urgent booking requests, please mention it in your subject line.',
        ];

        foreach ($phrases as $key => $text) {
            Phrase::query()->updateOrCreate(
                ['key' => $key],
                [
                    'text' => $text,
                    'context' => 'Seeded default content',
                    'version' => 1,
                ]
            );
        }

        $mediaItems = [
            'brand.logo' => [
                'path' => 'seed/brand/logo.png',
                'source' => 'public/images/pointofmadness_logo.png',
                'alt' => 'Point of Madness Logo',
            ],
            'home.hero.main' => [
                'path' => 'seed/home/hero.png',
                'source' => 'public/images/pointofmadness.png',
                'alt' => 'Point of Madness Band',
            ],
            'members.floris' => [
                'path' => 'seed/members/floris.png',
                'source' => 'public/images/member_cards/floris_anker.png',
                'alt' => 'Portrait of Floris Anker',
            ],
            'members.kay' => [
                'path' => 'seed/members/kay.png',
                'source' => 'public/images/pointofmadness.png',
                'alt' => 'Portrait of Kay Spijker',
            ],
            'members.sem' => [
                'path' => 'seed/members/sem.png',
                'source' => 'public/images/member_cards/sem_van_dongen.png',
                'alt' => 'Portrait of Sem van Dongen',
            ],
            'members.kai' => [
                'path' => 'seed/members/kai.png',
                'source' => 'public/images/pointofmadness.png',
                'alt' => 'Portrait of Kai de Wild',
            ],
        ];

        foreach ($mediaItems as $purpose => $item) {
            $disk = Storage::disk('public');
            $path = $item['path'];
            $sourcePath = base_path($item['source']);

            if (is_file($sourcePath) && ! $disk->exists($path)) {
                $directory = trim(pathinfo($path, PATHINFO_DIRNAME), '.');
                if ($directory && $directory !== '') {
                    $disk->makeDirectory($directory);
                }

                $disk->put($path, file_get_contents($sourcePath));
            }

            Media::query()->updateOrCreate(
                ['purpose' => $purpose],
                [
                    'disk' => 'public',
                    'path' => $path,
                    'alt' => $item['alt'],
                    'mime_type' => 'image/png',
                    'hash' => is_file($sourcePath) ? sha1_file($sourcePath) : null,
                    'version' => 1,
                ]
            );
        }

        $links = [
            'nav.home' => [
                'label' => 'Home',
                'url' => '/',
                'target' => '_self',
                'group' => 'navigation',
                'order' => 1,
            ],
            'nav.events' => [
                'label' => 'Upcoming Events',
                'url' => '/events',
                'target' => '_self',
                'group' => 'navigation',
                'order' => 2,
            ],
            'nav.contact' => [
                'label' => 'Contact',
                'url' => '/contact',
                'target' => '_self',
                'group' => 'navigation',
                'order' => 3,
            ],
            'social.instagram' => [
                'label' => 'Instagram',
                'url' => 'https://www.instagram.com/pointofmadnessband/',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'social',
                'order' => 1,
            ],
            'social.tiktok' => [
                'label' => 'TikTok',
                'url' => 'https://www.tiktok.com/@point.of.madness',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'social',
                'order' => 2,
            ],
            'social.spotify' => [
                'label' => 'Spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'social',
                'order' => 3,
            ],


            'social.youtube' => [
                'label' => 'YouTube',
                'url' => 'https://www.youtube.com/@PointofMadness',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'social',
                'order' => 6,
            ],
            'social.youtube_music' => [
                'label' => 'YouTube Music',
                'url' => 'https://music.youtube.com/channel/UC3byFEMycsebbNGxeFhx6CQ',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'social',
                'order' => 7,
            ],
            'streaming.spotify' => [
                'label' => 'Spotify',
                'url' => 'https://open.spotify.com/artist/1YhRX1mRz6rzQofSyzlszi',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 1,
            ],
            'streaming.youtube' => [
                'label' => 'YouTube',
                'url' => 'https://www.youtube.com/@PointofMadness',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 2,
            ],
            'streaming.apple_music' => [
                'label' => 'Apple Music',
                'url' => 'https://music.apple.com/nl/artist/point-of-madness/1739804378',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 3,
            ],
            'streaming.amazon_music' => [
                'label' => 'Amazon Music',
                'url' => 'https://music.amazon.com/artists/B0CZV1WG82/point-of-madness',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 4,
            ],
            'streaming.deezer' => [
                'label' => 'Deezer',
                'url' => 'https://www.deezer.com/us/artist/260843331',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 5,
            ],
            'streaming.tidal' => [
                'label' => 'Tidal',
                'url' => '#',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 6,
            ],
            'streaming.qobuz' => [
                'label' => 'Qobuz',
                'url' => '#',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 7,
            ],
            'streaming.youtube_music' => [
                'label' => 'YouTube Music',
                'url' => 'https://music.youtube.com/channel/UC3byFEMycsebbNGxeFhx6CQ',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'streaming',
                'order' => 8,
            ],
            'video.toxic' => [
                'label' => 'TOXIC - Music Video',
                'url' => 'https://www.youtube.com/watch?v=HGcrZPMlOrw&list=RDHGcrZPMlOrw',
                'target' => '_blank',
                'rel' => 'noopener',
                'group' => 'video',
                'order' => 1,
            ],
        ];

        foreach ($links as $slug => $data) {
            Link::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'label' => $data['label'],
                    'url' => $data['url'],
                    'target' => $data['target'] ?? '_self',
                    'rel' => $data['rel'] ?? null,
                    'order' => $data['order'] ?? 0,
                    'visible' => $data['visible'] ?? true,
                    'group' => $data['group'] ?? null,
                ]
            );
        }

        $events = [
            [
                'title' => 'Breda Barst',
                'starts_at' => Carbon::create(2025, 9, 6, 19, 0, 0),
                'ends_at' => Carbon::create(2025, 9, 6, 21, 0, 0),
                'location' => 'Breda, Netherlands',
                'description' => 'Festival performance at Breda Barst.',
                'type' => 'Festival',
                'time' => 'Evening',
            ],
            [
                'title' => 'Kempenerpop',
                'starts_at' => Carbon::create(2025, 9, 14, 14, 0, 0),
                'ends_at' => Carbon::create(2025, 9, 14, 16, 0, 0),
                'location' => 'Waalre, Netherlands',
                'description' => 'Outdoor festival show in Waalre.',
                'type' => 'Festival',
                'time' => 'Afternoon',
            ],
            [
                'title' => 'Sound Dog',
                'starts_at' => Carbon::create(2025, 9, 26, 22, 0, 0),
                'ends_at' => Carbon::create(2025, 9, 27, 0, 30, 0),
                'location' => 'Breda, Netherlands',
                'description' => 'Club show in Breda featuring Point of Madness.',
                'type' => 'Club Show',
                'time' => 'Night',
            ],
        ];

        foreach ($events as $eventData) {
            Event::query()->updateOrCreate(
                [
                    'title' => $eventData['title'],
                    'starts_at' => $eventData['starts_at'],
                ],
                [
                    'ends_at' => $eventData['ends_at'],
                    'location' => $eventData['location'],
                    'description' => $eventData['description'],
                ]
            );

            $slug = Str::slug($eventData['title'], '_');

            Phrase::query()->updateOrCreate(
                ['key' => "events.{$slug}.type"],
                [
                    'text' => $eventData['type'],
                    'context' => "Event type label for {$eventData['title']}",
                    'version' => 1,
                ]
            );

            Phrase::query()->updateOrCreate(
                ['key' => "events.{$slug}.time"],
                [
                    'text' => $eventData['time'],
                    'context' => "Event time label for {$eventData['title']}",
                    'version' => 1,
                ]
            );

            Phrase::query()->updateOrCreate(
                ['key' => "events.{$slug}.description"],
                [
                    'text' => $eventData['description'],
                    'context' => "Event description for {$eventData['title']}",
                    'version' => 1,
                ]
            );
        }
    }
}
