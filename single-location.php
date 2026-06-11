<?php
/**
 * Hot Water Heroes Plumbing — Single Area Served (Location) Template
 * Premium localized hub page for each targeted neighborhood/city.
 */

// If this location has a parent, it is a service-location page (e.g. Lutz > Water Heater Repair)
if ( wp_get_post_parent_id( get_the_ID() ) ) {
    include get_template_directory() . '/single-location-service.php';
    exit;
}

get_header();
?>

<main class="site-main" id="main-content">

    <!-- ── JSON-LD Local Schema ──────────────────────────────────── -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "PlumbingService",
      "name": "Hot Water Heroes Plumbing — <?php the_title(); ?>",
      "image": "https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png",
      "@id": "<?php the_permalink(); ?>#plumbingservice",
      "url": "<?php the_permalink(); ?>",
      "telephone": "813-427-5862",
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
        "name": "<?php the_title(); ?>",
        "containedInPlace": {
          "@type": "State",
          "name": "Florida"
        }
      },
      "provider": {
        "@type": "LocalBusiness",
        "name": "Hot Water Heroes Plumbing",
        "image": "https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png",
        "telephone": "813-427-5862"
      }
    }
    </script>

    <!-- ── Page Hero ─────────────────────────────────────────────── -->
    <section class="hwh-hero hwh-hero--inner" aria-label="24/7 Plumber in <?php the_title(); ?>, FL">
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
                        <span itemprop="name" style="color:#fff;opacity:0.75;">Areas Served</span>
                        <meta itemprop="position" content="2">
                    </li>
                    <li class="breadcrumbs__sep" aria-hidden="true" style="color:#fff;">›</li>
                    <li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                        <span itemprop="name" style="color:#fff;font-weight:600;"><?php the_title(); ?></span>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </nav>

            <span class="hwh-label hwh-label--white" style="display:block;margin:0 auto 1rem auto;width:max-content;">Local Plumbing Service</span>
            <h1 class="hwh-section-title hwh-section-title--white" style="margin-bottom:1rem;font-size:3rem;line-height:1.1;">
                24/7 Plumber in<br><em><?php the_title(); ?>, FL</em>
            </h1>
            <p class="hwh-section-desc hwh-section-desc--muted" style="max-width:650px;margin:0 auto 2rem auto;">
                Tampa Bay's trusted plumbing heroes, available same-day for hot water heaters, drain cleaning, leak repair, and emergency plumbing in <?php the_title(); ?>.
            </p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:2rem;">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hwh-btn hwh-btn--red hwh-btn--lg">Request Service</a>
                <a href="tel:+18134275862" class="hwh-btn hwh-btn--ghost hwh-btn--lg">Call 813-42-PLUMB (75862)</a>
            </div>
        </div>
    </section>

    <!-- ── Intro Content Section ─────────────────────────────────── -->
    <section class="hwh-location-intro" aria-label="Plumbing services overview" style="padding-top:5rem;padding-bottom:3rem;">
        <div class="hwh-section-inner" style="max-width:800px;margin:0 auto;text-align:center;">
            <div style="text-align:center;margin-bottom:2rem;">
                <span class="hwh-label">Welcome to <?php the_title(); ?></span>
                <h2 class="hwh-section-title" style="margin-top:0.5rem;font-size:2.2rem;">Your Neighborhood Plumbing Experts</h2>
            </div>
            <div class="hwh-location-text" style="font-size:1.15rem;line-height:1.75;color:#3D6491;text-align:justify;text-align-last:center;">
                <?php 
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; 
                ?>
            </div>
        </div>
    </section>

    <!-- ── Trust Badges Section ──────────────────────────────────── -->
    <section class="hwh-trust-bar" style="background:#F0F4F8;padding:2.5rem 0;border-top:1px solid #E1E8F0;border-bottom:1px solid #E1E8F0;">
        <div class="hwh-section-inner">
            <div style="display:flex;justify-content:space-around;align-items:center;flex-wrap:wrap;gap:2rem;">
                <div style="text-align:center;flex:1;min-width:200px;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">⭐ ⭐ ⭐ ⭐ ⭐</div>
                    <strong style="color:#0B2347;display:block;">5.0 Google Rating</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">30+ verified local reviews</span>
                </div>
                <div style="text-align:center;flex:1;min-width:200px;border-left:1px solid #D0DBE6;border-right:1px solid #D0DBE6;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">⏱️</div>
                    <strong style="color:#0B2347;display:block;">Same-Day Service</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">Available for most plumbing repairs</span>
                </div>
                <div style="text-align:center;flex:1;min-width:200px;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">💼</div>
                    <strong style="color:#0B2347;display:block;">Licensed & Insured</strong>
                    <span style="font-size:0.9rem;color:#3D6491;">Professional service you can trust</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Services Grid ─────────────────────────────────────────── -->
    <section class="hwh-services" aria-label="Plumbing services in <?php the_title(); ?>, FL" style="padding-top:5rem;padding-bottom:5rem;">
        <div class="hwh-section-inner">
            <div style="text-align:center;margin-bottom:4rem;">
                <span class="hwh-label">Services We Provide</span>
                <h2 class="hwh-section-title">Professional Plumbing Services</h2>
                <p class="hwh-section-desc">From water heaters to emergency drain clogs, we do it all with transparency and honesty.</p>
            </div>

            <?php
            $services_query = new WP_Query([
                'post_type' => 'service',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'no_found_rows' => true,
            ]);

            if ($services_query->have_posts()): ?>

                <div class="hwh-services-grid">
                    <?php 
                    $idx = 1;
                    while ($services_query->have_posts()):
                        $services_query->the_post();
                        $num = str_pad($idx, 2, '0', STR_PAD_LEFT);
                        $price = get_post_meta(get_the_ID(), '_service_price', true);
                        $benefits_text = get_post_meta(get_the_ID(), '_service_benefits', true);
                        $benefits = [];
                        if (!empty($benefits_text)) {
                            $benefits = array_filter(array_map('trim', explode("\n", $benefits_text)));
                        }
                        if (empty($benefits)) {
                            $benefits = ['Licensed & Insured', 'Upfront Flat Rates', 'Same-Day Response'];
                        }

                        $excerpt = get_post_field('post_excerpt', get_the_ID());
                        $content = get_post_field('post_content', get_the_ID());
                        if ($excerpt) {
                            $desc = wp_trim_words($excerpt, 18);
                        } elseif ($content) {
                            $desc = wp_trim_words(strip_shortcodes(wp_strip_all_tags($content)), 18);
                        } else {
                            $desc = 'Expert plumbing service from Tampa Bay\'s trusted team. Licensed, insured, and available 24/7.';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>" class="hwh-service-card reveal">
                            <div class="hwh-service-card__img-wrap">
                                <img src="<?php echo esc_url(hwh_get_service_image_url(get_the_ID())); ?>" alt="<?php the_title_attribute(); ?>" class="hwh-service-card__img" loading="lazy" decoding="async">
                                <div class="hwh-service-card__number"><?php echo esc_html($num); ?></div>
                            </div>
                            <div class="hwh-service-card__info">
                                <h3 class="hwh-service-card__title"><?php the_title(); ?></h3>
                                <p class="hwh-service-card__text"><?php echo esc_html($desc); ?></p>
                                <ul class="hwh-service-card__list">
                                    <?php foreach ($benefits as $benefit) : ?>
                                        <li>
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="hwh-checkmark-svg"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <?php echo esc_html($benefit); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="hwh-service-card__link">Learn More <i class="hwh-link-arrow">→</i></div>
                            </div>
                        </a>
                    <?php 
                        $idx++;
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>

            <?php else: ?>
                <p style="text-align:center;padding:4rem 0;font-size:1.1rem;color:#3D6491;">
                    No services found. <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact us directly.</a>
                </p>
            <?php endif; ?>

        </div>
    </section>

    <!-- ── Map Section ───────────────────────────────────────────── -->
    <section class="hwh-location-map" aria-label="Our Service Area Map in <?php the_title(); ?>, FL" style="padding-top:4rem;padding-bottom:5rem;background:#F9FBFC;border-top:1px solid #EAF0F6;">
        <div class="hwh-section-inner">
            <div style="text-align:center;margin-bottom:3rem;">
                <span class="hwh-label">Find Us Nearby</span>
                <h2 class="hwh-section-title">Our <?php the_title(); ?> Service Area</h2>
                <p class="hwh-section-desc">Prompt, local, and reliable plumbing response directly to your neighborhood in <?php the_title(); ?>, FL.</p>
            </div>
            <div style="box-shadow:0 15px 35px rgba(0,0,0,0.06);border-radius:18px;overflow:hidden;border:1px solid #EAF0F6;max-width:1000px;margin:0 auto;">
                <iframe 
                    width="100%" 
                    height="450" 
                    frameborder="0" 
                    style="border:0;display:block;" 
                    src="https://maps.google.com/maps?q=<?php echo urlencode( get_the_title() . ', FL' ); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                    allowfullscreen 
                    aria-label="Google Map showing <?php the_title(); ?>, FL">
                </iframe>
            </div>
        </div>
    </section>

    <!-- ── Bottom CTA ────────────────────────────────────────────── -->
    <section class="hwh-cta" aria-label="Emergency plumbing CTA">
        <div class="hwh-cta__inner">
            <div>
                <h2 class="hwh-cta__title">Plumbing Emergency in <?php the_title(); ?>?<br>
                    <span style="opacity:.85;font-size:.85em;">We're Available Right Now.</span>
                </h2>
                <p class="hwh-cta__text">
                    Don't let a burst pipe or overflowing drain turn into a renovation.
                    Our emergency crew is standing by 24 hours a day, 7 days a week in <?php the_title(); ?>, FL.
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
