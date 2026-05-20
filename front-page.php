<?php
/**
 * Template Name: Homepage
 * Hot Water Heroes Plumbing — Front Page v3 (Bold Redesign)
 */
get_header(); ?>

<main class="site-main" id="main-content">

<!-- ── Structured Data ── -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": ["Plumber", "HomeAndConstructionBusiness", "LocalBusiness"],
    "@id": "<?php echo esc_url(home_url('/')); ?>#business",
    "name": "Hot Water Heroes Plumbing",
    "alternateName": "HWH Plumbing",
    "description": "Tampa Bay's trusted plumbing company — expert water heater repair, installation, drain cleaning, leak detection, and 24/7 emergency plumbing services.",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    "telephone": "+18134275862",
    "email": "joe@hotwaterheroesplumbing.com",
    "priceRange": "$$",
    "image": "<?php echo esc_url(home_url('/')); ?>wp-content/uploads/hwh-logo.png",
    "address": { "@type": "PostalAddress", "addressLocality": "Tampa", "addressRegion": "FL", "addressCountry": "US" },
    "areaServed": [
        {"@type":"City","name":"Tampa"},{"@type":"City","name":"St. Petersburg"},
        {"@type":"City","name":"Clearwater"},{"@type":"City","name":"Brandon"},
        {"@type":"City","name":"Wesley Chapel"},{"@type":"City","name":"Riverview"}
    ],
    "aggregateRating": {"@type":"AggregateRating","ratingValue":"5","reviewCount":"30","bestRating":"5"},
    "sameAs": ["https://www.instagram.com/hotwaterheroes/","https://www.facebook.com/hotwaterheroes/"]
}
</script>

<!-- ══════════════════════════════════════════════════════
     HERO — Dark navy, bold red, full impact
     ══════════════════════════════════════════════════════ -->
<section class="hwh-hero" id="hero" aria-label="Hot Water Heroes Plumbing">
    <div class="hwh-hero__overlay" aria-hidden="true"></div>
    <div class="hwh-hero__grid" aria-hidden="true"></div>

    <div class="hwh-hero__inner">
        <div class="hwh-hero__content">
            <div class="hwh-hero__eyebrow">
                <span class="hwh-hero__dot" aria-hidden="true"></span>
                24/7 Emergency Plumbing · Tampa Bay, FL
            </div>

            <h1 class="hwh-hero__title">
                Your Plumbing Heroes.<br>
                <span class="hwh-hero__title-accent">We Fix It Today.</span>
            </h1>

            <p class="hwh-hero__sub">
                Licensed plumbers on call around the clock. Water heater repair, installation, drain cleaning & emergency plumbing — done right, backed by a satisfaction guarantee.
            </p>

            <div class="hwh-hero__actions">
                <a href="tel:+18134275862" class="hwh-btn hwh-btn--red hwh-btn--lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    813-42-PLUMB — (813) 427-5862
                </a>
                <a href="/contact/" class="hwh-btn hwh-btn--ghost hwh-btn--lg">
                    Book Online →
                </a>
            </div>

            <div class="hwh-hero__trust">
                <div class="hwh-hero__trust-item">✔ Licensed &amp; Insured</div>
                <div class="hwh-hero__trust-item">✔ Same-Day Service</div>
                <div class="hwh-hero__trust-item">✔ 5★ Google Rating</div>
                <div class="hwh-hero__trust-item">✔ No Hidden Fees</div>
            </div>
        </div>

        <div class="hwh-hero__visual" aria-hidden="true">
            <div class="hwh-hero__van-wrap">
                <img src="https://hotwaterheroesplumbing.com/wp-content/uploads/2025/12/HWH-HERO-VAN.png"
                     alt="Hot Water Heroes plumbing service van"
                     width="680" height="480"
                     fetchpriority="high" loading="eager" decoding="async"
                     class="hwh-hero__van">
            </div>
            <!-- Premium Glassmorphic Floating Cards -->
            <div class="hwh-hero__card hwh-hero__card--1">
                <span class="hwh-hero__card-icon">⭐</span>
                <div>
                    <strong>5.0 Google Rating</strong>
                    <span>30+ Verified Reviews</span>
                </div>
            </div>
            <div class="hwh-hero__card hwh-hero__card--2">
                <span class="hwh-hero__card-icon">⚡</span>
                <div>
                    <strong>Same-Day Service</strong>
                    <span>Available Today</span>
                </div>
            </div>
            <div class="hwh-hero__card hwh-hero__card--3">
                <span class="hwh-hero__card-icon">🛡️</span>
                <div>
                    <strong>Licensed &amp; Insured</strong>
                    <span>FL State Certified</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     STATS BAR — Red background, bold numbers
     ══════════════════════════════════════════════════════ -->
