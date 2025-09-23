# Contact Form Integration Notes

## Environment configuration

The contact workflow relies on the following environment variables:

| Key | Description |
| --- | --- |
| `MAIL_TO_ADDRESS` | Primary address that will receive new submission notifications. Falls back to `info@pointofmadness.nl` when left empty. |
| `MAIL_TO_NAME` | Optional friendly name for the notification recipient. |
| `CAPTCHA_PROVIDER` | Either `recaptcha` (default) or `hcaptcha`. Controls which front-end script is loaded. |
| `CAPTCHA_SITE_KEY` | Public site key issued by the captcha provider. Leave empty to disable captcha checks locally. |
| `CAPTCHA_SECRET_KEY` | Secret key used on the server to validate captcha tokens. Leave empty to bypass verification locally. |
| `CAPTCHA_MINIMUM_SCORE` | Minimum acceptable score for reCAPTCHA v3 (defaults to `0.5`). Ignored by hCaptcha. |

After updating the `.env` file, run `php artisan config:clear` so the new configuration is picked up.

## Local testing tips

1. Run database migrations so the `contact_submissions` table exists:
   ```bash
   php artisan migrate
   ```
2. The form submits asynchronously via `fetch`. When testing locally without a build step you can rely on Vite’s dev server (`npm run dev`) or compile assets (`npm run build`).
3. Captcha verification is skipped automatically when `CAPTCHA_SECRET_KEY` is empty, which simplifies local testing.
4. Mail is configured to use the `log` driver by default. Check `storage/logs/laravel.log` for the notification and auto-reply payloads.

## JavaScript submission flow

- The Blade template injects the site key and provider name so the front-end can request a captcha token before sending the request.
- Validation and submission run through `fetch` with JSON responses. Success and error states are displayed inline without a page refresh.
- Focus is routed to the success banner or first field with an error to preserve accessibility.

## Attachment handling

- Attachments are validated for type (`pdf`, `jpg`, `jpeg`, `png`, `webp`) and size (maximum 5&nbsp;MB) before the form request succeeds.
- Files are stored temporarily on the local disk under a hashed filename and are removed immediately after both notification emails are dispatched.
- Only the notification email sent to Point of Madness receives the attachment. The auto-reply does not include any uploaded files.

## Audit metadata

Each stored submission records a salted hash of the requester’s IP address and user agent together with the HTTP referrer. This helps with abuse tracking while avoiding the storage of raw personal data.
