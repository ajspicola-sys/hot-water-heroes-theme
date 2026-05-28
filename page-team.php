<?php
/**
 * Template Name: Team
 * Hot Water Heroes Plumbing — Meet the Team Page (Dynamic)
 * Pulls team members from the team_member custom post type
 */
get_header(); ?>

<main class="site-main" id="main-content">

    <section class="page-hero" aria-label="Our team">
        <div class="page-hero__inner">
            <span class="section__label">Our Experts</span>
            <h1 class="page-hero__title">Meet the Team</h1>
            <p class="page-hero__desc">Licensed, experienced plumbing professionals dedicated to honest work and quality service.</p>
        </div>
    </section>

    <section class="team-full">
        <div class="section__inner">
            <div class="team-full__grid">

                <?php
                $team = new WP_Query([
                    'post_type'      => 'team_member',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'no_found_rows'  => true,
                ]);

                $count = 0;
                if ($team->have_posts()) :
                    while ($team->have_posts()) : $team->the_post();
                        $role        = get_post_meta(get_the_ID(), '_team_role', true);
                        $credentials = get_post_meta(get_the_ID(), '_team_credentials', true);
                        $specialties = get_post_meta(get_the_ID(), '_team_specialties', true);
                        $count++;
                        $reverse = ($count % 2 === 0) ? ' team-member--reverse' : '';

                        // Get initials for placeholder
                        $name_parts = explode(' ', get_the_title());
                        $initials = '';
                        foreach ($name_parts as $part) {
                            $clean = preg_replace('/[^A-Za-z]/', '', $part);
                            if ($clean) $initials .= strtoupper($clean[0]);
                        }
                        $initials = substr($initials, 0, 2);
                ?>
                    <article class="team-member<?php echo $reverse; ?> reveal">
                        <div class="team-member__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'loading'  => $count <= 2 ? 'eager' : 'lazy',
                                    'decoding' => 'async',
                                ]); ?>
                            <?php else : ?>
                                <div class="team-card__placeholder team-card__placeholder--lg" aria-hidden="true"><?php echo esc_html($initials); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="team-member__info">
                            <h2 class="team-member__name"><?php the_title(); ?></h2>
                            <?php if ($role) : ?>
                                <span class="team-member__role"><?php echo esc_html($role); ?></span>
                            <?php endif; ?>

                            <?php if ($credentials) :
                                $badges = array_map('trim', explode(',', $credentials));
                            ?>
                                <div class="team-member__credentials">
                                    <?php foreach ($badges as $badge) : ?>
                                        <span class="team-member__badge"><?php echo esc_html($badge); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (get_the_content()) : ?>
                                <div class="team-member__bio">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($specialties) :
                                $specs = array_map('trim', explode(',', $specialties));
                            ?>
                                <div class="team-member__specialties">
                                    <?php foreach ($specs as $spec) : ?>
                                        <span class="team-member__specialty"><?php echo esc_html($spec); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>

                <?php endwhile; wp_reset_postdata();
                else : 
                    $fallbacks = [
                        [
                            'name'        => 'Joe Spicola',
                            'role'        => 'Founder & Master Plumber',
                            'initials'    => 'JS',
                            'credentials' => 'Licensed Master Plumber, Water Heater Specialist, Emergency Expert',
                            'bio'         => '<p>Joe is the driving force behind Hot Water Heroes and our family of companies (including Spicola Construction and RestoWrx). As a licensed Master Plumber with years of hands-on experience, he set out to build a local plumbing company that prioritizes honest pricing, top-tier workmanship, and immediate response.</p>',
                            'specialties' => 'Tankless Conversions, Structural Rebuilding, Advanced Leak Diagnosis',
                        ],
                        [
                            'name'        => 'John',
                            'role'        => 'Lead Service Technician',
                            'initials'    => 'JO',
                            'credentials' => 'Water Heater Certified, Hydro-Jetting Specialist, Customer First Award',
                            'bio'         => '<p>John has been servicing residential plumbing systems across Hillsborough and Pinellas counties for over a decade. Known for his friendly attitude and meticulous work, John specializes in drain cleaning, water heater repair, and fast emergency mitigation.</p>',
                            'specialties' => 'Emergency Burst Pipes, Trenchless Snaking, Preventative Maintenance',
                        ]
                    ];
                    $count = 0;
                    foreach ($fallbacks as $member) :
                        $count++;
                        $reverse = ($count % 2 === 0) ? ' team-member--reverse' : '';
                        $badges = array_map('trim', explode(',', $member['credentials']));
                        $specs = array_map('trim', explode(',', $member['specialties']));
                ?>
                    <article class="team-member<?php echo $reverse; ?> reveal">
                        <div class="team-member__image">
                            <div class="team-card__placeholder team-card__placeholder--lg" aria-hidden="true"><?php echo esc_html($member['initials']); ?></div>
                        </div>
                        <div class="team-member__info">
                            <h2 class="team-member__name"><?php echo esc_html($member['name']); ?></h2>
                            <span class="team-member__role"><?php echo esc_html($member['role']); ?></span>

                            <div class="team-member__credentials">
                                <?php foreach ($badges as $badge) : ?>
                                    <span class="team-member__badge"><?php echo esc_html($badge); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <div class="team-member__bio">
                                <?php echo $member['bio']; ?>
                            </div>

                            <div class="team-member__specialties">
                                <?php foreach ($specs as $spec) : ?>
                                    <span class="team-member__specialty"><?php echo esc_html($spec); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; endif; ?>

            </div>
        </div>
    </section>

    <section class="cta-section" aria-label="Book with us">
        <div class="cta-section__inner reveal">
            <span class="cta-section__label">Book With Us</span>
            <h2 class="cta-section__title">Ready to Meet<br>Our Team?</h2>
            <p class="cta-section__text">Call us or book online — we'll dispatch a licensed plumber to your door fast.</p>
            <div class="cta-section__actions">
                <a href="/contact/" class="btn btn--primary btn--lg">Request Service</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