<section class="hwh-stats" aria-label="Company stats">
    <div class="hwh-stats__inner">
        <div class="hwh-stat-item">
            <span class="hwh-stat-item__num">300+</span>
            <span class="hwh-stat-item__label">Jobs Completed</span>
        </div>
        <div class="hwh-stat-item__div" aria-hidden="true"></div>
        <div class="hwh-stat-item">
            <span class="hwh-stat-item__num">30+</span>
            <span class="hwh-stat-item__label">5-Star Reviews</span>
        </div>
        <div class="hwh-stat-item__div" aria-hidden="true"></div>
        <div class="hwh-stat-item">
            <span class="hwh-stat-item__num">24/7</span>
            <span class="hwh-stat-item__label">Emergency Service</span>
        </div>
        <div class="hwh-stat-item__div" aria-hidden="true"></div>
        <div class="hwh-stat-item">
            <span class="hwh-stat-item__num">8+</span>
            <span class="hwh-stat-item__label">Cities Covered</span>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     SERVICES — Clean bold grid
     ══════════════════════════════════════════════════════ -->
<section class="hwh-services" id="services" aria-label="Our plumbing services">
    <div class="hwh-section-inner">
        <div class="hwh-section-header">
            <span class="hwh-label">What We Do</span>
            <h2 class="hwh-section-title">Plumbing Services<br><em>Built Around You</em></h2>
            <p class="hwh-section-desc">From water heater emergencies to routine drain cleaning — we handle it all with speed, skill, and upfront pricing.</p>
        </div>

        <?php
        $services = new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => 6,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'no_found_rows'  => true,
        ]);
        $fallback = [
            ['title'=>'Water Heater Repair',      'text'=>'Fast diagnosis and repair of all water heater brands and sizes. No hot water? We fix it same-day.', 'price' => '$99+'],
            ['title'=>'Water Heater Installation', 'text'=>'Full installation of tank and tankless units — properly sized, up to code, done right the first time.', 'price' => 'Free Est.'],
            ['title'=>'Tankless Water Heaters',   'text'=>'Endless hot water with a tankless upgrade. We sell, install, and service all major brands.', 'price' => 'Free Est.'],
            ['title'=>'Drain Cleaning',           'text'=>'Slow drains or full blockages cleared with hydro-jetting and professional snaking.', 'price' => '$99+'],
            ['title'=>'Emergency Plumbing',       'text'=>'Burst pipe? Major leak? We\'re available 24/7 — nights, weekends, and holidays.', 'price' => '24/7 Service'],
            ['title'=>'Leak Detection & Repair',  'text'=>'Non-invasive technology finds hidden leaks before they cause major damage to your home.', 'price' => '$150+'],
        ];

        // Safe helper to return custom SVGs and gradient classes for core plumbing services
        if (!function_exists('hwh_get_service_visuals')) {
            function hwh_get_service_visuals($title) {
                $title_clean = strtolower($title);
                $grad = 'hwh-gradient-navy';
                $svg = '';

                if (strpos($title_clean, 'repair') !== false && (strpos($title_clean, 'heater') !== false || strpos($title_clean, 'water') !== false)) {
                    $grad = 'hwh-gradient-red';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/><path d="M12 13c1.5 0 2.5-1.5 2.5-3S12 7 12 7s-2.5 1.5-2.5 3 1 3 2.5 3z" fill="currentColor"/></svg>';
                } elseif (strpos($title_clean, 'install') !== false && (strpos($title_clean, 'heater') !== false || strpos($title_clean, 'water') !== false)) {
                    $grad = 'hwh-gradient-orange';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="2" width="12" height="20" rx="3" /><path d="M12 6V2M9 10h6M9 14h6" /><circle cx="12" cy="18" r="1.5" fill="currentColor" /><path d="M19 13v6M16 16h6" /></svg>';
                } elseif (strpos($title_clean, 'tankless') !== false) {
                    $grad = 'hwh-gradient-crimson';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="5" y="4" width="14" height="16" rx="2" /><path d="M9 20v2M15 20v2" /><path d="M12 9c-1.5 0-2.5 1-2.5 2.5s2.5 2.5 2.5 4 1.5 1.5 2.5 1.5c1 0 1.5-.5 1.5-1.5s-2.5-2.5-2.5-4C13.5 10 13 9 12 9z" /><path d="M8 8h8" /></svg>';
                } elseif (strpos($title_clean, 'drain') !== false) {
                    $grad = 'hwh-gradient-blue';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5h4v6a6 6 0 0 0 12 0V5h4" /><path d="M8 12c1.5 1.5 3 0 4.5-1.5s3 0 4.5 1.5" /><path d="M10 15c1 1 2 0 3-1s2 0 3 1" /></svg>';
                } elseif (strpos($title_clean, 'emergency') !== false || strpos($title_clean, '24/7') !== false) {
                    $grad = 'hwh-gradient-darkred';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" /><path d="M12 8v5M12 16h.01" stroke-width="3" /></svg>';
                } elseif (strpos($title_clean, 'leak') !== false || strpos($title_clean, 'detection') !== false) {
                    $grad = 'hwh-gradient-teal';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12h10M18 12h4" /><circle cx="15" cy="12" r="4" /><path d="M18 15l4 4" /><path d="M15 10c0 1.5-1.5 2.5-1.5 2.5S12 11.5 12 10s1.5-2.5 1.5-2.5S15 8.5 15 10z" fill="currentColor" stroke="none" /></svg>';
                } else {
                    $grad = 'hwh-gradient-navy';
                    $svg = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>';
                }

                return ['grad' => $grad, 'svg' => $svg];
            }
        }
        ?>

        <div class="hwh-services-grid">
            <?php if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon  = get_post_meta(get_the_ID(), '_service_icon', true) ?: '';
                    $price = get_post_meta(get_the_ID(), '_service_price', true);
            ?>
                <article class="hwh-service-card reveal">
                    <div class="hwh-service-card__header-row">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="hwh-service-card__img">
                                <?php the_post_thumbnail("medium", ["loading" => "lazy", "decoding" => "async"]); ?>
                            </div>
                        <?php else :
                            $visuals = hwh_get_service_visuals(get_the_title());
                        ?>
                            <div class="hwh-service-card__icon-wrap <?php echo esc_attr($visuals['grad']); ?>">
                                <?php echo $visuals['svg']; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($price) : ?>
                            <span class="hwh-service-card__price-badge">From <?php echo esc_html($price); ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="hwh-service-card__title"><?php the_title(); ?></h3>
                    <p class="hwh-service-card__text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <a href="<?php the_permalink(); ?>" class="hwh-service-card__link">Learn More →</a>
                </article>
            <?php endwhile; wp_reset_postdata();
            else :
                foreach ($fallback as $svc) : 
                    $visuals = hwh_get_service_visuals($svc['title']);
                ?>
                <article class="hwh-service-card reveal">
                    <div class="hwh-service-card__header-row">
                        <div class="hwh-service-card__icon-wrap <?php echo esc_attr($visuals['grad']); ?>">
                            <?php echo $visuals['svg']; ?>
                        </div>
                        <?php if (!empty($svc['price'])) : ?>
                            <span class="hwh-service-card__price-badge">From <?php echo esc_html($svc['price']); ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="hwh-service-card__title"><?php echo esc_html($svc['title']); ?></h3>
                    <p class="hwh-service-card__text"><?php echo esc_html($svc['text']); ?></p>
                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hwh-service-card__link">Learn More →</a>
                </article>
            <?php endforeach; endif; ?>
        </div>

        <div class="hwh-center hwh-center--spaced">
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hwh-btn hwh-btn--navy hwh-btn--lg">See All Services →</a>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     HOW IT WORKS — Dark navy, bold numbered steps
     ══════════════════════════════════════════════════════ -->
