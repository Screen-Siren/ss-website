<?php
/**
 * page-design-guidelines.php — Screen Siren Custom Theme
 *
 * Routes automatically via WordPress's page-{slug}.php hierarchy once a real
 * Page with the slug "design-guidelines" exists.
 *
 * The rule this file exists to satisfy: every swatch renders from
 * var(--token), and hex + contrast are computed live in the browser at page
 * load (see assets/page-design-guidelines.js) — nothing here is typed in.
 *
 * Every real fact on this page (colours, type sizes, logo files, photography,
 * the stated pillars, the founding story) was pulled from the live staging
 * site on Aug 21, 2026 — getComputedStyle() in a rendered browser, the real
 * uploads folder, and the site's own published copy. Nothing here is invented.
 */

get_header();
?>

<main id="content" class="ss-guidelines">

	<section class="ss-guidelines__hero ss-guidelines__hero--photo">
		<img
			src="<?php echo esc_url( content_url( 'uploads/2022/05/SCREENSIREN-Featured-Image-768x464.png' ) ); ?>"
			alt="Bones of Crows, one of Screen Siren's feature films"
			class="ss-guidelines__hero-photo"
			fetchpriority="high">
		<div class="ss-guidelines__hero-overlay" aria-hidden="true"></div>

		<div class="ss-guidelines__hero-content">
			<p class="eyebrow">Screen Siren</p>
			<h1 class="type-h1">Design Guidelines</h1>
			<p class="type-lead">
				&ldquo;Award-winning film, television and digital content that changes the
				conversation.&rdquo;
			</p>
			<p class="type-small" style="color: rgba(255,255,255,0.75); margin-top: var(--sp-16);">
				Colour, type, and the small decisions underneath them — read directly off this
				site's own stylesheet, so this page can't say something the site doesn't
				already do.
			</p>

			<div class="ss-guidelines__hero-meta">
				<div class="ss-guidelines__hero-meta-col">
					<p class="type-small ss-guidelines__hero-meta-label">Draft</p>
					<p class="type-small" style="color: rgba(255,255,255,0.8);">v<?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?> &mdash; Aug 2026</p>
				</div>
				<div class="ss-guidelines__hero-meta-col">
					<p class="type-small ss-guidelines__hero-meta-label">Built by</p>
					<p class="type-small" style="color: rgba(255,255,255,0.8);">Lara Kroeker</p>
				</div>
				<div class="ss-guidelines__hero-meta-col">
					<p class="type-small ss-guidelines__hero-meta-label">Sources</p>
					<p class="type-small">
						<a href="https://stg-screensiren-staging.kinsta.cloud" class="ss-guidelines__link" target="_blank" rel="noopener">This site's own stylesheet</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================
	     FOUNDATION
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">01 &mdash; Foundation</p>
		<h2 class="type-h3">What the company stands for.</h2>

		<p class="type-small ss-guidelines__note" style="margin-bottom: var(--sp-24);">
			Founded in 1997 by president and producer Trish Dolman, Screen Siren Pictures is an
			independent production company known for high-quality, award-winning feature films,
			scripted television, and documentary. Dolman, together with Producer and COO Steven
			Thibault, lead the company; their productions have collectively screened at Cannes,
			Berlin, Sundance, and TIFF. <em>— from the site's own "Our Story" section.</em>
		</p>

		<p class="ss-guidelines__group-label" style="margin-top: 0;">
			The site states three pillars — not literally Purpose/Vision/Mission, so they're
			shown here under their real names rather than relabelled to fit a template.
		</p>
		<div class="foundation-grid">
			<div class="foundation-card">
				<p class="type-leadb" style="margin-bottom: var(--sp-8);">Quality</p>
				<p class="type-small">
					We create high-calibre, contemporary film and television content in both the
					scripted and documentary space.
				</p>
			</div>
			<div class="foundation-card">
				<p class="type-leadb" style="margin-bottom: var(--sp-8);">Innovation</p>
				<p class="type-small">
					We develop advanced digital strategies to maximize impact and expand audience
					reach.
				</p>
			</div>
			<div class="foundation-card">
				<p class="type-leadb" style="margin-bottom: var(--sp-8);">Talent</p>
				<p class="type-small">
					We foster emerging talent and amplify unique Canadian voices, marquee
					performers and creators from around the world.
				</p>
			</div>
		</div>
	</section>

	<!-- ============================================================
	     LOGO
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">02 &mdash; Logo</p>
		<h2 class="type-h3">Both marks, ready to download.</h2>
		<p class="type-small ss-guidelines__note">
			PNG only — no SVG or GIF version exists anywhere in the media library today. Vector
			source would need to be sourced or recreated before one can be offered here.
		</p>

		<div class="logo-grid">
			<div class="logo-card logo-card--light">
				<img src="<?php echo esc_url( content_url( 'uploads/2020/06/Logo.png' ) ); ?>" alt="Screen Siren Pictures — full wordmark" class="logo-card__img">
				<div class="logo-card__downloads">
					<a href="<?php echo esc_url( content_url( 'uploads/2020/06/Logo.png' ) ); ?>" download class="logo-card__download logo-card__download--primary">Download PNG</a>
				</div>
			</div>
			<div class="logo-card logo-card--light">
				<img src="<?php echo esc_url( content_url( 'uploads/2020/06/SSP-Logo.png' ) ); ?>" alt="Screen Siren Pictures — monogram mark" class="logo-card__img">
				<div class="logo-card__downloads">
					<a href="<?php echo esc_url( content_url( 'uploads/2020/06/SSP-Logo.png' ) ); ?>" download class="logo-card__download logo-card__download--primary">Download PNG</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================
	     PHOTOGRAPHY
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">03 &mdash; Photography</p>
		<h2 class="type-h3">Real stills, from real productions.</h2>
		<p class="type-small ss-guidelines__note">
			Sourced from the actual featured images on produced titles — not stock, not
			placeholder graphics. Eight of the real portfolio's current images.
		</p>

		<div class="photo-grid">
			<?php
			// Real featured images pulled from the live "Our Projects" grid, Aug 21, 2026.
			$photos = array(
				array( '2022/05/SCREENSIREN-Featured-Image-768x464.png', 'Bones of Crows Feature Film' ),
				array( '2022/05/SCREENSIREN-Featured-Image-3-768x464.png', 'REVIVAL69: The Concert That Rocked the World' ),
				array( '2020/01/SCREENSIREN-Featured-Image-2-1-768x464.png', 'French Exit' ),
				array( '2025/03/Featured-Image-768x464.jpg', 'Mafia: Most Wanted' ),
				array( '2023/05/SCREENSIREN-Featured-Image-768x464.jpg', 'Bones of Crows Mini-Series' ),
				array( '2020/01/SCREENSIREN-Featured-Image-768x464.jpg', 'British Columbia: An Untold History' ),
				array( '2020/01/SCREENSIREN-Featured-Image-768x464.png', 'The New Corporation' ),
				array( '2020/01/SCREENSIREN-Featured-Image-2-768x464.png', 'Citizen Bio' ),
			);
			foreach ( $photos as $photo ) : ?>
				<div class="photo-grid__item">
					<img src="<?php echo esc_url( content_url( 'uploads/' . $photo[0] ) ); ?>" alt="<?php echo esc_attr( $photo[1] ); ?>" loading="lazy">
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ============================================================
	     ICONS
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">04 &mdash; Icons</p>
		<h2 class="type-h3">Two systems, different jobs.</h2>

		<h3 class="type-leadb ss-guidelines__subhead">Animated, for section-level moments.</h3>
		<div class="ss-guidelines__placeholder">
			<p class="type-leadb">Not sourced yet.</p>
			<p class="type-small">
				Other client builds use a handful of hand-picked Wired/Lordicon-style animated
				icons for section-level moments. Screen Siren hasn't had a set picked — the live
				site currently uses FontAwesome (the norebro theme's bundled icon font), which is
				a different, non-animated system.
			</p>
			<p class="type-small">
				<strong>To finish this section:</strong> pick ~5 icon topics that fit a film/TV
				production company (e.g. reel, clapperboard, award, script, spotlight), source
				them from the same animated library used on other builds, add the files to
				<code>assets-icons/</code>, and delete this box.
			</p>
		</div>

		<h3 class="type-leadb ss-guidelines__subhead">Static, for utility and inline use.</h3>
		<?php
		$icon_dir   = get_stylesheet_directory() . '/assets-icons/System Icons/';
		$icon_count = count( glob( $icon_dir . '*-light.svg' ) );
		// Leads with icons that actually fit a film/TV production company, rather than
		// the alphabetically-first icons in the set.
		$sample_names = array(
			'film-slate', 'film-reel', 'film-strip', 'film-script', 'video-camera', 'clapperboard',
			'popcorn', 'television', 'projector-screen', 'microphone-stage', 'ticket', 'star',
			'play-circle', 'monitor-play', 'calendar-blank', 'globe-hemisphere-east', 'house', 'gear',
		);
		?>
		<p class="type-small ss-guidelines__note">
			Phosphor, Light weight, always this suffix. Eighteen shown here, <?php echo esc_html( $icon_count ); ?> in the full set.
		</p>
		<div class="icon-sample-grid">
			<?php foreach ( $sample_names as $name ) :
				$path = get_theme_file_path( '/assets-icons/System Icons/' . $name . '-light.svg' );
				if ( ! file_exists( $path ) ) { continue; }
				?>
				<div class="icon-sample-grid__item">
					<span class="ss-icon-mask" style="mask-image:url('<?php echo esc_url( get_theme_file_uri( '/assets-icons/System Icons/' . $name . '-light.svg' ) ); ?>');-webkit-mask-image:url('<?php echo esc_url( get_theme_file_uri( '/assets-icons/System Icons/' . $name . '-light.svg' ) ); ?>');" aria-hidden="true"></span>
					<p class="type-micro"><?php echo esc_html( $name ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<a href="<?php echo esc_url( home_url( '/icon-library/' ) ); ?>" class="type-small ss-guidelines__link">Browse the full library, <?php echo esc_html( $icon_count ); ?> icons &rarr;</a>
	</section>

	<!-- ============================================================
	     COLOUR
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">05 &mdash; Colour</p>
		<h2 class="type-h3">Olive is the primary brand colour.</h2>

		<?php
		$colour_groups = array(
			array(
				'label'  => 'Surface.',
				'note'   => 'What everything else sits on.',
				'colors' => array(
					array( '--ss-white', 'White', 'The page background' ),
					array( '--ss-neutral', 'Neutral', 'Alternating section background' ),
					array( '--ss-dark', 'Dark', 'Footer and dark sections; doubles as body text\'s darkest neighbour' ),
				),
			),
			array(
				'label'  => 'Primary.',
				'note'   => 'The colour people think of before they think of anything else about the brand. Used on the category badges (FEATURE FILM, SCRIPTED TELEVISION) — reads as brand, not interface.',
				'colors' => array(
					array( '--ss-olive', 'Olive', 'Category badges, accents' ),
					array( '--ss-olive-pressed', 'Olive pressed', 'Olive once you hover or press it — a real captured value, not derived' ),
				),
			),
			array(
				'label'  => 'Greys.',
				'note'   => 'Five even steps, picked from Primary\'s hue. Four of five are real captured values already in use; only the darkest is derived and unused so far.',
				'colors' => array(
					array( '--ss-grey-1', 'Grey 1', 'Reserved — not yet referenced in colors_and_type.css' ),
					array( '--ss-grey-2', 'Grey 2', 'Body copy — safe for text' ),
					array( '--ss-grey-3', 'Grey 3', 'Links — large-only, not for body text' ),
					array( '--ss-grey-4', 'Grey 4', 'Footer text, dividers — not for text at small sizes' ),
					array( '--ss-grey-5', 'Grey 5', 'Fills, hairlines, dividers — same value as Surface/Neutral' ),
				),
			),
			array(
				'label'  => 'CTA.',
				'note'   => 'Teal means "you can click this" — the IMDB / CRAVE / stream-rent-or-buy action labels.',
				'colors' => array(
					array( '--ss-teal', 'Teal', 'Every clickable action label on the site' ),
					array( '--ss-teal-pressed', 'Teal pressed', 'Derived — 15% darker. No real hover state found to capture' ),
					array( '--ss-teal-tint', 'Teal tint', 'Derived — a light background behind a highlighted CTA' ),
				),
			),
		);
		foreach ( $colour_groups as $group ) : ?>
			<h3 class="ss-guidelines__group-label"><?php echo esc_html( $group['label'] ); ?></h3>
			<p class="type-small ss-guidelines__note"><?php echo wp_kses_post( $group['note'] ); ?></p>
			<div class="swatch-grid">
				<?php foreach ( $group['colors'] as $c ) : ?>
					<div class="color-card">
						<div class="color-card__swatch" style="background: var(<?php echo esc_attr( $c[0] ); ?>);"></div>
						<div class="color-card__meta">
							<p class="color-card__label"><?php echo esc_html( $c[1] ); ?></p>
							<p class="color-card__role"><?php echo esc_html( $c[2] ); ?></p>
							<p class="color-card__token"><?php echo esc_html( $c[0] ); ?></p>
							<p class="color-card__hex" data-computed>&mdash;</p>
							<p class="color-card__ratio" data-computed>&mdash;</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>

		<h3 class="ss-guidelines__group-label">Additional.</h3>
		<div class="ss-guidelines__placeholder">
			<p class="type-leadb">Not decided yet.</p>
			<p class="type-small">
				No illustration/editorial-only colour was found in real use on the live site.
				Nothing to show here until one is decided.
			</p>
		</div>

		<h3 class="ss-guidelines__group-label">Semantic.</h3>
		<div class="ss-guidelines__placeholder">
			<p class="type-leadb">Not decided yet.</p>
			<p class="type-small">
				No real error/success/info state was found on the live site (no form validation
				states were visible; a stray red text run in the accolades copy is one-off
				content styling, not a system colour). <code>--ss-error</code>,
				<code>--ss-success</code>, and <code>--ss-info</code> exist in
				<code>colors_and_type.css</code> as reserved placeholders, unreferenced anywhere.
			</p>
			<p class="type-small">
				<strong>To finish this section:</strong> confirm real colours once a contact form
				or similar validation state exists, update the three tokens, and delete this box.
			</p>
		</div>
	</section>

	<!-- ============================================================
	     TYPE
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">06 &mdash; Type</p>
		<h2 class="type-h3">Poppins for headings, Rubik for body.</h2>

		<div class="type-family-grid">
			<div class="type-family-item">
				<p class="type-micro type-family-item__label">HEADINGS</p>
				<p class="type-family-item__sample" style="font-family: var(--font-heading); font-weight: 600;">Aa</p>
				<p class="type-small type-family-item__spec">Poppins &middot; weights 300&ndash;700 loaded</p>
			</div>
			<div class="type-family-item">
				<p class="type-micro type-family-item__label">BODY</p>
				<p class="type-family-item__sample" style="font-family: var(--font-body); font-weight: 400;">Aa</p>
				<p class="type-small type-family-item__spec">Rubik &middot; Regular 400</p>
			</div>
		</div>

		<p class="type-small ss-guidelines__note">
			Only the Section role actually scales with viewport width on the live site today
			(measured 28px at 480px wide, 42px at 1440px wide) — built here as a real
			<code>clamp()</code>. Every other heading is a fixed size on the live site, so it's
			shown fixed here too, not fabricated as fluid.
		</p>
		<div class="type-scale">
			<div class="type-scale__row type-scale__row--placeholder">
				<div class="type-scale__role">
					<p class="type-small type-scale__role-name">Display / H1</p>
					<p class="type-micro type-scale__role-use">Reserved — no H1 exists anywhere on the live site today</p>
				</div>
				<p class="type-small" style="font-style: italic;">No real value to show</p>
				<p class="type-small type-scale__spec">placeholder</p>
			</div>
			<?php
			$type_steps = array(
				array( 'section',     'Section heading', 'Breaks a page into its main parts. On-dark, hero-style.', '28&ndash;42 (fluid)' ),
				array( 'subsection',  'Sub-heading',      'A part within a section.', '32&ndash;40 (varies by instance, not fluid)' ),
				array( 'card-title',  'Card title',       'The heading on a card or small block.', '27' ),
				array( 'eyebrow',     'Eyebrow label',    'Small uppercase label, e.g. "IMDB", "CRAVE".', '10.4, uppercase' ),
				array( 'meta',        'Meta / small label', 'Fine print and metadata.', '12' ),
			);
			foreach ( $type_steps as $t ) : ?>
				<div class="type-scale__row">
					<div class="type-scale__role">
						<p class="type-small type-scale__role-name"><?php echo esc_html( $t[1] ); ?></p>
						<p class="type-micro type-scale__role-use"><?php echo esc_html( $t[2] ); ?></p>
					</div>
					<p style="font-family: var(--font-heading); font-weight: 600; font-size: var(--type-<?php echo esc_attr( $t[0] ); ?>);"><?php echo esc_html( $t[1] ); ?></p>
					<p class="type-small type-scale__spec"><?php echo wp_kses_post( $t[3] ); ?>px</p>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ============================================================
	     SPACING
	     ============================================================ -->
	<section class="ss-guidelines__section">
		<p class="eyebrow">07 &mdash; Spacing</p>
		<h2 class="type-h3">A fifteen-step ladder, adopted going forward.</h2>
		<p class="type-small ss-guidelines__note">
			The live site's real padding/margin values are an inconsistent page-builder mix
			(WPBakery) with no coherent scale to extract — 22 distinct values found in a single
			page, most a handful of pixels apart. Rather than document that inconsistency as if
			it were a system, this is the standard ladder the new theme adopts going forward.
			Always pick one of these, never a value in between.
		</p>
		<div class="space-scale">
			<?php
			$space = array( 120, 96, 80, 64, 56, 48, 40, 32, 24, 20, 16, 12, 8, 4, 2 );
			foreach ( $space as $px ) : ?>
				<div class="space-scale__item">
					<div class="space-scale__square" style="width: var(--sp-<?php echo esc_attr( $px ); ?>); height: var(--sp-<?php echo esc_attr( $px ); ?>);"></div>
					<p class="type-micro"><?php echo esc_html( $px ); ?>px</p>
				</div>
			<?php endforeach; ?>
		</div>

		<h3 class="ss-guidelines__group-label">Radius.</h3>
		<div class="radius-scale">
			<div class="radius-scale__item"><div class="radius-scale__square" style="border-radius: var(--radius-sm);"></div><p class="type-micro">6px<br>Dense UI</p></div>
			<div class="radius-scale__item"><div class="radius-scale__square" style="border-radius: var(--radius-md);"></div><p class="type-micro">12px<br>Cards</p></div>
			<div class="radius-scale__item"><div class="radius-scale__square" style="border-radius: var(--radius-lg);"></div><p class="type-micro">20px<br>Image wells</p></div>
			<div class="radius-scale__item"><div class="radius-scale__square radius-scale__square--pill" style="border-radius: var(--radius-pill);"></div><p class="type-micro">Pill<br>Badges, CTAs</p></div>
		</div>

		<h3 class="ss-guidelines__group-label">Elevation.</h3>
		<div class="elevation-grid">
			<div class="elevation-card" style="box-shadow: var(--shadow-xs);">
				<p class="type-leadb">Shadow XS</p>
				<p class="type-small">Card hover lift.</p>
				<p class="type-micro elevation-card__level">LEVEL 1</p>
			</div>
			<div class="elevation-card" style="box-shadow: var(--shadow-md);">
				<p class="type-leadb">Shadow MD</p>
				<p class="type-small">Floating panels, sticky search bar.</p>
				<p class="type-micro elevation-card__level">LEVEL 2</p>
			</div>
		</div>
	</section>

	<footer class="ss-guidelines__footer">
		<p class="type-small">Screen Siren Design Guidelines &mdash; working draft</p>
		<p class="type-small">Prepared by Lara Kroeker</p>
	</footer>

</main>

<?php get_footer(); ?>
