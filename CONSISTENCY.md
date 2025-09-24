# Consistency audit & SSOT rules

This project enforces a storage + database single source of truth for all editable content. Every Blade template, controller, and job should rely on the helpers provided in `app/Support/helpers.php`.

## SSOT expectations

| Domain | Source | Helper |
| --- | --- | --- |
| Phrases / copy | `phrases` table | `phrase('key')` / `@phrase('key')` |
| Images | Files on the `public` disk + `media` table | `ssot_media('purpose')`, `ssot_image_url('purpose')` |
| Links | `links` table | `ssot_links('group')` |
| Events | `events` table | `ssot_events_upcoming()` |

**Never** reference hardcoded `/storage/...` paths, `asset('images/...')`, or inline copy in Blade outside of `@phrase` defaults. Missing phrases log a warning and fall back to the provided default.

## Cache invalidation
* All SSOT models (`Media`, `Link`, `Event`, `Phrase`) use observers to flush relevant caches on create/update/delete.
* The optimisation job for media bumps the `version` column which is appended as `?v={version}` to public URLs.
* If caches ever need a manual reset, run `php artisan cache:clear`.

## Consistency audit command
```
php artisan site:audit-consistency
```

The audit scans `app/`, `resources/views/`, `routes/`, and `config/` for:
* Direct `/storage/` references
* Calls to `Storage::url()`
* `asset('images/...')`

Use `--fix` for simple replacements (e.g. `asset('images/foo.png')` → `ssot_image_url('foo')`). Review the diff afterwards to ensure the generated purpose key matches your expectations.

```
php artisan site:audit-consistency --fix
```

## Adding new phrases or assets
1. Create the media/link/phrase record through the admin UI.
2. Reference it with the relevant helper inside Blade or PHP.
3. Avoid inline literals; instead add a fallback default to `@phrase('key', 'Default text')` and replace it once the phrase exists.

## Suggested workflow
1. Implement feature using helpers and sensible fallback defaults.
2. Add the required phrases/links/media through the admin panel (or seeders for local environments).
3. Run `php artisan site:audit-consistency --fix` and `php artisan cache:clear` before committing.