<section class="hwh-process" aria-label="How our service works">
    <div class="hwh-section-inner">
        <div class="hwh-section-header hwh-section-header--light">
            <span class="hwh-label hwh-label--red">How It Works</span>
            <h2 class="hwh-section-title hwh-section-title--white">Service in 4 Simple Steps</h2>
            <p class="hwh-section-desc hwh-section-desc--muted">We make plumbing repairs painless — fast, transparent, and done right the first time.</p>
        </div>
        <div class="hwh-process-steps">
            <div class="hwh-process-step">
                <div class="hwh-process-step__num">01</div>
                <div class="hwh-process-step__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
                <h3 class="hwh-process-step__title">Call or Book Online</h3>
                <p class="hwh-process-step__text">Reach us 24/7 by phone or schedule online. We confirm your appointment fast — often same-day.</p>
            </div>
            <div class="hwh-process-connector" aria-hidden="true"></div>
            <div class="hwh-process-step">
                <div class="hwh-process-step__num">02</div>
                <div class="hwh-process-step__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
                <h3 class="hwh-process-step__title">We Show Up On Time</h3>
                <p class="hwh-process-step__text">A licensed plumber arrives fully equipped and ready. We respect your time and your home.</p>
            </div>
            <div class="hwh-process-connector" aria-hidden="true"></div>
            <div class="hwh-process-step">
                <div class="hwh-process-step__num">03</div>
                <div class="hwh-process-step__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
                <h3 class="hwh-process-step__title">Diagnose &amp; Quote</h3>
                <p class="hwh-process-step__text">We find the problem and give you a clear, upfront price. No surprises, no pressure.</p>
            </div>
            <div class="hwh-process-connector" aria-hidden="true"></div>
            <div class="hwh-process-step">
                <div class="hwh-process-step__num">04</div>
                <div class="hwh-process-step__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
                <h3 class="hwh-process-step__title">Fixed &amp; Guaranteed</h3>
                <p class="hwh-process-step__text">We complete the work cleanly and efficiently. Every job is backed by our satisfaction guarantee.</p>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     WHY CHOOSE US — Light bg, bold trust signals
     ══════════════════════════════════════════════════════ -->
