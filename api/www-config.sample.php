<?php
// SAMPLE contact/mail config. The REAL file lives OUTSIDE the web docroot at
// /etc/journeyways/www-config.php (owner theagitist:www-data, mode 0640) so it is
// never served even if PHP is down, and is never committed. api/contact.php
// require()s that absolute path. Copy this, fill in real values, deploy to /etc.
//
//   sudo install -o theagitist -g www-data -m 0640 \
//       api/www-config.sample.php /etc/journeyways/www-config.php
//   sudo -e /etc/journeyways/www-config.php   # then fill in the secrets

// ZeptoMail SMTP (see ~/apps/keys/zeptomail; memory project_email_zeptomail).
define('JW_SMTP_HOST', 'smtp.zeptomail.com');
define('JW_SMTP_PORT', 465);                       // implicit TLS
define('JW_SMTP_USER', 'emailapikey');
define('JW_SMTP_PASS', 'PUT-THE-ZEPTOMAIL-TOKEN-HERE');
define('JW_SMTP_FROM', 'no-reply@journeyways.ca'); // verified sender
define('JW_CONTACT_EMAIL', 'aemjcr@gmail.com');    // where submissions are delivered

// Cloudflare Turnstile secret (server side). Leave '' to skip verification.
define('JW_TURNSTILE_SECRET', '');
