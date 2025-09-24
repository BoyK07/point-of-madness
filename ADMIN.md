# Admin panel guide

## Getting started
1. Run the setup commands listed in the project README (`composer install`, migrations, seeding, etc.).
2. Sign in using the default admin seeded by `php artisan db:seed --class=AdminSeeder`:
   * Email: `info@pointofmadness.nl`
   * Password: `PointOfMadness`
3. Visit `/admin` to access the control panel. Any authenticated user gains access; there are no additional role checks.

## Dashboard overview
The dashboard highlights key counts for users, media assets, links, phrases, and upcoming events. It links directly to the corresponding CRUD screens.

## Managing content
All content is managed through Single Source of Truth (SSOT) helpers. Every change immediately invalidates caches via model observers.

### Media
* Purpose keys (e.g. `homepage.hero`, `site.logo`) must be unique.
* Uploading or replacing a file stores it on the `public` disk (`storage/app/public`) and writes metadata to the `media` table.
* On save a queued job (`OptimizeImage`) runs lossless optimisation, refreshes metadata (hash, mime, size) and bumps the cache-busting version.
* Changing the purpose without uploading a new file automatically relocates the existing file.
* Use `ssot_media('purpose')` or `ssot_image_url('purpose')` in views/controllers.

### Links
* Links are grouped (`nav`, `footer`, `social`, `music`, `hero`, etc.). Group names map directly to the helper `ssot_links('group')`.
* Order is respected and only visible links appear on the frontend.
* Changing or deleting a link clears its cached group automatically.

### Events
* Events capture start/end times, optional media/link relationships, and descriptions.
* Past events automatically drop out of the frontend thanks to a global scope and caching layer.
* Admin views show all events (including past) and allow quick filtering.

### Phrases
* Phrases drive all user-facing copy via `@phrase('key')` or `phrase('key')` helpers.
* Keys follow dot notation (`homepage.hero.title`, `footer.credit`, etc.).
* Updating a phrase increments its version column for cache busting.
* Missing phrases fall back to the provided default and log a warning.

### Users
* Any authenticated user can access `/admin/*`; manage accounts from the Users section.
* Password updates are optional—leave blank to retain the current hash.

## Helpers summary
| Helper | Purpose |
| --- | --- |
| `phrase('key', $default = null)` | Retrieve SSOT text with logging and fallback |
| `@phrase('key')` | Blade directive wrapping `phrase()` |
| `ssot_media('purpose')` | Retrieve the full `Media` model |
| `ssot_image_url('purpose', $default = null)` | Resolve a versioned public URL |
| `ssot_links('group')` | Collection of visible `Link` records ordered by `order` |
| `ssot_events_upcoming()` | Collection of upcoming events with eager-loaded relations |

## Cache invalidation
Model observers flush cache keys on `saved` and `deleted` events. No manual cache clearing is required for typical content updates. To clear everything run `php artisan cache:clear`.

## Image optimisation pipeline
1. Upload via admin (`public` disk).
2. Dispatch `OptimizeImage` job which:
   * Runs the Spatie image optimiser chain (lossless mode).
   * Reads the file with Intervention/Image to detect metadata.
   * Updates width/height, mime, SHA-256 hash, and increments the `version` column.
   * Flushes relevant caches.
3. Frontend URLs append `?v={version}` ensuring fresh assets after each update.

## Suggested purpose / link groups
* Media: `site.logo`, `homepage.hero`, `gallery.main`, `events.banner`.
* Links: `nav`, `footer`, `social`, `music`, `video`, `newsletter`, `contact`, `hero`.
* Phrases: `homepage.*`, `contact.*`, `events.*`, `footer.*`, `modal.linktree.*`, `site.*`.

## Maintenance tips
* Use the **Phrases** section to capture any new copy before it appears in Blade.
* Run `php artisan site:audit-consistency --fix` before committing to catch hardcoded assets.
* Keep the queue worker running (`php artisan queue:work`) to process image optimisation promptly.