<section class="hwh-why" aria-label="Why choose Hot Water Heroes">
    <div class="hwh-section-inner">
        <div class="hwh-why__grid">
            <div class="hwh-why__content reveal">
                <span class="hwh-label">The HWH Difference</span>
                <h2 class="hwh-section-title">Why Tampa Bay<br>Chooses <em>Us</em></h2>
                <p class="hwh-section-desc">We built our reputation one job at a time — showing up when others won't, being honest about pricing, and doing work that lasts.</p>
                <ul class="hwh-why__list">
                    <li class="hwh-why__item">
                        <span class="hwh-why__check" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <div>
                            <strong>State-Licensed &amp; Fully Insured</strong>
                            <p>Every technician is background-checked and licensed for your protection.</p>
                        </div>
                    </li>
                    <li class="hwh-why__item">
                        <span class="hwh-why__check" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <div>
                            <strong>Upfront, Honest Pricing</strong>
                            <p>You get a clear quote before any work begins. No hidden fees, ever.</p>
                        </div>
                    </li>
                    <li class="hwh-why__item">
                        <span class="hwh-why__check" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <div>
                            <strong>Water Heater Specialists</strong>
                            <p>All brands, all types — including tankless conversions and full replacements.</p>
                        </div>
                    </li>
                    <li class="hwh-why__item">
                        <span class="hwh-why__check" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <div>
                            <strong>True 24/7 Emergency Response</strong>
                            <p>We actually answer nights, weekends, and holidays — no voicemail runaround.</p>
                        </div>
                    </li>
                </ul>
                <a href="<?php echo esc_url(home_url('/about/')); ?>" class="hwh-btn hwh-btn--red">Meet Our Team →</a>
            </div>
            <div class="hwh-why__stats reveal">
                <div class="hwh-why__stat-card">
                    <span class="hwh-why__stat-num">300+</span>
                    <span class="hwh-why__stat-lbl">Jobs Completed</span>
                </div>
                <div class="hwh-why__stat-card">
                    <span class="hwh-why__stat-num">30+</span>
                    <span class="hwh-why__stat-lbl">5-Star Reviews</span>
                </div>
                <div class="hwh-why__stat-card hwh-why__stat-card--accent">
                    <span class="hwh-why__stat-num">24/7</span>
                    <span class="hwh-why__stat-lbl">Always Available</span>
                </div>
                <div class="hwh-why__stat-card">
                    <span class="hwh-why__stat-num">100%</span>
                    <span class="hwh-why__stat-lbl">Satisfaction Guaranteed</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     TESTIMONIALS — Split: mascot left, 2-up carousel right
     ══════════════════════════════════════════════════════ -->
<section class="hwh-reviews" aria-label="Customer reviews">
    <div class="hwh-section-inner">
        <div class="hwh-reviews-split">

            <!-- LEFT: Mascot visual -->
            <div class="hwh-reviews-split__visual reveal">
                <div class="hwh-reviews-split__img-wrap">
                    <img src="https://hotwaterheroesplumbing.com/wp-content/uploads/2026/05/Heaty-Phone.png"
                         alt="Heaty the Hot Water Heroes mascot checking reviews on his phone"
                         loading="lazy" decoding="async" width="520" height="580"
                         class="hwh-reviews-split__img">
                </div>
                <div class="hwh-reviews-split__badge">
                    <span class="hwh-reviews-split__badge-stars">★★★★★</span>
                    <span class="hwh-reviews-split__badge-text">5.0 on Google — 30+ Reviews</span>
                </div>
            </div>

            <!-- RIGHT: Carousel (2 visible at a time) -->
            <div class="hwh-reviews-split__cards reveal">
                <div class="hwh-reviews-split__header">
                    <span class="hwh-label hwh-label--red">Real Customers</span>
                    <h2 class="hwh-section-title hwh-section-title--white">What Tampa Bay Says<br><em>About Us</em></h2>
                </div>

                <div class="hwh-rev-carousel" id="reviews-carousel" role="region" aria-label="Customer reviews carousel">
                    <div class="hwh-rev-carousel__track">

                        <article class="hwh-review-card hwh-review-card--stacked">
                            <span class="hwh-review-card__stars" role="img" aria-label="5 stars">★★★★★</span>
                            <p class="hwh-review-card__text">"Hot Water Heroes are amazing. Fantastic communication, great plumbers, super nice and best of all your pricing seems very fair. I'm a realtor in this area for 23 years and I use them for my personal home. Such an awesome job — I highly recommend them."</p>
                            <div class="hwh-review-card__author">
                                <strong>Bridget Breland</strong>
                                <span>Google Review · Local Guide</span>
                            </div>
                        </article>

                        <article class="hwh-review-card hwh-review-card--stacked">
                            <span class="hwh-review-card__stars" role="img" aria-label="5 stars">★★★★★</span>
                            <p class="hwh-review-card__text">"Hot Water Heroes was absolutely outstanding! John was professional, knowledgeable, and showed up right on time. He quickly diagnosed the issue, explained everything clearly, and had it fixed faster than I expected. The pricing was fair and the quality of work was top-notch."</p>
                            <div class="hwh-review-card__author">
                                <strong>Kirby Cummings</strong>
                                <span>Google Review</span>
                            </div>
                        </article>

                        <article class="hwh-review-card hwh-review-card--stacked">
                            <span class="hwh-review-card__stars" role="img" aria-label="5 stars">★★★★★</span>
                            <p class="hwh-review-card__text">"Wow, great service, good pricing, professional and explained everything. Good to see such service and pricing still exist. I will be calling you first for all my plumbing needs. It was a pleasure to have service like this during the holidays. Keep up the good work!"</p>
                            <div class="hwh-review-card__author">
                                <strong>Mark Watklevicz</strong>
                                <span>Google Review</span>
                            </div>
                        </article>



                    </div>

                    <div class="hwh-rev-carousel__controls">
                        <button class="hwh-rev-carousel__btn" id="rev-prev" aria-label="Previous reviews">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m15 18-6-6 6-6"/></svg>
                        </button>
                        <div class="hwh-rev-carousel__dots" id="rev-dots" role="tablist"></div>
                        <button class="hwh-rev-carousel__btn" id="rev-next" aria-label="Next reviews">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
