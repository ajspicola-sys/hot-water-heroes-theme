<?php
/**
 * Hot Water Heroes Plumbing — Single Service-Location Template
 * Renders the localized service-specific landing page (e.g. Lutz > Water Heater Repair).
 */
get_header();

$current_id   = get_the_ID();
$parent_id    = wp_get_post_parent_id($current_id);
$city_name    = get_the_title($parent_id);

// Find matching base service post
$service_slug = get_post_field('post_name', $current_id);
$service_posts = get_posts([
    'post_type'      => 'service',
    'name'           => $service_slug,
    'posts_per_page' => 1,
    'post_status'    => 'publish',
]);

$service_post = !empty($service_posts) ? $service_posts[0] : null;
$base_title   = $service_post ? $service_post->post_title : 'Plumbing Service';

// Helper function to localise text
if (!function_exists('hwh_localize_matrix_text')) {
    function hwh_localize_matrix_text($text, $city) {
        if (empty($text)) return '';
        $replacement = $city . ', FL';
        return preg_replace(
            '/(?<!south\s|new\s|west\s|east\s|north\s)\bTampa(?:\s+Bay)?(?:,\s+FL)?\b/i',
            $replacement,
            $text
        );
    }
}

// Fetch metadata from base service
$base_id  = $service_post ? $service_post->ID : $current_id;
$icon     = get_post_meta($base_id, '_service_icon', true) ?: '🔧';
$price    = get_post_meta($base_id, '_service_price', true);
$duration = get_post_meta($base_id, '_service_duration', true);

$excerpt  = get_post_field('post_excerpt', $base_id);
$content  = get_post_field('post_content', $base_id);

// Localize excerpt and content
$localized_excerpt = hwh_localize_matrix_text($excerpt, $city_name);
if (empty($localized_excerpt)) {
    $localized_excerpt = 'Fast, reliable ' . esc_html(strtolower($base_title)) . ' services in ' . esc_html($city_name) . ', FL. Same-day service available from licensed local plumbing experts.';
}

if ($content) {
    // Apply filters to expand shortcodes and tags
    $localized_content = apply_filters('the_content', $content);
    $localized_content = hwh_localize_matrix_text($localized_content, $city_name);
} else {
    // Elegant fallback content specifically for this combination
    $localized_content = '
    <p>Welcome to Hot Water Heroes Plumbing, your trusted local destination for professional <strong>' . esc_html($base_title) . '</strong> in <strong>' . esc_html($city_name) . ', FL</strong>. We know that plumbing issues can be stressful and disruptive, which is why our certified, licensed, and insured plumbing team is available same-day to restore comfort and safety to your home.</p>
    
    <h3>Why Choose Us for ' . esc_html($base_title) . ' in ' . esc_html($city_name) . '?</h3>
    <ul>
        <li><strong>Local Expertise</strong> — We serve ' . esc_html($city_name) . ' neighborhoods daily with prompt response times.</li>
        <li><strong>Licensed & Insured</strong> — All repairs and installations are done by certified, professional plumbers.</li>
        <li><strong>Upfront, Honest Pricing</strong> — We provide clear, written estimates before we begin any work.</li>
        <li><strong>Same-Day Availability</strong> — Same-day response for hot water heaters and urgent plumbing repairs.</li>
    </ul>
    
    <h3>Our Service Standards</h3>
    <p>We stand behind every ' . esc_html(strtolower($base_title)) . ' we perform with a 100% satisfaction guarantee. Whether you are dealing with a minor leak, require a full commercial water heater installation, or need emergency drain cleaning, our team is equipped with state-of-the-art tools and equipment to complete the job cleanly and efficiently.</p>
    
    <p>Don\'t let a small plumbing issue turn into a major headache. Call <strong>813-42-PLUMB (75862)</strong> or schedule your service online today to get a Hot Water Hero dispatched to your door in ' . esc_html($city_name) . '.</p>';
}

$has_image = has_post_thumbnail($base_id);
?>

