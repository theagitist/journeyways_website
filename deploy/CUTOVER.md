# www.journeyways.ca -> PHP-FPM localization cutover (operator runbook)

Everything for the es/fr localization is staged in the docroot and verified locally
with `php -S`. Going live is an nginx change (needs `sudo nginx -t` + reload) plus one
out-of-docroot secrets file. This is the ONLY step left; it is fully reversible.

Reference vhost: `deploy/nginx-www.journeyways.ca.conf`. Contact handler:
`api/contact.php` (self-test: `php api/contact.php`). Secrets shape:
`api/www-config.sample.php`.

## 0. Pre-flight (no changes yet)

```sh
systemctl is-active php8.3-fpm            # must be active; socket /run/php/php8.3-fpm.sock
php /var/www/www.journeyways.ca/api/contact.php   # -> "contact.php self-test OK"
php /var/www/www.journeyways.ca/bin/gen-sitemap.php   # refresh sitemap.xml if routes changed
```

## 1. Create the out-of-docroot secrets file

```sh
sudo install -d -o root -g root -m 0755 /etc/journeyways
sudo install -o theagitist -g www-data -m 0640 \
    /var/www/www.journeyways.ca/api/www-config.sample.php /etc/journeyways/www-config.php
sudo -e /etc/journeyways/www-config.php    # fill JW_SMTP_PASS (ZeptoMail token from
                                           # ~/apps/keys/zeptomail) and, if used,
                                           # JW_TURNSTILE_SECRET. Keep JW_SMTP_FROM =
                                           # no-reply@journeyways.ca, JW_CONTACT_EMAIL =
                                           # aemjcr@gmail.com.
```

Confirm php-fpm (www-data) can read it, and that it is NOT under the docroot:

```sh
sudo -u www-data php -r 'require "/etc/journeyways/www-config.php"; echo JW_SMTP_HOST,"\n";'
```

## 2. Move the superseded static page HTML aside (reversible)

The front controller only serves a path if no real file shadows it, so the 14 page
`*.html` must leave the docroot. KEEP `presentation.html` and `google*.html` (Search
Console) and all assets. Use `git mv` so rollback is one command.

```sh
cd /var/www/www.journeyways.ca
mkdir -p legacy-html
git mv index.html boardgame.html about.html design.html videogame.html updates.html \
       components.html components-cards.html components-tiles.html \
       components-manual.html components-booklet.html references.html \
       photos.html contact.html legacy-html/
# (presentation.html, google6fb8a72b75fa8894.html stay in place)
```

`deploy/nginx-www.journeyways.ca.conf` denies `location ~ ^/(...|deploy)/`, but
`legacy-html/` is NOT denied; that's fine (they're the same pages, just stale). If you
prefer, add `legacy-html` to that deny regex too.

## 3. Apply the vhost

Edit `/etc/nginx/sites-available/www.journeyways.ca.conf` to match
`deploy/nginx-www.journeyways.ca.conf` (diff summary at the top of that file). The four
substantive changes: `index index.php`; replace the `location /api/` Node proxy with the
`location = /api/contact` php-fpm block; add the front-controller `location /` +
`location = /index.php`; add the app-source/`.json`/`.php` deny blocks. Keep the play
`/api/cards|tiles` + `/img/cards|tiles/` proxies unchanged.

```sh
sudo nginx -t && sudo systemctl reload nginx
```

## 4. Verify live (through Cloudflare; force IPv4)

```sh
# pages: en bare, es/fr prefixed -> 200, correct <html lang> + self-canonical
for u in / /es/ /fr/ /boardgame.html /es/boardgame.html /fr/boardgame.html \
         /contact.html /es/contact.html; do
  curl -4 -s -o /dev/null -w "%{http_code}  $u\n" "https://www.journeyways.ca$u"
done
curl -4 -s https://www.journeyways.ca/es/boardgame.html | grep -oE '<html lang="es"|<title>[^<]*<'
# English-only pages: es must 404
curl -4 -s -o /dev/null -w "%{http_code} es-cards (want 404)\n" https://www.journeyways.ca/es/components-cards.html
# security: all must be 403/404
for u in /.git/config /server/.env /inc/i18n.php /lang/en/index.json \
         /partials/head.php /api/contact.php /templates/index.php; do
  curl -4 -s -o /dev/null -w "%{http_code}  $u (want 403/404)\n" "https://www.journeyways.ca$u"
done
# contact form: a valid POST should send + return {"ok":true}; an invalid one a localized error
curl -4 -s -X POST https://www.journeyways.ca/api/contact \
  -H 'Content-Type: application/json' \
  -d '{"lang":"es","name":"Prueba","email":"you@example.com","message":"hola","interests":["researcher"]}'
```

Also load `/`, `/es/`, `/fr/` in a browser: nav switcher works, the suggestion banner
appears only on Accept-Language mismatch, and the contact-page Turnstile renders (it is
domain-locked, so it only works on the real host, not localhost).

## 5. Retire Node (only after step 4 passes)

```sh
pm2 delete journeyways-www 2>/dev/null; pm2 save
cd /var/www/www.journeyways.ca && git rm -r server/    # source in git history if ever needed
```

## 6. Cloudflare cache

HTML is served DYNAMIC (uncached), so localized pages appear immediately. Assets
(css/js/img/pdf) are edge-cached; `main.js` is already at `?v=23` and other bumped
assets carry `?v=`. The `~/apps/keys/cloudflare-token` cannot purge; there is no bare
same-name asset that changed content without a `?v=` bump, so no purge is needed.

## Rollback (any time)

```sh
cd /var/www/www.journeyways.ca && git mv legacy-html/*.html .   # restore static pages
# revert /etc/nginx/sites-available/www.journeyways.ca.conf to the Node-proxy version
sudo nginx -t && sudo systemctl reload nginx
pm2 start server/ecosystem.config.cjs 2>/dev/null   # if the contact backend is wanted back
```

The static tree is a complete, working fallback; the PHP layer sits on top of the same
docroot, so reverting the vhost + restoring the `*.html` is a full rollback.