(function(){
    var track   = document.querySelector('.hwh-rev-carousel__track');
    var cards   = track ? Array.from(track.querySelectorAll('.hwh-review-card--stacked')) : [];
    var dotsEl  = document.getElementById('rev-dots');
    var prevBtn = document.getElementById('rev-prev');
    var nextBtn = document.getElementById('rev-next');
    if (!track || cards.length === 0) return;

    var current = 0;

    function getPerPage() {
        return window.innerWidth <= 768 ? 1 : 2;
    }

    function getMaxIndex() {
        return Math.max(0, cards.length - getPerPage());
    }

    function buildDots() {
        dotsEl.innerHTML = '';
        var numDots = getMaxIndex() + 1;
        for (var i = 0; i < numDots; i++) {
            var dot = document.createElement('button');
            dot.className = 'hwh-rev-carousel__dot' + (i === current ? ' is-active' : '');
            dot.setAttribute('role', 'tab');
            dot.setAttribute('aria-label', 'Slide ' + (i + 1));
            (function(idx){
                dot.addEventListener('click', function(){
                    current = idx;
                    update();
                });
            })(i);
            dotsEl.appendChild(dot);
        }
    }

    function update() {
        var perPage = getPerPage();
        var maxIdx = getMaxIndex();
        if (current > maxIdx) current = maxIdx;
        if (current < 0) current = 0;

        var step;
        if (perPage === 1) {
            step = 'calc(' + (current * 100) + '% + ' + (current * 1.25) + 'rem)';
        } else {
            step = 'calc(' + (current * 50) + '% + ' + (current * 0.625) + 'rem)';
        }
        track.style.transform = 'translateX(-' + step + ')';

        var dots = dotsEl.querySelectorAll('.hwh-rev-carousel__dot');
        dots.forEach(function(d, i) {
            d.classList.toggle('is-active', i === current);
        });
    }

    prevBtn.addEventListener('click', function(){
        var maxIdx = getMaxIndex();
        if (current === 0) {
            current = maxIdx;
        } else {
            current--;
        }
        update();
    });

    nextBtn.addEventListener('click', function(){
        var maxIdx = getMaxIndex();
        if (current === maxIdx) {
            current = 0;
        } else {
            current++;
        }
        update();
    });

    // Touch Swipe Gestures for Mobile Devices
    var touchStartX = 0;
    var touchEndX = 0;

    track.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});

    track.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});

    function handleSwipe() {
        var swipeThreshold = 50;
        var maxIdx = getMaxIndex();
        if (touchStartX - touchEndX > swipeThreshold) {
            // Swiped left -> Next slide
            if (current === maxIdx) {
                current = 0;
            } else {
                current++;
            }
            update();
        } else if (touchEndX - touchStartX > swipeThreshold) {
            // Swiped right -> Prev slide
            if (current === 0) {
                current = maxIdx;
            } else {
                current--;
            }
            update();
        }
    }

    var resizeTimeout;
    window.addEventListener('resize', function(){
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function(){
            buildDots();
            update();
        }, 100);
    });

    buildDots();
    update();
})();
</script>


<!-- ══════════════════════════════════════════════════════
     SERVICE AREAS — Light bg, city grid
     ══════════════════════════════════════════════════════ -->
