<?php
/**
 * front-page.php — Screen Siren Custom Theme
 *
 * Replaces the WPBakery-built "SCREEN SIREN" page (post ID 5654049). Marketing copy below
 * (hero, pillars, Our Story, Our Team, Get in Touch) is transcribed verbatim from that page's
 * real content as of Aug 2026 — nothing invented. The portfolio grid is fully dynamic: it
 * queries the `norebro_portfolio` CPT (owned by the Norebro Portfolio plugin, independent of
 * the active theme) and its ACF fields directly, so editing a project in wp-admin still works
 * exactly as it does today, regardless of which theme is active.
 *
 * One stale item carried over deliberately: the "Get in Touch" section omits the 2020 COVID
 * return-to-work PDF link the live page still has — that's dated content, flag with Lara
 * before deciding whether to drop it live too.
 */

get_header();

$categories = get_terms( array(
	'taxonomy'   => 'norebro_portfolio_category',
	'hide_empty' => true,
) );
?>

<main id="content" class="ss-home">

	<section class="ss-home__hero">
		<?php echo wp_get_attachment_image( 5659654, 'medium', false, array( 'class' => 'ss-home__logo', 'alt' => 'Screen Siren Pictures Inc.' ) ); ?>
		<h1 class="ss-home__headline">Changing the conversation through award-winning film, television and digital content.</h1>
	</section>

	<section class="ss-home__pillars">
		<div class="ss-home__pillar">
			<h4>Quality</h4>
			<p>We create high-calibre, contemporary film and television content in both the scripted and documentary space.</p>
		</div>
		<div class="ss-home__pillar">
			<h4>Innovation</h4>
			<p>We develop advanced digital strategies to maximize impact and expand audience reach.</p>
		</div>
		<div class="ss-home__pillar">
			<h4>Talent</h4>
			<p>We foster emerging talent and amplify unique Canadian voices, marquee performers and creators from around the world.</p>
		</div>
	</section>

	<section class="ss-home__sizzle-section">
		<button type="button" class="ss-play-button" data-video-modal="video-sizzle">
			<span class="ss-play-button__circle" aria-hidden="true">
				<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor"><path d="M0 0L16 9L0 18V0Z"/></svg>
			</span>
			<span class="ss-play-button__label">Watch the Sizzle Reel</span>
		</button>
	</section>

	<div class="ss-home__modal" id="video-sizzle" hidden>
		<div class="ss-home__modal-inner ss-home__modal-inner--video">
			<button type="button" class="ss-home__modal-close" aria-label="Close">&times;</button>
			<div class="ss-home__video-frame" data-embed-src="https://player.vimeo.com/video/438674171"></div>
		</div>
	</div>

	<section class="ss-home__banner">
		<h3>Mafia: Most Wanted can be streamed on Crave</h3>
		<button type="button" class="ss-play-button ss-play-button--dark" data-video-modal="video-mafia">
			<span class="ss-play-button__circle" aria-hidden="true">
				<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor"><path d="M0 0L16 9L0 18V0Z"/></svg>
			</span>
			<span class="ss-play-button__label">Watch the Trailer</span>
		</button>
	</section>

	<div class="ss-home__modal" id="video-mafia" hidden>
		<div class="ss-home__modal-inner ss-home__modal-inner--video">
			<button type="button" class="ss-home__modal-close" aria-label="Close">&times;</button>
			<div class="ss-home__video-frame" data-embed-src="https://www.youtube.com/embed/tgIe5Ob5dfI"></div>
		</div>
	</div>

	<section class="ss-home__projects" id="projects">
		<p class="eyebrow">Our Projects</p>
		<h2 class="type-h3">Every title, one place.</h2>

		<div class="ss-home__filters" role="tablist" aria-label="Filter projects by category">
			<button type="button" class="ss-home__filter is-active" data-filter="all">All</button>
			<?php foreach ( $categories as $cat ) : ?>
				<button type="button" class="ss-home__filter" data-filter="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?></button>
			<?php endforeach; ?>
		</div>

		<div class="ss-home__grid">
			<?php
			$projects = new WP_Query( array(
				'post_type'      => 'norebro_portfolio',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			while ( $projects->have_posts() ) :
				$projects->the_post();
				$pid          = get_the_ID();
				$terms        = get_the_terms( $pid, 'norebro_portfolio_category' );
				$term_slugs   = is_array( $terms ) ? wp_list_pluck( $terms, 'slug' ) : array();
				$term_names   = is_array( $terms ) ? wp_list_pluck( $terms, 'name' ) : array();
				$description  = get_field( 'project_description', $pid );
				$custom_field = get_field( 'project_custom_fields', $pid );
				$project_link = get_field( 'project_link', $pid );
				$gallery_ids  = get_post_meta( $pid, 'project_content', true );
				$gallery_ids  = is_array( $gallery_ids ) ? $gallery_ids : array();
				?>
				<button
					type="button"
					class="ss-home__card"
					data-categories="<?php echo esc_attr( implode( ' ', $term_slugs ) ); ?>"
					data-modal="project-<?php echo esc_attr( $pid ); ?>"
				>
					<?php echo get_the_post_thumbnail( $pid, 'medium', array( 'class' => 'ss-home__card-thumb' ) ); ?>
					<span class="ss-home__card-category"><?php echo esc_html( implode( ' &middot; ', $term_names ) ); ?></span>
					<span class="ss-home__card-title"><?php the_title(); ?></span>
				</button>

				<div class="ss-home__modal" id="project-<?php echo esc_attr( $pid ); ?>" hidden>
					<div class="ss-home__modal-inner">
						<button type="button" class="ss-home__modal-close" aria-label="Close">&times;</button>
						<span class="ss-home__card-category"><?php echo esc_html( implode( ' &middot; ', $term_names ) ); ?></span>
						<h3 class="type-h3"><?php the_title(); ?></h3>
						<?php if ( $description ) : ?>
							<div class="ss-home__modal-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $gallery_ids ) ) : ?>
							<div class="ss-home__modal-gallery">
								<?php foreach ( $gallery_ids as $gid ) : ?>
									<?php echo wp_get_attachment_image( $gid, 'large' ); ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if ( is_array( $custom_field ) && $custom_field ) : ?>
							<p class="ss-home__modal-links">
								<?php foreach ( $custom_field as $field ) :
									$label = $field['project_custom_field_title'] ?? '';
									$value = $field['project_custom_field_value'] ?? '';
									if ( ! $label || ! $value ) {
										continue;
									}
									?>
									<a href="<?php echo esc_url( $value ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $label ); ?></a>
								<?php endforeach; ?>
							</p>
						<?php endif; ?>
						<?php if ( $project_link ) : ?>
							<p class="ss-home__modal-links"><a href="<?php echo esc_url( $project_link ); ?>" target="_blank" rel="noopener">View Project</a></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>

	<section class="ss-home__story">
		<p class="eyebrow">Our Story</p>
		<div class="ss-home__story-grid">
			<div class="ss-home__accordion">
				<details open>
					<summary>Our Story</summary>
					<p>Founded in 1997 by president and producer Trish Dolman, Screen Siren Pictures is an independent production company known for high-quality, award-winning feature films, scripted television, and documentary. Dolman, together with Producer and COO Steven Thibault &ndash; who re-joined the company in 2023 &ndash; are the dynamic team that leads the company. They regularly partner with veteran producer Christine Haebler on pedigree scripted projects. Collectively, their productions have screened at Cannes, Berlin, Sundance, TIFF, and top festivals globally. With a focus on international co-productions and partnerships, they work with marquee cast and directors to make media that changes the conversation.</p>
				</details>
				<details>
					<summary>Accolades</summary>
					<p>Collectively, our productions have screened at prominent international festivals such as Cannes, Berlin, and Sundance; receiving awards and nominations from the Toronto International Film Festival, Independent Film Festival of Boston, Hot Docs, Beijing International Film Festival, Warsaw Film Festival, Reykjavik Film Festival, Mill Valley Film Festival, The Banff World Media Festival, California American Indigenous and Indian Film Festival, Red Nation Film Festival, The Prix Italia, The Leo Awards, and the Canadian Screen Awards. Indian Horse, our feature adaptation of Richard Wagamese&rsquo;s award-winning novel, went on to become the highest-grossing English-Canadian release of 2018. In 2017, our crowd-sourced feature documentary, Canada In a Day, won two Canadian Screen Awards including Best Director, TV Documentary, and Best Editing, TV Documentary. Most recently, our documentary series British Columbia: An Untold History was nominated for 5 Canadian Screen Awards, including Best History Documentary Program or Series, and our feature documentary The New Corporation: The Unfortunately Necessary Sequel was nominated for 3 Canadian Screen Awards.</p>
				</details>
				<details>
					<summary>Our Reputation</summary>
					<p>Our theatrical and television productions have been produced for the following distributors, broadcasters and streaming platforms: Sony Pictures Classics, Sony Worldwide, Elevation Pictures, eOne, Netflix, the BBC, Bankside Films, Wild Bunch, CBC, Bell Media/CTV, Crave, Channel Four, Showtime, Sundance Channel, Discovery Canada, Documentary Channel, Knowledge Network, Corus/History Canada, TMN/MovieCentral, AETN, ARTE, ABC Australia, Vision TV, Superchannel, Al Jazeera and many more.</p>
				</details>
			</div>
			<?php echo wp_get_attachment_image( 5659587, 'large', false, array( 'class' => 'ss-home__story-photo' ) ); ?>
		</div>
	</section>

	<section class="ss-home__team">
		<p class="eyebrow">Our Team</p>
		<div class="ss-home__team-grid">
			<?php
			$team = array(
				array( 5659872, 'Trish Dolman', 'President / Producer' ),
				array( 5659874, 'Christine Haebler', 'Producer' ),
				array( 5659875, 'Steven Thibault', 'COO' ),
				array( 5659876, 'Tony Cerciello', 'Business Affairs Manager & HR Advisor' ),
				array( 5659870, 'Derek Moore', 'Head of Development' ),
				array( 5659869, 'Paul Sekhon', 'Financial Controller' ),
				array( 5659867, 'Cicy Nie', 'Development and Business Affairs Coordinator' ),
				array( null, 'Melanie Routhier', 'Bookkeeper and Office Manager' ),
			);
			foreach ( $team as $member ) :
				list( $img_id, $name, $title ) = $member;
				?>
				<div class="ss-home__team-member">
					<?php if ( $img_id ) : ?>
						<?php echo wp_get_attachment_image( $img_id, 'medium', false, array( 'class' => 'ss-home__team-photo' ) ); ?>
					<?php endif; ?>
					<h6><?php echo esc_html( $name ); ?><br><?php echo esc_html( $title ); ?></h6>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="ss-home__contact">
		<p class="eyebrow">Get in Touch</p>
		<p>Screen Siren Pictures does not accept unsolicited screenplays, pitch documents or other creative materials. Any unsolicited materials will be disposed of, unopened. We will only accept submissions from recognized literary and talent agents or lawyers.</p>
		<p>Screen Siren Pictures will seek out job applicants when we have corporate or crew positions available. Follow us on social media for updates and job postings.</p>
		<h6>Address</h6>
		<p>2021 Columbia Street<br>Vancouver, BC V5Y 3V6<br>604.687.7591<br>info@screensiren.ca</p>
	</section>

</main>

<?php get_footer(); ?>
