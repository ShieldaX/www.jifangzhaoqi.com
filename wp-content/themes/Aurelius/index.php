<?php get_header(); ?>
	<!-- Column 1 /Content -->
	<div class="grid_8">
		<!-- Blog Post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<!-- Post Title -->
			<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<!-- Post Data -->
			<p class="sub"><?php the_tags('标签：', ', ', ''); ?> &bull; <?php the_time('Y年n月j日'); ?> &bull; <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭') ?><?php edit_post_link('编辑', ' • ', ''); ?></p>
			<div class="hr dotted clearfix">&nbsp;</div>
			<!-- Post Image -->
			<img class="thumb" alt="" src="<?php bloginfo('template_url'); ?>/images/610x150.gif" />
			<!-- Post Content -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <b>Mauris vel porta erat.</b> Quisque sit amet risus at odio pellentesque sollicitudin. Proin suscipit molestie facilisis. Aenean vel massa magna. Proin nec lacinia augue. Mauris venenatis libero nec odio viverra consequat. In hac habitasse platea dictumst.</p>
			<p>Cras vestibulum lorem et dui mollis sed posuere leo semper. Integer ac ultrices neque. Cras lacinia orci a augue tempor egestas. Sed cursus, sem ut vehicula vehicula, ipsum est mattis justo, at volutpat nibh arcu sit amet risus. Vestibulum tincidunt, eros ut commodo laoreet, arcu eros ultrices nibh, ac auctor est dui vel nibh.</p>
			<!-- Read More Button -->
			<p class="clearfix"><a href="<?php the_permalink(); ?>" class="button right">阅读全文</a></p>
		</div>
		<div class="hr clearfix">&nbsp;</div>
	<?php endwhile ?>

		<!-- Blog Navigation -->
		<p class="clearfix"><?php previous_posts_link('<< 查看新文章', 0); ?> <span class="float right"><?php next_posts_link('查看旧文章 >>', 0); ?></span></p>
		<?php else : ?>
		<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
		<p>没有找到任何文章！</p>
		<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
