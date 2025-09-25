# Consistentie en SSOT

## SSOT-afspraken
- Alle publiek zichtbare teksten komen uit de `phrases`-tabel via `@phrase('sleutel')`.
- Afbeeldingen staan op de `public`-disk en worden via `ssot_image_url('doel')` opgehaald.
- Links worden beheerd via `ssot_links('groep-of-slug')`.
- Events op de site gebruiken `ssot_events_upcoming()` en tonen alleen toekomstige items.

## Audit-tool
_De artisan-opdracht `site:audit-consistency` moet nog worden gerealiseerd._
Plan:
1. Scannen van `resources/views` op hardcoded teksten, `src="/images` en `href="http`.
2. Rapport tonen in de console met regels/ bestanden.
3. Optie `--fix` vervangt patronen door de juiste helper.

Totdat de tool beschikbaar is, controleer wijzigingen handmatig door te zoeken op `"` in Blade-bestanden en na te gaan of de inhoud via helpers loopt.
