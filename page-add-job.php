<?php
/**
 * Hot Water Heroes Plumbing — Add Job (phone check-in tool)
 * Private, login-only page for posting a completed job from the field:
 * photos + neighborhood + service + a two-sentence note. Publishing creates
 * a public job page and hands back a one-tap review-request text.
 */
get_header();

$locations = get_posts(['post_type' => 'location', 'post_parent' => 0, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'publish']);
$services  = get_posts(['post_type' => 'service', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC', 'post_status' => 'publish']);
?>

<main class="site-main" id="main-content" style="background:#F8F9FB;min-height:70vh;">
    <section style="padding:3rem 1rem 5rem;">
        <div style="max-width:560px;margin:0 auto;">

            <?php if (!is_user_logged_in()): ?>

                <div style="background:#fff;border:1px solid #EEF2F8;border-radius:16px;padding:2.5rem;text-align:center;box-shadow:0 8px 20px rgba(15,36,64,0.05);">
                    <h1 class="hwh-section-title" style="font-size:1.8rem;margin-bottom:1rem;">Job Check-In</h1>
                    <p style="color:#3D6491;margin-bottom:2rem;">Log in to post a completed job.</p>
                    <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" class="hwh-btn hwh-btn--red hwh-btn--lg">Log In</a>
                </div>

            <?php elseif (!current_user_can('edit_posts')): ?>

                <div style="background:#fff;border:1px solid #EEF2F8;border-radius:16px;padding:2.5rem;text-align:center;">
                    <p style="color:#3D6491;">Your account doesn't have permission to post jobs. Ask the site admin to upgrade your account.</p>
                </div>

            <?php elseif (isset($_GET['submitted'])):
                $last = get_transient('hwh_last_job_' . get_current_user_id());
                $job_id   = $last ? (int) $last['job_id'] : 0;
                $customer = $last && !empty($last['customer']) ? $last['customer'] : '';
                $phone    = $last && !empty($last['phone']) ? $last['phone'] : '';
                $greeting = $customer ? 'Hi ' . $customer . ', this' : 'Hi! This';
                $msg = $greeting . " is Hot Water Heroes Plumbing — thank you for your business today! If you were happy with the work, would you mind leaving us a quick Google review? It really helps our local business: " . hwh_get_review_url();
                ?>

                <div style="background:#fff;border:1px solid #EEF2F8;border-radius:16px;padding:2.5rem;text-align:center;box-shadow:0 8px 20px rgba(15,36,64,0.05);">
                    <div style="font-size:3rem;margin-bottom:0.5rem;">✅</div>
                    <h1 class="hwh-section-title" style="font-size:1.8rem;margin-bottom:0.75rem;">Job Posted!</h1>
                    <p style="color:#3D6491;margin-bottom:1.5rem;">It's live on the website and showing on the neighborhood page.</p>

                    <?php if ($job_id): ?>
                        <a href="<?php echo esc_url(get_permalink($job_id)); ?>" class="hwh-btn hwh-btn--ghost" style="margin-bottom:2rem;">View the Job Page →</a>
                    <?php endif; ?>

                    <div style="background:#F4F6FA;border-radius:12px;padding:1.5rem;text-align:left;margin-top:1rem;">
                        <strong style="color:#0F2440;display:block;margin-bottom:0.75rem;">📱 Step 2: Ask for the review while you're still in the driveway</strong>
                        <p style="font-size:0.92rem;color:#3D6491;line-height:1.6;background:#fff;border:1px dashed #C8D5E6;border-radius:8px;padding:0.9rem;" id="hwh-review-msg"><?php echo esc_html($msg); ?></p>
                        <div style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-top:1rem;">
                            <?php if ($phone): ?>
                                <a href="sms:<?php echo esc_attr($phone); ?>?&body=<?php echo rawurlencode($msg); ?>" class="hwh-btn hwh-btn--red">Text It to the Customer</a>
                            <?php endif; ?>
                            <button type="button" class="hwh-btn hwh-btn--ghost" onclick="navigator.clipboard.writeText(document.getElementById('hwh-review-msg').textContent).then(function(){this.textContent='Copied!';}.bind(this));">Copy Message</button>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/add-job/')); ?>" class="hwh-btn hwh-btn--red hwh-btn--lg" style="margin-top:2rem;">+ Post Another Job</a>
                </div>

            <?php else: ?>

                <div style="text-align:center;margin-bottom:2rem;">
                    <span class="hwh-label">Field Tool</span>
                    <h1 class="hwh-section-title" style="font-size:2rem;margin-top:0.5rem;">Job Check-In</h1>
                    <p style="color:#3D6491;">Snap it, tag it, post it — 60 seconds before you leave the driveway.</p>
                </div>

                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data"
                      style="background:#fff;border:1px solid #EEF2F8;border-radius:16px;padding:2rem;display:flex;flex-direction:column;gap:1.25rem;box-shadow:0 8px 20px rgba(15,36,64,0.05);">
                    <input type="hidden" name="action" value="hwh_add_job">
                    <?php wp_nonce_field('hwh_add_job', 'hwh_add_job_nonce'); ?>

                    <div>
                        <label style="font-weight:700;color:#0F2440;display:block;margin-bottom:6px;">📷 Job photos</label>
                        <input type="file" name="job_photos[]" accept="image/*" multiple
                               style="width:100%;padding:0.9rem;border:2px dashed #C8D5E6;border-radius:10px;background:#F8F9FB;font-size:1rem;">
                        <p style="font-size:0.85rem;color:#5A7FA8;margin:6px 0 0;">3–4 clear shots: before, during, after, and the finished install.</p>
                    </div>

                    <div>
                        <label style="font-weight:700;color:#0F2440;display:block;margin-bottom:6px;">📍 Neighborhood</label>
                        <select name="job_location" required style="width:100%;padding:0.9rem;border:1px solid #C8D5E6;border-radius:10px;font-size:1.05rem;background:#fff;">
                            <option value="">Pick the area…</option>
                            <?php foreach ($locations as $loc): ?>
                                <option value="<?php echo $loc->ID; ?>"><?php echo esc_html($loc->post_title); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label style="font-weight:700;color:#0F2440;display:block;margin-bottom:6px;">🔧 What did we do?</label>
                        <select name="job_service" required style="width:100%;padding:0.9rem;border:1px solid #C8D5E6;border-radius:10px;font-size:1.05rem;background:#fff;">
                            <option value="">Pick the service…</option>
                            <?php foreach ($services as $svc): ?>
                                <option value="<?php echo $svc->ID; ?>"><?php echo esc_html($svc->post_title); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label style="font-weight:700;color:#0F2440;display:block;margin-bottom:6px;">📝 Quick note (2–3 sentences)</label>
                        <textarea name="job_note" rows="4" required
                                  placeholder="What was the problem, what did we install/fix, and how did it turn out? e.g. Customer's 12-year-old 50-gallon gas water heater was leaking in the garage. We replaced it same-day with a new Rheem unit and brought the connections up to code."
                                  style="width:100%;padding:0.9rem;border:1px solid #C8D5E6;border-radius:10px;font-size:1rem;line-height:1.5;"></textarea>
                    </div>

                    <div style="border-top:1px solid #EEF2F8;padding-top:1.25rem;">
                        <strong style="color:#0F2440;display:block;margin-bottom:0.75rem;">For the review request (optional)</strong>
                        <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                            <input type="text" name="customer_name" placeholder="Customer first name" style="flex:1;min-width:140px;padding:0.9rem;border:1px solid #C8D5E6;border-radius:10px;font-size:1rem;">
                            <input type="tel" name="customer_phone" placeholder="Customer cell #" style="flex:1;min-width:140px;padding:0.9rem;border:1px solid #C8D5E6;border-radius:10px;font-size:1rem;">
                        </div>
                        <p style="font-size:0.85rem;color:#5A7FA8;margin:6px 0 0;">Only used to open a pre-written review-request text on your phone — never shown on the website.</p>
                    </div>

                    <button type="submit" class="hwh-btn hwh-btn--red hwh-btn--lg" style="width:100%;font-size:1.1rem;">Post This Job</button>
                </form>

            <?php endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>
