# SSOT en Admin Panel Planning

## Checklist
1. Vastleggen SSOT-schema en ERD.
2. Migrations en modellen voor media, links, events, phrases.
3. Seeders en factories voor basisdata.
4. Helpers, Blade directive en cachingservices.
5. Media opslag en optimalisatiepipeline.
6. Admin routes, controllers, form requests.
7. Admin views met Tailwind.
8. Cache-invalidering en services.
9. Frontend SSOT-refactor.
10. Audit-commando en tests.
11. Documentatie en changelog.

## ERD (Option B)
- **media**: id, disk, path, purpose, alt, focal_point, mime_type, width, height, hash, version, created_at, updated_at.
- **links**: id, slug, label, url, target, rel, `order`, visible, group, created_at, updated_at.
- **phrases**: id, `key`, text, context, version, created_at, updated_at.
- **events**: id, title, starts_at, ends_at, location, description, media_id (nullable), link_id (nullable), created_at, updated_at.
- **users**: id, name, email, password, remember_token, timestamps.

Relaties:
- Event behoort tot Media (optioneel) en Link (optioneel).
- Media heeft veel Events.
- Link heeft veel Events.

Cache sleutels:
- nav:links
- footer:links
- events:upcoming
- media:by_purpose:<key>
- site:phrases