<section class="hwh-areas" aria-label="Service areas">
    <div class="hwh-section-inner">
        <div class="hwh-areas__grid">
            <div class="hwh-areas__content reveal">
                <span class="hwh-label">Where We Work</span>
                <h2 class="hwh-section-title">Serving All of<br><em>Tampa Bay</em></h2>
                <p class="hwh-section-desc">Hillsborough, Pinellas, and Pasco County — if you're in the Tampa Bay area, we've got you covered with fast, reliable plumbing service.</p>
                <div class="hwh-areas__cities">
                    <span class="hwh-areas__city" data-city="tampa">Tampa &amp; South Tampa</span>
                    <span class="hwh-areas__city" data-city="stpete">St. Pete &amp; Gulf Beaches</span>
                    <span class="hwh-areas__city" data-city="clearwater">Clearwater &amp; Dunedin</span>
                    <span class="hwh-areas__city" data-city="brandon">Brandon &amp; Riverview</span>
                    <span class="hwh-areas__city" data-city="wesleychapel">Wesley Chapel &amp; Lutz</span>
                    <span class="hwh-areas__city">Carrollwood &amp; Westchase</span>
                    <span class="hwh-areas__city">Land O' Lakes &amp; Odessa</span>
                    <span class="hwh-areas__city">Lithia &amp; Valrico</span>
                    <span class="hwh-areas__city">New Tampa &amp; Zephyrhills</span>
                </div>
                <a href="<?php echo esc_url(home_url('/service-areas/')); ?>" class="hwh-btn hwh-btn--navy">View All Areas →</a>
            </div>
            <div class="hwh-areas__visual reveal">
                <img src="<?php echo esc_url(home_url('/')); ?>wp-content/uploads/2026/05/Screenshot-2026-05-20-114454.png"
                     alt="Hot Water Heroes service area map — Tampa Bay FL"
                     loading="lazy" decoding="async" width="500" height="500"
                     class="hwh-areas__map">
                                
                <!-- 
                   Bulletproof, Cache-Immune Styles for Hot Water Heroes Map Pins.
                   These styles are placed inline in front-page.php to bypass CDN and browser cache delays 
                   and ensure the HTML structure and CSS are always perfectly synced.
                -->
                <style>
                .hwh-areas__visual .hwh-map-pin {
                    position: absolute !important;
                    transform: translate(-50%, -50%) !important;
                    display: flex !important;
                    flex-direction: column !important;
                    align-items: center !important;
                    z-index: 10 !important;
                    cursor: pointer !important;
                    pointer-events: auto !important;
                    margin: 0 !important;
                    padding: 0 !important;
                }

                .hwh-areas__visual .hwh-map-pin__marker {
                    position: relative !important;
                    width: 12px !important;
                    height: 12px !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    flex-shrink: 0 !important;
                    margin: 0 auto !important;
                }

                .hwh-areas__visual .hwh-map-pin__dot {
                    position: absolute !important;
                    top: 0 !important;
                    left: 0 !important;
                    width: 12px !important;
                    height: 12px !important;
                    background-color: #F22F3A !important;
                    border-radius: 50% !important;
                    box-shadow: 0 0 8px rgba(242,47,58,0.8) !important;
                    z-index: 2 !important;
                    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.3s ease, box-shadow 0.3s ease !important;
                    display: block !important;
                }

                .hwh-areas__visual .hwh-map-pin__pulse {
                    position: absolute !important;
                    top: 0 !important;
                    left: 0 !important;
                    width: 12px !important;
                    height: 12px !important;
                    background-color: rgba(242,47,58,0.45) !important;
                    border-radius: 50% !important;
                    animation: hwh-map-pulse-inline 2s infinite ease-out !important;
                    pointer-events: none !important;
                    z-index: 1 !important;
                    display: block !important;
                    margin: 0 !important;
                }

                @keyframes hwh-map-pulse-inline {
                    0% {
                        transform: scale(1) !important;
                        opacity: 1 !important;
                    }
                    100% {
                        transform: scale(4) !important;
                        opacity: 0 !important;
                    }
                }

                .hwh-areas__visual .hwh-map-pin__label {
                    font-family: 'Inter', sans-serif !important;
                    font-size: 0.7rem !important;
                    font-weight: 700 !important;
                    color: #0A1628 !important;
                    background: rgba(255, 255, 255, 0.92) !important;
                    padding: 0.2rem 0.5rem !important;
                    border-radius: 4px !important;
                    margin-top: 6px !important;
                    border: 1px solid rgba(10,22,40,0.12) !important;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.08) !important;
                    white-space: nowrap !important;
                    pointer-events: none !important;
                    transition: all 0.3s ease !important;
                    display: block !important;
                }

                /* Hover and Active states */
                .hwh-areas__visual .hwh-map-pin:hover .hwh-map-pin__dot,
                .hwh-areas__visual .hwh-map-pin.is-active .hwh-map-pin__dot {
                    transform: scale(1.35) !important;
                    background-color: #0A1628 !important;
                    box-shadow: 0 0 12px rgba(10, 22, 40, 0.8) !important;
                }

                .hwh-areas__visual .hwh-map-pin:hover .hwh-map-pin__label,
                .hwh-areas__visual .hwh-map-pin.is-active .hwh-map-pin__label {
                    background-color: #F22F3A !important;
                    color: #ffffff !important;
                    border-color: #F22F3A !important;
                    box-shadow: 0 4px 12px rgba(242, 47, 58, 0.3) !important;
                }
                </style>

                <!-- Premium Pulsing Coordinate pins on Map Overlay -->
                <div class="hwh-map-pin" data-city="tampa" style="top: 59%; left: 76%;" aria-hidden="true">
                    <div class="hwh-map-pin__marker">
                        <span class="hwh-map-pin__pulse"></span>
                        <span class="hwh-map-pin__dot"></span>
                    </div>
                    <span class="hwh-map-pin__label">Tampa</span>
                </div>
                <div class="hwh-map-pin" data-city="stpete" style="top: 88%; left: 56%;" aria-hidden="true">
                    <div class="hwh-map-pin__marker">
                        <span class="hwh-map-pin__pulse"></span>
                        <span class="hwh-map-pin__dot"></span>
                    </div>
                    <span class="hwh-map-pin__label">St. Pete</span>
                </div>
                <div class="hwh-map-pin" data-city="clearwater" style="top: 57%; left: 38%;" aria-hidden="true">
                    <div class="hwh-map-pin__marker">
                        <span class="hwh-map-pin__pulse"></span>
                        <span class="hwh-map-pin__dot"></span>
                    </div>
                    <span class="hwh-map-pin__label">Clearwater</span>
                </div>
                <div class="hwh-map-pin" data-city="brandon" style="top: 61%; left: 95%;" aria-hidden="true">
                    <div class="hwh-map-pin__marker">
                        <span class="hwh-map-pin__pulse"></span>
                        <span class="hwh-map-pin__dot"></span>
                    </div>
                    <span class="hwh-map-pin__label">Brandon</span>
                </div>
                <div class="hwh-map-pin" data-city="wesleychapel" style="top: 13%; left: 91%;" aria-hidden="true">
                    <div class="hwh-map-pin__marker">
                        <span class="hwh-map-pin__pulse"></span>
                        <span class="hwh-map-pin__dot"></span>
                    </div>
                    <span class="hwh-map-pin__label">Wesley Chapel</span>
                </div>

                <div class="hwh-areas__badge">
                    <span>Same-Day Available</span>
                </div>
            </div>
            
            <script>
            (function(){
                var cityCards = document.querySelectorAll('.hwh-areas__city[data-city]');
                var mapPins = document.querySelectorAll('.hwh-map-pin[data-city]');
                
                cityCards.forEach(function(card) {
                    card.addEventListener('mouseenter', function() {
                        var city = card.getAttribute('data-city');
                        var pin = document.querySelector('.hwh-map-pin[data-city="' + city + '"]');
                        if (pin) pin.classList.add('is-active');
                    });
                    card.addEventListener('mouseleave', function() {
                        var city = card.getAttribute('data-city');
                        var pin = document.querySelector('.hwh-map-pin[data-city="' + city + '"]');
                        if (pin) pin.classList.remove('is-active');
                    });
                });
                
                mapPins.forEach(function(pin) {
                    pin.addEventListener('mouseenter', function() {
                        var city = pin.getAttribute('data-city');
                        var card = document.querySelector('.hwh-areas__city[data-city="' + city + '"]');
                        if (card) card.classList.add('is-highlighted');
                    });
                    pin.addEventListener('mouseleave', function() {
                        var city = pin.getAttribute('data-city');
                        var card = document.querySelector('.hwh-areas__city[data-city="' + city + '"]');
                        if (card) card.classList.remove('is-highlighted');
                    });
                });
            })();
            </script>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     FAQ Section — word count + FAQ rich results
     ══════════════════════════════════════════════════════ -->
