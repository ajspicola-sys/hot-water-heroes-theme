<?php
/**
 * Hot Water Heroes — Header Template v2
 * Two-layer: dark top bar + white nav bar
 */

/* ── Mega-menu: services grouped by category ──────────────────────
   Pull all published services, bucket them by their first
   service_category term. Cached per request via a static var.
   ----------------------------------------------------------------- */
function hwh_get_menu_services() {
    static $cols = null;
    if ( $cols !== null ) return $cols;

    $services = get_posts( [
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => 30,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ] );

    $cols = [];   // [ 'Category Name' => [ post, ... ] ]
    foreach ( $services as $s ) {
        $terms = get_the_terms( $s->ID, 'service_category' );
        $cat   = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Services';
        $cols[ $cat ][] = $s;
    }
    return $cols;
}
$hwh_menu_services = hwh_get_menu_services();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#0F2440">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <?php
    // NOTE: <meta name="description"> and <link rel="canonical"> are output by
    // Yoast SEO via wp_head() below. Do NOT add them here — doing so causes
    // duplicate tags detected by crawlers. We only build $meta_desc for OG use.
    if ( function_exists('YoastSEO') ) {
        $yoast_meta = YoastSEO()->meta->for_current_page();
        $meta_desc  = $yoast_meta ? $yoast_meta->description : '';
    }
    if ( empty( $meta_desc ) ) {
        if ( is_front_page() ) {
            $meta_desc = 'Hot Water Heroes is a trusted Tampa plumbing company specializing in water heater repair, replacement, and same-day service. Call 813-42-PLUMB.';
        } elseif ( is_singular() ) {
            $meta_desc = wp_strip_all_tags( get_the_excerpt() );
        } else {
            $meta_desc = 'Hot Water Heroes Plumbing — Tampa Bay\'s trusted plumbing experts for water heaters, drain cleaning, leak detection, and same-day service.';
        }
    }
    ?>

    <?php
    $og_img    = 'https://hotwaterheroesplumbing.com/wp-content/uploads/2026/04/Hero-Apirl4.png';
    $og_title  = is_front_page() ? 'Hot Water Heroes Plumbing | Trusted Plumbers in Tampa Bay, FL' : wp_get_document_title();
    $og_desc   = $meta_desc;
    $og_url    = is_singular() ? get_permalink() : ( is_front_page() ? home_url('/') : ( is_archive() ? get_term_link( get_queried_object() ) : home_url('/') ) );
    $og_url    = is_wp_error( $og_url ) ? home_url('/') : $og_url;
    $og_type   = 'website';
    if (has_post_thumbnail()) {
        $td = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        if ($td) $og_img = esc_url($td[0]);
    }
    ?>
    <meta property="og:locale"       content="en_US">
    <meta property="og:site_name"   content="Hot Water Heroes Plumbing">
    <meta property="og:type"        content="<?php echo esc_attr($og_type); ?>">
    <meta property="og:url"         content="<?php echo esc_url($og_url); ?>">
    <meta property="og:title"       content="<?php echo esc_attr($og_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($og_desc); ?>">
    <meta property="og:image"       content="<?php echo esc_url($og_img); ?>">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"    content="Hot Water Heroes Plumbing - Tampa Bay Plumbers">
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:site"        content="@HotWaterHeroes">
    <meta name="twitter:title"       content="<?php echo esc_attr($og_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($og_desc); ?>">
    <meta name="twitter:image"       content="<?php echo esc_url($og_img); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://hotwaterheroesplumbing.com" crossorigin>

    <!-- Preload LCP hero image (desktop) -->
    <link rel="preload" as="image"
          href="https://hotwaterheroesplumbing.com/wp-content/uploads/2025/12/HWH-HERO-VAN.png"
          fetchpriority="high">

    <!-- Google Fonts: Loaded synchronously with preconnects to completely eliminate Flash of Unstyled Text (FOUT) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Inter:wght@400;500;600&display=swap">

    <?php
    $theme_ver = filemtime(get_stylesheet_directory() . '/style.css');
    echo '<link rel="preload" href="' . esc_url(get_stylesheet_uri() . '?ver=' . $theme_ver) . '" as="style">' . "\n";
    ?>

    <?php wp_head(); ?>

    <style id="hwh-critical-css">
        html { scroll-behavior: smooth; -webkit-font-smoothing: antialiased; }
        body { margin: 0; font-family: 'Inter','Helvetica Neue',Arial,sans-serif; background: #F8F9FB; overflow-x: hidden; }
        .site-main { padding-top: 115px; }
        .hwh-header { position: fixed; top: 0; left: 0; right: 0; z-index: 200; }
        .hwh-topbar { background: #0F2440; height: 40px; display: flex; align-items: center; }
        .hwh-topbar__inner { max-width: 1280px; margin: 0 auto; padding: 0 clamp(1.25rem,1rem + 2vw,3rem); display: flex; align-items: center; justify-content: space-between; width: 100%; gap: 1.5rem; }
        .hwh-nav-bar { background: rgba(255,255,255,0.97); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); box-shadow: 0 2px 20px rgba(0,0,0,0.08); padding: 0.85rem 0; transition: padding .3s ease; }
        .hwh-nav-bar__inner { max-width: 1280px; margin: 0 auto; padding: 0 clamp(1.25rem,1rem + 2vw,3rem); display: flex; align-items: center; justify-content: space-between; gap: 2rem; }
        /* Montserrat fallback — size-adjust prevents CLS when font swaps in */
        @font-face {
            font-family: 'Montserrat';
            font-display: swap;
            src: local('Montserrat Bold'), local('Montserrat-Bold');
            font-weight: 700 800;
            size-adjust: 108%;
            ascent-override: 85%;
            descent-override: 22%;
            line-gap-override: 0%;
        }
        /* Inter fallback — tighter metrics than Helvetica Neue */
        @font-face {
            font-family: 'Inter';
            font-display: swap;
            src: local('Inter'), local('Inter-Regular');
            font-weight: 400 600;
            size-adjust: 100%;
            ascent-override: 90%;
            descent-override: 22%;
            line-gap-override: 0%;
        }
        .hwh-location-selector {
            display: inline-flex;
            align-items: center;
            color: #fff;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 4px;
            padding: 2px 8px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        .hwh-location-selector svg {
            color: #F22F3A;
        }
        .hwh-location-selector select {
            background: transparent;
            border: none;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            padding: 2px 16px 2px 4px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 8px;
        }
        .hwh-location-selector select:hover {
            color: #F22F3A;
        }
        .hwh-location-selector select option {
            background: #0F2440;
            color: #fff;
        }
        .hwh-fade-out {
            opacity: 0;
            transform: translateY(5px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        @media (max-width: 768px) {
            .hwh-topbar__left .hwh-topbar__item:nth-child(3),
            .hwh-topbar__left .hwh-topbar__sep:nth-child(4),
            .hwh-topbar__left .hwh-topbar__item:nth-child(5) {
                display: none !important;
            }
            .hwh-location-selector {
                margin-right: 0;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#main-content">Skip to content</a>

<!-- ═══════════════════════════════════════════
     TWO-LAYER HEADER
     ═══════════════════════════════════════════ -->
<header class="hwh-header" id="site-header" role="banner">

    <!-- ── LAYER 1: Top Info Bar ── -->
    <div class="hwh-topbar" role="complementary" aria-label="Contact information">
        <div class="hwh-topbar__inner">

            <!-- Left: quick info -->
            <div class="hwh-topbar__left">
                <a href="tel:+18134275862" class="hwh-topbar__item hwh-topbar__item--phone">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                    813-42-PLUMB (75862)
                </a>
                <span class="hwh-topbar__sep" aria-hidden="true">|</span>
                <span class="hwh-topbar__item">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Open 24 Hours &nbsp;·&nbsp; 7 Days a Week
                </span>
                <span class="hwh-topbar__sep" aria-hidden="true">|</span>
                <span class="hwh-topbar__item hwh-topbar__item--live">
                    <span class="hwh-topbar__dot" aria-hidden="true"></span>
                    Available Now
                </span>
            </div>

            <!-- Right: search + social -->
            <div class="hwh-topbar__right">
                <div class="hwh-location-selector">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" style="margin-right: 4px; vertical-align: middle;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <select id="hwh-location-dropdown" aria-label="Select dispatch location">
                        <option value="tampa">Tampa (Main)</option>
                        <?php
                        $locs = get_posts([
                            'post_type' => 'location',
                            'post_parent' => 0,
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        ]);
                        foreach ($locs as $loc) {
                            echo '<option value="' . esc_attr($loc->post_name) . '">' . esc_html($loc->post_title) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- Mini search -->
                <form class="hwh-topbar__search" role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get" aria-label="Site search">
                    <input type="search" name="s" class="hwh-topbar__search-input" placeholder="Search services…" aria-label="Search" value="<?php echo esc_attr(get_search_query()); ?>">
                    <button type="submit" class="hwh-topbar__search-btn" aria-label="Submit search">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </button>
                </form>
                <!-- Social -->
                <a href="https://www.facebook.com/hotwaterheroes/" class="hwh-topbar__social" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                </a>
                <a href="https://www.instagram.com/hotwaterheroes/" class="hwh-topbar__social" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
                </a>
            </div>

        </div>
    </div>

    <!-- ── LAYER 2: Main Nav Bar ── -->
    <div class="hwh-nav-bar">
        <div class="hwh-nav-bar__inner">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hwh-nav__logo" aria-label="Hot Water Heroes Plumbing — Home"<?php if (is_front_page()) echo ' aria-current="page"'; ?>>
                <img src="https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png"
                     alt="Hot Water Heroes Plumbing" width="260" height="65"
                     loading="eager" decoding="async" class="hwh-nav__logo-img">
            </a>

            <!-- Desktop nav -->
            <nav class="hwh-nav" aria-label="Main navigation">
                <ul class="hwh-nav__links">
                    <li class="hwh-nav__item<?php if (is_front_page()) echo ' hwh-nav__item--active'; ?>">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="hwh-nav__link"<?php if (is_front_page()) echo ' aria-current="page"'; ?>>Home</a>
                    </li>
                    <li class="hwh-nav__item<?php if (is_post_type_archive('service') || is_singular('service')) echo ' hwh-nav__item--active'; ?>">
                        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="hwh-nav__link">Services</a>
                    </li>
                    <li class="hwh-nav__item<?php if (is_page('about')) echo ' hwh-nav__item--active'; ?>">
                        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="hwh-nav__link">About</a>
                    </li>

                    <li class="hwh-nav__item<?php if (is_page('contact')) echo ' hwh-nav__item--active'; ?>">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hwh-nav__link">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Actions -->
            <div class="hwh-nav__actions">
                <a href="tel:+18134275862" class="hwh-nav__call" aria-label="Call 813-42-PLUMB">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                </a>
                <a href="/contact/" class="hwh-btn hwh-btn--red hwh-btn--sm">Book Service</a>
                <button class="hwh-nav__hamburger" id="mobile-toggle" aria-label="Open navigation" aria-expanded="false" aria-controls="mobile-menu">
                    <span class="hamburger"><span class="hamburger__line"></span><span class="hamburger__line"></span><span class="hamburger__line"></span></span>
                </button>
            </div>

        </div>
    </div>

    <!-- hwh-geolocation-script -->
    <script>
    (function() {
        window.hwhLocalizedServices = <?php echo json_encode(array_keys(get_option('hwh_existing_localized_services', []))); ?>;
        const geoMapping = {
            'brandon': { name: 'Brandon' },
            'st-petersburg': { name: 'St. Petersburg' },
            'south-tampa': { name: 'South Tampa' },
            'carrollwood': { name: 'Carrollwood' },
            'lutz': { name: 'Lutz' },
            'citrus-park': { name: 'Citrus Park' },
            'westchase': { name: 'Westchase' },
            'land-o-lakes': { name: 'Land O\' Lakes' },
            'riverview': { name: 'Riverview' },
            'wesley-chapel': { name: 'Wesley Chapel' },
            'new-tampa': { name: 'New Tampa' },
            'temple-terrace': { name: 'Temple Terrace' },
            'odessa': { name: 'Odessa' },
            'zephyrhills': { name: 'Zephyrhills' },
            'tampa': { name: 'Tampa (Main)' }
        };

        // 1. Identify location from URL (always overrides lookup)
        const path = window.location.pathname;
        let urlLocation = null;
        for (const key of Object.keys(geoMapping)) {
            if (key === 'tampa') continue;
            if (path.includes('-' + key)) {
                urlLocation = key;
                break;
            }
        }

        const dropdown = document.getElementById('hwh-location-dropdown');

        function updateServiceLinks(locationKey) {
            if (!locationKey) return;
            const suffixes = Object.keys(geoMapping).filter(k => k !== 'tampa');
            const loc = geoMapping[locationKey];
            if (!loc) return;
            
            // Find links matching either the plural /services/ or singular /service/ path
            const links = document.querySelectorAll('a[href*="/services/"], a[href*="/service/"]');
            
            links.forEach(link => {
                let href = link.getAttribute('href');
                if (!href) return;
                
                try {
                    let urlObj;
                    if (href.startsWith('/') || href.startsWith('.') || !href.includes('://')) {
                        urlObj = new URL(href, window.location.origin);
                    } else {
                        urlObj = new URL(href);
                    }
                    
                    let pathVal = urlObj.pathname;
                    // Match /services/slug/ or /service/slug/
                    const serviceMatch = pathVal.match(/\/(services?)\/([^\/]+)\/?$/);
                    if (serviceMatch && serviceMatch[2] !== 'services' && serviceMatch[2] !== 'service') {
                        let matchedPostType = serviceMatch[1]; // 'services' or 'service'
                        let slug = serviceMatch[2];
                        let baseSlug = slug;
                        
                        // Strip any existing location suffix from the slug
                        for (const suffix of suffixes) {
                            if (baseSlug.endsWith('-' + suffix)) {
                                baseSlug = baseSlug.slice(0, -(suffix.length + 1));
                                break;
                            }
                        }
                        
                        // Re-apply the selected location suffix (unless it's 'tampa')
                        // Only apply the suffix if it exists in our registry, preventing 404s
                        let newSlug = baseSlug;
                        let isLocalized = false;
                        if (locationKey !== 'tampa') {
                            const targetSlug = baseSlug + '-' + locationKey;
                            if (window.hwhLocalizedServices && window.hwhLocalizedServices.includes(targetSlug)) {
                                newSlug = targetSlug;
                                isLocalized = true;
                            }
                        }
                        
                        // Maintain base prefix and normalize to '/services/'
                        const idx = pathVal.indexOf('/' + matchedPostType + '/');
                        const pathPrefix = pathVal.substring(0, idx) + '/services/';
                        urlObj.pathname = pathPrefix + newSlug + '/';
                        
                        let newHref;
                        if (href.startsWith('/') && !href.startsWith('//')) {
                            newHref = urlObj.pathname + urlObj.search + urlObj.hash;
                        } else {
                            newHref = urlObj.toString();
                        }
                        
                        link.setAttribute('href', newHref);
 
                        // Dynamic text update in service cards
                        const card = link.closest('.service-card, .hwh-service-card');
                        if (card) {
                            const titleEl = card.querySelector('h3') || card.querySelector('h2') || card.querySelector('.hwh-service-card__title') || card.querySelector('.service-card__title');
                            if (titleEl) {
                                if (!titleEl.dataset.originalHtml) {
                                    titleEl.dataset.originalHtml = titleEl.innerHTML;
                                }
                                
                                let originalHtml = titleEl.dataset.originalHtml;
                                if (locationKey === 'tampa' || !isLocalized) {
                                    titleEl.innerHTML = originalHtml;
                                } else {
                                    titleEl.innerHTML = originalHtml + ' in ' + loc.name;
                                }
                            }
                        }

                        // Dynamic text update in mega-menu and mobile menu links
                        if (link.classList.contains('hwh-drop__item') || link.closest('.mobile-menu__links')) {
                            const strongEl = link.querySelector('strong') || link;
                            if (strongEl) {
                                if (!strongEl.dataset.originalText) {
                                    strongEl.dataset.originalText = strongEl.textContent;
                                }
                                
                                let originalText = strongEl.dataset.originalText;
                                let prefix = "";
                                if (originalText.startsWith("↳ ")) {
                                    prefix = "↳ ";
                                    originalText = originalText.substring(2);
                                }
                                
                                if (locationKey === 'tampa' || !isLocalized) {
                                    strongEl.textContent = prefix + originalText;
                                } else {
                                    strongEl.textContent = prefix + originalText + ' in ' + loc.name;
                                }
                            }
                        }
                    }
                } catch (e) {
                    console.error('HWH Geo: Error rewriting link:', href, e);
                }
            });
        }
        
            // Dynamic text updates on the page elements
            const traverseAndReplace = (node, locationName) => {
                if (node.nodeType === Node.TEXT_NODE) {
                    let text = node.nodeValue;
                    text = text.replace(/Tampa Bay, FL/gi, locationName + ', FL');
                    text = text.replace(/Tampa, FL/gi, locationName + ', FL');
                    text = text.replace(/Tampa Bay/gi, locationName);
                    text = text.replace(/\bTampa\b/gi, locationName);
                    node.nodeValue = text;
                } else {
                    if (node.nodeName !== 'SCRIPT' && node.nodeName !== 'STYLE' && node.nodeName !== 'SELECT' && node.nodeName !== 'OPTION') {
                        node.childNodes.forEach(child => traverseAndReplace(child, locationName));
                    }
                }
            };

            if (locationKey !== 'tampa') {
                const elementsToSearch = document.querySelectorAll('.hwh-hero__eyebrow, .hwh-hero__sub, .hwh-section-title, .hwh-section-desc, .svc-trust__heading, .svc-trust__desc, .svc-cta__title, .svc-cta__desc, .service-hero__title, .service-hero__desc, .service-hero__location, .page-hero__title, .page-hero__desc, .section__title, .section__desc');
                elementsToSearch.forEach(el => {
                    if (!el.dataset.originalHtml) {
                        el.dataset.originalHtml = el.innerHTML;
                    }
                    traverseAndReplace(el, loc.name);
                });
            } else {
                const elementsToSearch = document.querySelectorAll('.hwh-hero__eyebrow, .hwh-hero__sub, .hwh-section-title, .hwh-section-desc, .svc-trust__heading, .svc-trust__desc, .svc-cta__title, .svc-cta__desc, .service-hero__title, .service-hero__desc, .service-hero__location, .page-hero__title, .page-hero__desc, .section__title, .section__desc');
                elementsToSearch.forEach(el => {
                    if (el.dataset.originalHtml) {
                        el.innerHTML = el.dataset.originalHtml;
                    }
                });
            }
        }

        function updateUI(locationKey) {
            if (!geoMapping[locationKey]) return;
            
            if (dropdown) {
                dropdown.value = locationKey;
            }
            
            document.cookie = "hwh_user_geo=" + encodeURIComponent(locationKey) + "; path=/; max-age=" + (30 * 24 * 60 * 60) + "; SameSite=Lax";
            
            updateServiceLinks(locationKey);
        }

        if (urlLocation) {
            localStorage.setItem('hwh_user_geo', urlLocation);
            updateUI(urlLocation);
            return;
        }

        let cachedGeo = localStorage.getItem('hwh_user_geo');
        const cacheTime = localStorage.getItem('hwh_user_geo_time');
        const now = new Date().getTime();

        const isCacheValid = cachedGeo && cacheTime && (now - parseInt(cacheTime) < 30 * 24 * 60 * 60 * 1000);

        if (isCacheValid) {
            updateUI(cachedGeo);
        } else {
            fetch('https://ipapi.co/json/')
                .then(res => res.json())
                .then(data => {
                    let detected = 'tampa';
                    const city = (data.city || '').toLowerCase();
                    const zip = (data.postal || '').trim();

                    const southTampaZips = ['33629', '33611', '33606', '33609', '33616', '33621'];

                    if (city.includes('brandon')) {
                        detected = 'brandon';
                    } else if (city.includes('petersburg') || city.includes('st. pete')) {
                        detected = 'st-petersburg';
                    } else if (city.includes('carrollwood')) {
                        detected = 'carrollwood';
                    } else if (city.includes('lutz')) {
                        detected = 'lutz';
                    } else if (city.includes('citrus park')) {
                        detected = 'citrus-park';
                    } else if (city.includes('westchase')) {
                        detected = 'westchase';
                    } else if (city.includes('land o lakes') || city.includes('land o\' lakes')) {
                        detected = 'land-o-lakes';
                    } else if (city.includes('riverview')) {
                        detected = 'riverview';
                    } else if (city.includes('wesley chapel')) {
                        detected = 'wesley-chapel';
                    } else if (city.includes('new tampa')) {
                        detected = 'new-tampa';
                    } else if (city.includes('temple terrace')) {
                        detected = 'temple-terrace';
                    } else if (city.includes('odessa')) {
                        detected = 'odessa';
                    } else if (city.includes('zephyrhills')) {
                        detected = 'zephyrhills';
                    } else if (city.includes('tampa')) {
                        if (southTampaZips.includes(zip)) {
                            detected = 'south-tampa';
                        } else {
                            detected = 'tampa';
                        }
                    }

                    localStorage.setItem('hwh_user_geo', detected);
                    localStorage.setItem('hwh_user_geo_time', now.toString());
                    updateUI(detected);
                })
                .catch(err => {
                    localStorage.setItem('hwh_user_geo', 'tampa');
                    localStorage.setItem('hwh_user_geo_time', now.toString());
                    updateUI('tampa');
                });
        }

        if (dropdown) {
            dropdown.addEventListener('change', function() {
                const selected = this.value;
                localStorage.setItem('hwh_user_geo', selected);
                localStorage.setItem('hwh_user_geo_time', new Date().getTime().toString());
                document.cookie = "hwh_user_geo=" + encodeURIComponent(selected) + "; path=/; max-age=" + (30 * 24 * 60 * 60) + "; SameSite=Lax";
                
                let redirectUrl = null;
                const origin = window.location.origin;
                const suffixes = Object.keys(geoMapping).filter(k => k !== 'tampa');
                
                const serviceMatch = path.match(/\/services\/([^\/]+)\/?$/);
                if (serviceMatch && serviceMatch[1] !== 'services') {
                    let currentSlug = serviceMatch[1];
                    let baseSlug = currentSlug;
                    
                    for (const suffix of suffixes) {
                        if (baseSlug.endsWith('-' + suffix)) {
                            baseSlug = baseSlug.slice(0, -(suffix.length + 1));
                            break;
                        }
                    }
                    
                    const idx = path.indexOf('/services/');
                    const pathPrefix = path.substring(0, idx) + '/services/';
                    
                    if (selected === 'tampa') {
                        redirectUrl = origin + pathPrefix + baseSlug + '/';
                    } else {
                        redirectUrl = origin + pathPrefix + baseSlug + '-' + selected + '/';
                    }
                }
                
                const mainContent = document.getElementById('main-content');
                if (mainContent) {
                    mainContent.classList.add('hwh-fade-out');
                    setTimeout(function() {
                        if (redirectUrl) {
                            window.location.href = redirectUrl;
                        } else {
                            updateUI(selected);
                            setTimeout(function() {
                                mainContent.classList.remove('hwh-fade-out');
                            }, 50);
                        }
                    }, 300);
                } else {
                    if (redirectUrl) {
                        window.location.href = redirectUrl;
                    } else {
                        updateUI(selected);
                    }
                }
            });
        }

        function initGeoAndLinks() {
            const currentGeo = localStorage.getItem('hwh_user_geo') || 'tampa';
            updateServiceLinks(currentGeo);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initGeoAndLinks);
        } else {
            initGeoAndLinks();
        }
    })();
    </script>
</header>

<!-- ═══════════════════════════════════════════
     MOBILE MENU
     ═══════════════════════════════════════════ -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-label="Mobile navigation" aria-hidden="true">
    <div class="mobile-menu__overlay" id="mobile-overlay"></div>
    <div class="mobile-menu__drawer">
        <div class="mobile-menu__header">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hwh-nav__logo"<?php if (is_front_page()) echo ' aria-current="page"'; ?>>
                <img src="https://hotwaterheroesplumbing.com/wp-content/uploads/2025/08/HEROES-16-x-9-in-scaled-e1755179786780.png" alt="Hot Water Heroes" width="180" height="45">
            </a>
            <button class="mobile-menu__close" id="mobile-close" aria-label="Close navigation">×</button>
        </div>

        <!-- Mobile search -->
        <form class="hwh-mobile-search" role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get" aria-label="Search">
            <input type="search" name="s" placeholder="Search services…" aria-label="Search" value="<?php echo esc_attr(get_search_query()); ?>">
            <button type="submit" aria-label="Search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            </button>
        </form>

        <nav class="mobile-menu__nav" aria-label="Mobile navigation">
            <ul class="mobile-menu__links">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"<?php if (is_front_page()) echo ' aria-current="page"'; ?>>Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/services/')); ?>">All Services</a></li>
                <?php
                // Dynamic mobile service sub-links (up to 6 total)
                $mobile_svcs = get_posts( [
                    'post_type'      => 'service',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'no_found_rows'  => true,
                ] );
                foreach ( $mobile_svcs as $ms ) :
                    $ms_icon = get_post_meta( $ms->ID, '_service_icon', true ) ?: '';
                ?>
                <li><a href="<?php echo esc_url( get_permalink( $ms->ID ) ); ?>">↳ <?php echo esc_html( $ms->post_title ); ?></a></li>
                <?php endforeach; wp_reset_postdata(); ?>
                <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Us</a></li>

                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
            </ul>
        </nav>

        <div class="mobile-menu__footer">
            <a href="/contact/" class="hwh-btn hwh-btn--red hwh-btn--full">Book a Service</a>
            <a href="tel:+18134275862" class="mobile-menu__contact-item">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                813-42-PLUMB (75862) — 24/7 Emergency
            </a>
            <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#111;&#101;&#64;&#104;&#111;&#116;&#119;&#97;&#116;&#101;&#114;&#104;&#101;&#114;&#111;&#101;&#115;&#112;&#108;&#117;&#109;&#98;&#105;&#110;&#103;&#46;&#99;&#111;&#109;" class="mobile-menu__contact-item">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                &#106;&#111;&#101;&#64;&#104;&#111;&#116;&#119;&#97;&#116;&#101;&#114;&#104;&#101;&#114;&#111;&#101;&#115;&#112;&#108;&#117;&#109;&#98;&#105;&#110;&#103;&#46;&#99;&#111;&#109;<span class="hwh-visually-hidden"> (opens mail application)</span>
            </a>
        </div>
    </div>
</div>