<main class="site-main" id="main-content">

    <!-- ── JSON-LD Local Schema ──────────────────────────────────── -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "PlumbingService",
      "name": "<?php echo esc_attr($base_title); ?> in <?php echo esc_attr($city_name); ?>, FL",
      "image": "https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png",
      "@id": "<?php the_permalink(); ?>#plumbingservice",
      "url": "<?php the_permalink(); ?>",
      "telephone": "+18134275862",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "9249 Lazy Ln",
        "addressLocality": "Tampa",
        "addressRegion": "FL",
        "postalCode": "33614",
        "addressCountry": "US"
      },
      "areaServed": {
        "@type": "City",
        "name": "<?php echo esc_attr($city_name); ?>",
        "containedInPlace": {
          "@type": "State",
          "name": "Florida"
        }
      },
      "provider": {
        "@type": "LocalBusiness",
        "name": "Hot Water Heroes Plumbing",
        "image": "https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png",
        "telephone": "+18134275862"
      }
    }
    </script>

    <!-- ── Hero Section ──────────────────────────────────────────── -->
    <section class="hwh-hero hwh-hero--inner" aria-label="<?php echo esc_attr($base_title); ?> in <?php echo esc_attr($city_name); ?>, FL">
        <div class="hwh-hero__overlay" aria-hidden="true"></div>
        <div class="hwh-hero__grid" aria-hidden="true"></div>
        <div class="hwh-section-inner" style="position:relative;z-index:2;text-align:center;padding-top:4rem;padding-bottom:4rem;">
            
            <nav class="breadcrumbs breadcrumbs--hero" aria-label="Breadcrumb" style="display:inline-block;margin-bottom:1.5rem;" itemscope itemtype="https://schema.org/BreadcrumbList">
                <ol class="breadcrumbs__list" style="display:flex;gap:0.5rem;justify-content:center;list-style:none;padding:0;margin:0;font-size:0.9rem;opacity:0.85;">
                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="<?php echo esc_url(home_url('/')); ?>" itemprop="item" style="color:#fff;text-decoration:none;"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadcrumbs__sep" aria-hidden="true" style="color:#fff;">›</li>
                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="<?php echo esc_url(get_permalink($parent_id)); ?>" itemprop="item" style="color:#fff;text-decoration:none;"><span itemprop="name"><?php echo esc_html($city_name); ?></span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li class="breadcrumbs__sep" aria-hidden="true" style="color:#fff;">›</li>
                    <li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                        <span itemprop="name" style="color:#fff;font-weight:600;"><?php echo esc_html($base_title); ?></span>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </nav>

            <span class="hwh-label hwh-label--white" style="display:block;margin:0 auto 1rem auto;width:max-content;"><?php echo esc_html($icon); ?> Local Service</span>
            <h1 class="hwh-section-title hwh-section-title--white" style="margin-bottom:1rem;font-size:3rem;line-height:1.1;">
                <?php echo esc_html($base_title); ?><br><em>in <?php echo esc_html($city_name); ?>, FL</em>
            </h1>
            <p class="hwh-section-desc hwh-section-desc--muted" style="max-width:650px;margin:0 auto 2rem auto;">
                <?php echo esc_html($localized_excerpt); ?>
            </p>
            
            <?php if ($price || $duration): ?>
            <div style="display:flex;gap:2rem;justify-content:center;margin-bottom:2rem;flex-wrap:wrap;">
                <?php if ($price): ?>
                <div style="background:rgba(255,255,255,0.1);padding:0.75rem 1.5rem;border-radius:10px;border:1px solid rgba(255,255,255,0.15);">
                    <span style="display:block;font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;opacity:0.8;color:#fff;">Starting at</span>
                    <strong style="font-size:1.4rem;color:#fff;"><?php echo esc_html($price); ?></strong>
                </div>
                <?php endif; ?>
                <?php if ($duration): ?>
                <div style="background:rgba(255,255,255,0.1);padding:0.75rem 1.5rem;border-radius:10px;border:1px solid rgba(255,255,255,0.15);">
                    <span style="display:block;font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;opacity:0.8;color:#fff;">Typical Duration</span>
                    <strong style="font-size:1.4rem;color:#fff;"><?php echo esc_html($duration); ?></strong>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hwh-btn hwh-btn--red hwh-btn--lg">Request Service</a>
                <a href="tel:+18134275862" class="hwh-btn hwh-btn--ghost hwh-btn--lg">Call 813-42-PLUMB (75862)</a>
            </div>
        </div>
    </section>

    <!-- ── Content Grid ──────────────────────────────────────────── -->
    <section class="hwh-location-service-body" aria-label="Service Details" style="padding-top:5rem;padding-bottom:5rem;">
        <div class="hwh-section-inner" style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr;gap:4rem;">
            
            <!-- Left Side: Main localized copy -->
            <div style="background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,0.02);border:1px solid #EEF2F8;padding:3rem;font-size:1.15rem;line-height:1.8;color:#3D6491;">
                <?php if ($has_image): ?>
                    <div style="margin:-3rem -3rem 3rem -3rem;border-radius:18px 18px 0 0;overflow:hidden;aspect-ratio:21/9;">
                        <?php echo get_the_post_thumbnail($base_id, 'large', array('style' => 'width:100%;height:100%;object-fit:cover;')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="hwh-localized-copy-block">
                    <?php echo $localized_content; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- ── Local Trust Bar ───────────────────────────────────────── -->
    <section class="hwh-trust-bar" style="background:#F4F6FA;padding:2.5rem 0;border-top:1px solid #E5EBF5;border-bottom:1px solid #E5EBF5;">
        <div class="hwh-section-inner">
            <div style="display:flex;justify-content:space-around;align-items:center;flex-wrap:wrap;gap:2rem;">
                <div style="text-align:center;flex:1;min-width:200px;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">⭐ ⭐ ⭐ ⭐ ⭐</div>
                    <strong style="color:#0F2440;display:block;">5.0 Google Rating</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">30+ verified local reviews</span>
                </div>
                <div style="text-align:center;flex:1;min-width:200px;border-left:1px solid #D0DAEA;border-right:1px solid #D0DAEA;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">⏱️</div>
                    <strong style="color:#0F2440;display:block;">Same-Day Service</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">Water Heaters & Repairs in <?php echo esc_html($city_name); ?></span>
                </div>
                <div style="text-align:center;flex:1;min-width:200px;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">🛡️</div>
                    <strong style="color:#0F2440;display:block;">100% Satisfaction</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">We stand behind all our plumbing work</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Recent Jobs Near You ──────────────────────────────────── -->
    <?php hwh_render_jobs_section($parent_id, $city_name); ?>

    <!-- ── Local Google Reviews ──────────────────────────────────── -->
    <?php hwh_render_reviews_section($parent_id, $city_name); ?>

    <!-- ── Local Google Map ──────────────────────────────────────── -->
    <section class="hwh-location-map" aria-label="Our Service Map in <?php echo esc_attr($city_name); ?>, FL" style="padding-top:4rem;padding-bottom:5rem;background:#F8F9FB;border-top:1px solid #EEF2F8;">
        <div class="hwh-section-inner">
            <div style="text-align:center;margin-bottom:3rem;">
                <span class="hwh-label">Find Us Nearby</span>
                <h2 class="hwh-section-title">Serving <?php echo esc_html($city_name); ?>, FL</h2>
                <p class="hwh-section-desc">Prompt response times for <?php echo esc_html(strtolower($base_title)); ?> directly to <?php echo esc_html($city_name); ?> homeowners.</p>
            </div>
            <div style="box-shadow:0 15px 35px rgba(0,0,0,0.06);border-radius:18px;overflow:hidden;border:1px solid #EEF2F8;max-width:1000px;margin:0 auto;">
                <iframe 
                    width="100%" 
                    height="450" 
                    frameborder="0" 
                    style="border:0;display:block;" 
                    src="https://maps.google.com/maps?q=<?php echo urlencode( $city_name . ', FL' ); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                    allowfullscreen 
                    aria-label="Google Map showing <?php echo esc_attr($city_name); ?>, FL">
                </iframe>
            </div>
        </div>
    </section>

    <!-- ── Emergency Plumbing CTA ────────────────────────────────── -->
    <section class="hwh-cta" aria-label="Emergency plumbing CTA">
        <div class="hwh-cta__inner">
            <div>
                <h2 class="hwh-cta__title">Need Urgent <?php echo esc_html($base_title); ?> in <?php echo esc_html($city_name); ?>?<br>
                    <span style="opacity:.85;font-size:.85em;">We're Available Right Now.</span>
                </h2>
                <p class="hwh-cta__text">
                    Don't wait for a leak to get worse. Our plumbing technicians are available 24/7 for same-day repairs across <?php echo esc_html($city_name); ?>, FL.
                </p>
            </div>
            <div class="hwh-cta__actions">
                <a href="tel:+18134275862" class="hwh-btn hwh-btn--white hwh-btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.68 2.81a2 2 0 0 1-.45 2.11L7.91 9.27a16 16 0 0 0 6.29 6.29l1.45-1.45a2 2 0 0 1 2.11-.45c.91.32 1.85.55 2.81.68A2 2 0 0 1 22 16.92z" />
                    </svg>
                    Call 813-42-PLUMB (75862)
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hwh-btn hwh-btn--ghost-white hwh-btn--lg">
                    Schedule Online
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