<section class="hwh-faq" id="faq" aria-label="Frequently asked plumbing questions">
    <div class="hwh-section-inner">
        <div class="hwh-section-header reveal">
            <span class="hwh-label">Common Questions</span>
            <h2 class="hwh-section-title">Tampa Bay Plumbing <em>FAQs</em></h2>
            <p class="hwh-section-desc">Have questions? Here are the answers Tampa Bay homeowners ask most.</p>
        </div>
        <div class="hwh-faq__grid reveal" itemscope itemtype="https://schema.org/FAQPage">
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">How quickly can you respond to a plumbing emergency?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">We are available 24 hours a day, 7 days a week including nights, weekends, and holidays. For most emergency calls across Tampa Bay, we dispatch a licensed plumber within 60 minutes. When water is flooding your home, every minute counts and we take that seriously.</p>
                </div>
            </div>
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">Do you charge for estimates?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">Hot Water Heroes provides free estimates on most plumbing projects. Before any work begins, we give you a clear, written price so you know exactly what you are paying. No hidden fees and no surprises. We believe in honest, upfront pricing on every job.</p>
                </div>
            </div>
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">Are you licensed and insured in Florida?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">Yes. Hot Water Heroes Plumbing is fully licensed and insured in the state of Florida. Every technician on our team is background-checked and certified. Your home and your family are always protected when we are on the job.</p>
                </div>
            </div>
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">What areas do you serve in Tampa Bay?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">We serve all of Hillsborough, Pinellas, and Pasco counties. Service areas include Tampa, South Tampa, St. Petersburg, Clearwater, Brandon, Riverview, Wesley Chapel, Carrollwood, Westchase, Lutz, Land O Lakes, Odessa, New Tampa, and Zephyrhills. If you are in Greater Tampa Bay, we have got you covered.</p>
                </div>
            </div>
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">Do you specialize in water heater repair and installation?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">Water heaters are our specialty. We repair and install all major brands of tank and tankless water heaters including Rheem, Bradford White, AO Smith, and Navien. Whether your water heater is leaking, not heating, or simply aging out, we offer same-day service and free estimates across Tampa Bay.</p>
                </div>
            </div>
            <div class="hwh-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 class="hwh-faq__question" itemprop="name">What payment methods do you accept?</h3>
                <div class="hwh-faq__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <p itemprop="text">We accept cash, all major credit cards, and offer financing options through Cherry. Financing lets you spread the cost of larger plumbing projects into manageable monthly payments with no prepayment penalties.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     CTA — Bold red, full width
     ══════════════════════════════════════════════════════ -->
