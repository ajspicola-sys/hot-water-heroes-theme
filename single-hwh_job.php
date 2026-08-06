<?php
/**
 * Hot Water Heroes Plumbing — Single Job Check-In Page
 * Public per-job page: photos, note, neighborhood map, and local reviews.
 * This is the RealWork-style localized proof-of-work page.
 */
get_header();

$job_id      = get_the_ID();
$location_id = (int) get_post_meta($job_id, '_job_location', true);
$service_id  = (int) get_post_meta($job_id, '_job_service', true);
$jdate       = get_post_meta($job_id, '_job_date', true);
$city_name   = $location_id ? get_the_title($location_id) : 'Tampa';
$photos      = array_filter(array_map('intval', explode(',', (string) get_post_meta($job_id, '_job_photos', true))));
if (empty($photos) && has_post_thumbnail($job_id)) {
    $photos = [get_post_thumbnail_id($job_id)];
}
?>

<main class="site-main" id="main-content">

    <!-- ── JSON-LD Local Schema ──────────────────────────────────── -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "PlumbingService",
      "name": "Hot Water Heroes Plumbing — <?php echo esc_js(get_the_title()); ?>",
      "@id": "<?php the_permalink(); ?>#plumbingservice",
      "url": "<?php the_permalink(); ?>",
      "telephone": "+18134275862",
      "priceRange": "$$",
      "areaServed": {
        "@type": "City",
        "name": "<?php echo esc_js($city_name); ?>",
        "containedInPlace": { "@type": "State", "name": "Florida" }
      },
      "provider": {
        "@type": "LocalBusiness",
        "name": "Hot Water Heroes Plumbing",
        "telephone": "+18134275862"
      }
    }
    </script>

    <!-- ── Hero ──────────────────────────────────────────────────── -->
    <section class="hwh-hero hwh-hero--inner" aria-label="<?php the_title_attribute(); ?>">
        <div class="hwh-hero__overlay" aria-hidden="true"></div>
        <div class="hwh-hero__grid" aria-hidden="true"></div>
        <div class="hwh-section-inner" style="position:relative;z-index:2;text-align:center;padding-top:4rem;padding-bottom:4rem;">
            <nav class="breadcrumbs breadcrumbs--hero" aria-label="Breadcrumb" style="display:inline-block;margin-bottom:1.5rem;">
                <ol class="breadcrumbs__list" style="display:flex;gap:0.5rem;justify-content:center;list-style:none;padding:0;margin:0;font-size:0.9rem;opacity:0.85;flex-wrap:wrap;">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:#fff;text-decoration:none;">Home</a></li>
                    <li aria-hidden="true" style="color:#fff;">›</li>
                    <?php if ($location_id): ?>
                        <li><a href="<?php echo esc_url(get_permalink($location_id)); ?>" style="color:#fff;text-decoration:none;"><?php echo esc_html($city_name); ?></a></li>
                        <li aria-hidden="true" style="color:#fff;">›</li>
                    <?php endif; ?>
                    <li aria-current="page" style="color:#fff;font-weight:600;">Recent Job</li>
                </ol>
            </nav>
            <span class="hwh-label hwh-label--white" style="display:block;margin:0 auto 1rem auto;width:max-content;">✔ Completed Job</span>
            <h1 class="hwh-section-title hwh-section-title--white" style="margin-bottom:0.75rem;font-size:2.6rem;line-height:1.15;">
                <?php the_title(); ?><em>, FL</em>
            </h1>
            <?php if ($jdate): ?>
                <p class="hwh-section-desc hwh-section-desc--muted" style="margin:0 auto;">
                    Completed <?php echo esc_html(date_i18n('F j, Y', strtotime($jdate))); ?> in <?php echo esc_html($city_name); ?>, FL
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- ── Job Story: photos + note ──────────────────────────────── -->
    <section aria-label="Job details" style="padding-top:4rem;padding-bottom:4rem;">
        <div class="hwh-section-inner" style="max-width:900px;margin:0 auto;">

            <?php if (!empty($photos)): ?>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1rem;margin-bottom:2.5rem;">
                    <?php foreach ($photos as $pid):
                        $full = wp_get_attachment_image_url($pid, 'large');
                        if (!$full) continue; ?>
                        <img src="<?php echo esc_url($full); ?>" alt="<?php echo esc_attr(get_the_title() . ' — job photo'); ?>"
                             style="width:100%;height:280px;object-fit:cover;border-radius:14px;border:1px solid #EEF2F8;box-shadow:0 8px 20px rgba(15,36,64,0.06);" loading="lazy" decoding="async">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div style="text-align:center;margin-bottom:1.5rem;">
                <span class="hwh-label">What We Did</span>
            </div>
            <div style="font-size:1.15rem;line-height:1.75;color:#3D6491;max-width:720px;margin:0 auto;text-align:center;">
                <?php the_content(); ?>
            </div>

            <?php if ($service_id): ?>
                <div style="text-align:center;margin-top:2rem;">
                    <a href="<?php echo esc_url(get_permalink($service_id)); ?>" class="hwh-btn hwh-btn--ghost">Learn About Our <?php echo esc_html(get_the_title($service_id)); ?> Service →</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ── Local Reviews + Map ───────────────────────────────────── -->
    <?php if ($location_id) hwh_render_reviews_section($location_id, $city_name); ?>

    <section class="hwh-location-map" aria-label="Service area map — <?php echo esc_attr($city_name); ?>, FL" style="padding-top:4rem;padding-bottom:5rem;background:#F8F9FB;border-top:1px solid #EEF2F8;">
        <div class="hwh-section-inner">
            <div style="text-align:center;margin-bottom:3rem;">
                <span class="hwh-label">Your Neighborhood</span>
                <h2 class="hwh-section-title">We Work All Over <?php echo esc_html($city_name); ?></h2>
                <p class="hwh-section-desc">Need the same thing done at your place? We're already in the area.</p>
            </div>
            <div style="box-shadow:0 15px 35px rgba(0,0,0,0.06);border-radius:18px;overflow:hidden;border:1px solid #EEF2F8;max-width:1000px;margin:0 auto;">
                <iframe width="100%" height="400" frameborder="0" style="border:0;display:block;"
                    src="https://maps.google.com/maps?q=<?php echo urlencode($city_name . ', FL'); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen aria-label="Google Map showing <?php echo esc_attr($city_name); ?>, FL"></iframe>
            </div>
        </div>
    </section>

    <!-- ── Bottom CTA ────────────────────────────────────────────── -->
    <section class="hwh-cta" aria-label="Request service CTA">
        <div class="hwh-cta__inner">
            <div>
                <h2 class="hwh-cta__title">Need This Done in <?php echo esc_html($city_name); ?>?<br>
                    <span style="opacity:.85;font-size:.85em;">Same-Day Service Available.</span>
                </h2>
                <p class="hwh-cta__text">
                    Licensed, insured, and already working in your neighborhood.
                    Call now or request service online — we'll take care of it.
                </p>
            </div>
            <div class="hwh-cta__actions">
                <a href="tel:+18134275862" class="hwh-btn hwh-btn--white hwh-btn--lg">Call 813-42-PLUMB (75862)</a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hwh-btn hwh-btn--ghost-white hwh-btn--lg">Request Service</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
