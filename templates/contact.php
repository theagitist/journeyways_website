<?php
// Contact page body. Chrome comes from partials/head + footer. Translatable text via t().
// Form mechanics (field names, checkbox values, ids, honeypot, Turnstile) are load-bearing
// and preserved verbatim; only human-readable labels/prose are localized.
$P = 'pages.contact';
?>
<main>
    <section class="pt-24 pb-14">
        <div class="max-w-2xl mx-auto px-4">
            <header class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-semibold text-yellow-400 mb-4 tracking-tight"><?= te("$P.hero.title") ?></h1>
                <p class="text-base md:text-lg text-gray-300 leading-relaxed">
                    <?= t("$P.hero.intro") ?>
                </p>
            </header>

            <section aria-labelledby="contact-form-heading" class="bg-gray-700/60 border border-gray-600 rounded p-6 md:p-7">
                <h2 id="contact-form-heading" class="sr-only"><?= te("$P.form.heading") ?></h2>

                <form id="contact-form" class="space-y-5" novalidate>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <label class="block">
                            <span class="text-sm font-medium text-gray-200"><?= te("$P.form.name_label") ?></span>
                            <input type="text" name="name" required maxlength="100" autocomplete="name" class="mt-1 block w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-gray-100 focus:outline-none focus:border-yellow-400">
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-gray-200"><?= te("$P.form.email_label") ?></span>
                            <input type="email" name="email" required maxlength="200" autocomplete="email" class="mt-1 block w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-gray-100 focus:outline-none focus:border-yellow-400">
                        </label>
                    </div>

                    <fieldset>
                        <legend class="text-sm font-medium text-gray-200 mb-2"><?= te("$P.form.interests_legend") ?></legend>
                        <div class="grid sm:grid-cols-2 gap-x-4 gap-y-2">
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="player" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.player") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="researcher" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.researcher") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="educator" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.educator") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="therapist" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.therapist") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="organizer" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.organizer") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="variant-author" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.variant-author") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="press" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.press") ?></span></label>
                            <label class="inline-flex items-start gap-2 text-sm text-gray-300"><input type="checkbox" name="interest" value="other" class="mt-1 accent-yellow-400"><span><?= te("$P.interests.other") ?></span></label>
                        </div>
                    </fieldset>

                    <label class="block">
                        <span class="text-sm font-medium text-gray-200"><?= te("$P.form.message_label") ?></span>
                        <textarea name="message" rows="4" maxlength="1000" class="mt-1 block w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-gray-100 focus:outline-none focus:border-yellow-400" placeholder="<?= te("$P.form.message_placeholder") ?>"></textarea>
                        <span class="text-xs text-gray-500 mt-1 block"><?= te("$P.form.message_hint") ?></span>
                    </label>

                    <!-- Honeypot field. Hidden from humans; bots fill it. -->
                    <div aria-hidden="true" style="position:absolute; left:-10000px; width:1px; height:1px; overflow:hidden;">
                        <label><?= te("$P.form.honeypot_label") ?> <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                    </div>

                    <!-- Cloudflare Turnstile widget. The injected hidden input is named cf-turnstile-response. -->
                    <div class="cf-turnstile" data-sitekey="0x4AAAAAADH4jzkHRx5UDcY3" data-theme="dark"></div>

                    <div class="flex items-center gap-4 flex-wrap">
                        <button type="submit" id="contact-submit" class="bg-yellow-400 text-black px-6 py-2.5 rounded font-medium hover:bg-yellow-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"><?= te("$P.form.submit") ?></button>
                        <p id="contact-status" role="status" aria-live="polite" class="text-sm text-gray-300"></p>
                    </div>
                </form>
            </section>
        </div>
    </section>
    </main>

<!-- Cloudflare Turnstile loader. Page-specific dependency for the contact form widget. -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