<section class="hwh-cta" id="request-service" aria-label="Request plumbing service">
    <div class="hwh-cta__inner reveal">
        <div class="hwh-cta__content">
            <span class="hwh-label hwh-label--white">Get Help Today</span>
            <h2 class="hwh-cta__title">Plumbing Problem?<br>We're On Our Way.</h2>
            <p class="hwh-cta__text">Don't let a small leak turn into a big headache. Call now or book online — available 24/7 across all of Tampa Bay.</p>
        </div>
        <div class="hwh-cta__actions">
            <a href="tel:+18134275862" class="hwh-btn hwh-btn--white hwh-btn--lg">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                Call 813-42-PLUMB (75862)
            </a>
            <a href="/contact/" class="hwh-btn hwh-btn--ghost-white hwh-btn--lg">
                Request Service Online →
            </a>
        </div>
    </div>
</section>
<!-- GEO: Static entity block — server-rendered for LLM/AI crawler readability -->
<section class="hwh-geo" aria-label="About Hot Water Heroes Plumbing">
    <div class="hwh-geo__inner">
        <h2 class="hwh-geo__title">Tampa Bay's Trusted Plumbing Company</h2>
        <div class="hwh-geo__body">
            <p><strong>Hot Water Heroes Plumbing</strong> is a licensed and insured plumbing company serving the Greater Tampa Bay area, including Hillsborough County, Pinellas County, and Pasco County, Florida. We specialize in water heater repair, water heater installation, tankless water heater service, drain cleaning, leak detection and repair, pipe repair, whole-home repiping, sewer line service, water line service, slab leak repair, and 24/7 emergency plumbing.</p>
            <p>Our service area covers Tampa, South Tampa, St. Petersburg, Clearwater, Brandon, Riverview, Wesley Chapel, Carrollwood, Westchase, Lutz, Land O Lakes, Odessa, New Tampa, and Zephyrhills. We are available around the clock — 24 hours a day, 7 days a week — including nights, weekends, and holidays. In most cases we dispatch a licensed plumber within 60 minutes of your call.</p>
            <p>Hot Water Heroes holds a 5.0-star rating on Google with over 30 verified customer reviews. We offer free estimates on most plumbing projects and guarantee upfront, transparent pricing before any work begins. Our technicians are fully background-checked, Florida-certified, and committed to same-day service across Tampa Bay. To reach us, call <a href="tel:+18134275862">(813) 427-5862</a> or <a href="/contact/">book online</a>.</p>
            <p><strong>Services offered:</strong> Water Heater Repair &bull; Water Heater Installation &bull; Tankless Water Heater Repair &amp; Installation &bull; Drain Cleaning &bull; Emergency Plumbing &bull; Leak Detection &amp; Repair &bull; Pipe Repair &amp; Repiping &bull; Sewer &amp; Water Line Service &bull; Camera Inspection &bull; Gas Line Service &bull; Slab Leak Repair</p>
            <p><strong>Service areas:</strong> Tampa &bull; South Tampa &bull; St. Petersburg &bull; Clearwater &bull; Brandon &bull; Riverview &bull; Wesley Chapel &bull; Carrollwood &bull; Westchase &bull; Lutz &bull; Land O Lakes &bull; Odessa &bull; New Tampa &bull; Zephyrhills &bull; Temple Terrace &bull; Valrico &bull; Lithia &bull; Sun City Center &bull; Apollo Beach &bull; Plant City</p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
