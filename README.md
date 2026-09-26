# Creators Conclave

A multi-page site for Creators Conclave, an independent platform for creator conferences, awards, workshops, and partnerships.

The visual system is black-first with gold used as an accent. Content lives in `constants/` so copy and event data can change without rewriting layout.

## Run locally

From this folder:

```bash
php -S localhost:8000
```

Open [http://localhost:8000](http://localhost:8000).

## Pages

- `index.php` — home
- `about.php` — purpose, mission, vision, practices
- `events.php` — calendar with type filters
- `event-details.php?slug=summit-2026` — one template for every event
- `speakers.php` — creator directory
- `partners.php` — brand, sponsor, media, and community partners
- `gallery.php` — filterable gallery with lightbox
- `contact.php` — desks and enquiry form

## Structure

- `constants/` — page and shared content arrays
- `includes/` — header, navigation, footer, hero, section titles
- `components/` — event, speaker, partner, stat, and gallery cards
- `assets/css` — layout and components
- `assets/js` — navigation, filters, lightbox, Swiper, GSAP

Add a future event by appending an array in `constants/events.php`. Link speakers and sponsors with the slugs already used in `constants/speakers.php` and `constants/partners.php`.

Photography is from Unsplash and stored locally under `assets/images/`.
