<?php
/**
 * Template Name: Service Areas
 * Hot Water Heroes Plumbing — Service Area Coverage Page
 */
get_header(); ?>

<main class="site-main" id="main-content">

    <!-- Hero -->
    <section class="page-hero" aria-label="Service areas">
        <div class="page-hero__inner">
            <span class="section__label">Where We Work</span>
            <h1 class="page-hero__title">Serving All of<br><em>Tampa Bay</em></h1>
            <p class="page-hero__desc">From South Tampa to Wesley Chapel, we provide fast, reliable plumbing service across Hillsborough, Pinellas, and Pasco counties.</p>
            <div class="hero__actions hero__actions--center">
                <a href="/contact/" class="btn btn--primary btn--lg">Request Service</a>
                <a href="tel:+18134275862" class="btn btn--outline btn--lg">Call 813-42-PLUMB (75862)</a>
            </div>
        </div>
    </section>

    <!-- Coverage Areas -->
    <section class="party-types" id="coverage-areas">
        <div class="section__inner">

            <div class="section__header reveal">
                <span class="section__label">Coverage Map</span>
                <h2 class="section__title">Areas We Serve</h2>
                <p class="section__desc">We dispatch licensed plumbers to all major Tampa Bay communities. If you're in the area, we've got you covered.</p>
            </div>

            <div class="party-block__features party-block__features--spaced">
                <div class="party-feature-card reveal">
                    <div class="party-feature-card__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <h4 class="party-feature-card__title">Hillsborough County</h4>
                    <p class="party-feature-card__text">Tampa, South Tampa, Carrollwood, Westchase, Brandon, Riverview, Lithia, Valrico, New Tampa, Temple Terrace</p>
                </div>
                <div class="party-feature-card reveal">
                    <div class="party-feature-card__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <h4 class="party-feature-card__title">Pinellas County</h4>
                    <p class="party-feature-card__text">St. Petersburg, Clearwater, Largo, Pinellas Park, Dunedin, Safety Harbor, Oldsmar, Palm Harbor</p>
                </div>
                <div class="party-feature-card reveal">
                    <div class="party-feature-card__icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <h4 class="party-feature-card__title">Pasco County</h4>
                    <p class="party-feature-card__text">Wesley Chapel, Lutz, Land O' Lakes, Odessa, Zephyrhills, New Port Richey, Trinity</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Why Choose Us for Your Area -->
    <section class="party-how-it-works">
        <div class="section__inner">
            <div class="section__header reveal">
                <span class="section__label">Why Local Matters</span>
                <h2 class="section__title">The Hot Water Heroes Advantage</h2>
            </div>
            <div class="party-steps reveal">
                <div class="party-step">
                    <div class="party-step__number">01</div>
                    <h3 class="party-step__title">Fast Response</h3>
                    <p class="party-step__text">Our local plumbers are stationed across Tampa Bay, so we can reach you quickly — often within the hour.</p>
                </div>
                <div class="party-step__arrow">→</div>
                <div class="party-step">
                    <div class="party-step__number">02</div>
                    <h3 class="party-step__title">Local Knowledge</h3>
                    <p class="party-step__text">We know Tampa Bay plumbing — from older Seminole Heights homes to new Wesley Chapel builds. We understand the unique challenges of Florida plumbing.</p>
                </div>
                <div class="party-step__arrow">→</div>
                <div class="party-step">
                    <div class="party-step__number">03</div>
                    <h3 class="party-step__title">Community Trusted</h3>
                    <p class="party-step__text">Hundreds of 5-star reviews from your neighbors. We're proud to be Tampa Bay's go-to plumbing team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Area Directory Grid -->
    <?php
    // Temporarily bypass the exclude filter
    remove_filter( 'posts_where', 'hwh_exclude_neighborhood_services', 10 );
    $all_services = get_posts([
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC'
    ]);
    add_filter( 'posts_where', 'hwh_exclude_neighborhood_services', 10, 2 );

    // Group by location
    $grouped_services = [];
    $suffixes = get_option('hwh_localized_neighborhood_suffixes', []);
    if ( empty( $suffixes ) ) {
        $suffixes = ['brandon', 'st-petersburg', 'south-tampa', 'carrollwood', 'lutz', 'citrus-park', 'westchase', 'land-o-lakes', 'riverview', 'wesley-chapel', 'new-tampa', 'temple-terrace', 'odessa', 'zephyrhills'];
    }

    foreach ($all_services as $svc) {
        $slug = $svc->post_name;
        $found_loc = false;
        foreach ($suffixes as $suffix) {
            if ( substr($slug, -strlen('-' . $suffix)) === '-' . $suffix ) {
                $loc_name = str_replace('-', ' ', $suffix);
                $loc_name = ucwords($loc_name);
                if (strtolower($loc_name) === 'st petersburg') $loc_name = 'St. Petersburg';
                $grouped_services[$loc_name][] = $svc;
                $found_loc = true;
                break;
            }
        }
        if (!$found_loc) {
            $grouped_services['Tampa (Main)'][] = $svc;
        }
    }
    ksort($grouped_services);
    ?>
    <section class="hwh-directory-section" style="padding: 5rem 0; background: #fff; border-top: 1px solid #EEF2F8;">
        <div class="section__inner">
            <div class="section__header reveal">
                <span class="section__label">Service Directory</span>
                <h2 class="section__title">All Local Services By Location</h2>
                <p class="section__desc">Find specific water heater and plumbing services tailored to your local neighborhood.</p>
            </div>
            
            <div class="hwh-directory-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2.5rem; margin-top: 3rem;">
                <?php foreach ($grouped_services as $location => $svcs): ?>
                    <div class="hwh-directory-col" style="background: #F8F9FB; padding: 2rem; border-radius: 12px; border: 1px solid #EEF2F8;">
                        <h3 style="font-family: 'Montserrat', Georgia, serif; font-size: 1.25rem; font-weight: 700; color: #0F2440; margin-bottom: 1.25rem; border-bottom: 2px solid #F22F3A; padding-bottom: 0.5rem; display: inline-block;">
                            📍 <?php echo esc_html($location); ?>
                        </h3>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
                            <?php foreach ($svcs as $s): ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($s->ID)); ?>" style="color: #3D6491; font-size: 0.95rem; font-weight: 500; text-decoration: none; transition: color 0.2s ease;" onmouseover="this.style.color='#F22F3A'" onmouseout="this.style.color='#3D6491'">
                                        <?php echo esc_html($s->post_title); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="party-faq">
        <div class="section__inner">
            <div class="section__header reveal">
                <span class="section__label">Questions?</span>
                <h2 class="section__title">Service Area FAQ</h2>
            </div>
            <div class="faq-list reveal">
                <details class="faq-item">
                    <summary class="faq-item__question">Do you service my area?</summary>
                    <div class="faq-item__answer">
                        <p>We serve all of Hillsborough, Pinellas, and Pasco counties. If you're in the greater Tampa Bay area, chances are we can get to you. Call us and we'll confirm.</p>
                    </div>
                </details>
                <details class="faq-item">
                    <summary class="faq-item__question">How fast can a plumber get to me?</summary>
                    <div class="faq-item__answer">
                        <p>For emergencies, we aim to have a plumber at your door within 60 minutes. For scheduled appointments, we offer same-day and next-day availability in most areas.</p>
                    </div>
                </details>
                <details class="faq-item">
                    <summary class="faq-item__question">Is there an extra charge for distant locations?</summary>
                    <div class="faq-item__answer">
                        <p>No. We charge the same rates across our entire service area. There are no hidden trip fees or mileage charges for any location within our coverage zone.</p>
                    </div>
                </details>
                <details class="faq-item">
                    <summary class="faq-item__question">Do you offer emergency service on weekends?</summary>
                    <div class="faq-item__answer">
                        <p>Yes! Our emergency plumbing service is available 24/7, 365 days a year — including weekends and holidays. Call 813-42-PLUMB (75862) anytime.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="cta-section__inner reveal">
            <span class="cta-section__label">Need a Plumber?</span>
            <h2 class="cta-section__title">We're in<br>Your Neighborhood.</h2>
            <p class="cta-section__text">Fast, local, and always available. Call now or book online.</p>
            <div class="cta-section__actions">
                <a href="/contact/" class="btn btn--primary btn--lg">Request Service</a>
                <a href="tel:+18134275862" class="btn btn--outline btn--lg">Call 813-42-PLUMB (75862)</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
