<!-- サイドメニュー -->       
<section class="sidemenu">
    <div class="col-md-4 col-sm-12">
       <div class="well sidemenu__block">
            <aside class="sidemenu__block__widget">
                <h3 class="sidemenu__block__widget__title">スポンサー</h3>
                <div class="sidemenu__block__widget__ad">
                    <?php if(is_mobile()) : ?>
                        <!-- SP用広告用タグ -->
                    <?php elseif(wp_is_mobile()) : ?>
                        <!-- TB用広告用タグ -->                   
                    <?php else : ?>
                        <!-- PC用広告用タグ -->
                    <?php endif ; ?>
                </div>
            </aside>
        </div>

        <div class="well sidemenu__block">
            <aside class="sidemenu__block__widget">
                <h3 class="sidemenu__block__widget__title">人気記事</h3>
            <!-- popular posts -->
            <div class="sidemenu__block__widget__post">
                <?php
                // views post metaで記事のPV情報を取得する
                set_post_views(get_the_ID());

                $args = array(
                    'post_type'     => 'post',  //投稿タイプ
                    'numberposts'   => 5,       //表示数
                    'meta_key'      => 'post_views_count',
                    'orderby'       => 'meta_value_num',
                    'order'         => 'DESC',
                );
                $posts = get_posts( $args );
                if($posts) : ?>
                <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
                <!-- post -->
                <div class="post">
                    <!-- image -->
                    <div class="sidemenu__block__widget__post__left">
                        <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail('thumbnail'); ?>
                          <?php else : ?>
                          <img src="http://placehold.it/60x60">
                        <?php endif ; ?>
                        </a>
                    </div> 
                    <!-- end post image -->
                    <!-- content -->
                    <div class="sidemenu__block__widget__post__right">
                        <a href="<?php the_permalink(); ?>" class="sidemenu__block__widget__post__right__text"><?php the_title(); ?></a>
                        <span class="sidemenu__block__widget__post__right__date"><?php the_time('Y/m/d') ?></span>
                    </div>
                    <!-- end content -->
                </div><!-- end post -->
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <?php endif; ?>     
            </div>
            <!-- end posts wrapper -->
        </aside>
    </div>

    <div class="well sidemenu__block">
        <aside class="sidemenu__block__widget">
            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="キーワードを入力" value="<?php get_search_query(); ?>" name="s">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </aside>
    </div>

    <div class="well sidemenu__block">
        <aside class="sidemenu__block__widget">
            <h3 class="sidemenu__block__widget__title">カテゴリー</h3>
            <ul class="sidemenu__block__widget__category">
                <?php
                    $args=array(
                        'orderby' => 'id',
                        'order' => 'ASC',
                        'exclude' => '1',
                        'include' => ''
                    );
                    $categories = get_categories($args);
                    foreach( $categories as $category ) {
                        echo  '<li class="sidemenu__block__widget__category__list"><a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" class="sidemenu__block__widget__category__list__link">' . $category->cat_name . '</a><span class="sidemenu__block__widget__category__list__postCount">' . $category->count . '</span></li>' ;
                    }
                ?>
            </ul>
        </aside>
    </div>

    <div class="well sidemenu__block">
        <aside class="sidemenu__block__widget">
            <h3 class="sidemenu__block__widget__title">タグ</h3>
            <div class="sidemenu__block__widget__tagcloud">
                <?php
                    $args=array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'exclude' => '',
                        'include' => ''
                    );
                    $posttags = get_tags($args);
                    if ($posttags) {
                        foreach($posttags as $tag) {
                        echo '<a href="'. get_tag_link($tag->term_id) .'" class="sidemenu__block__widget__tagcloud__link">' . $tag->name . '</a>';
                        }
                    }
                ?>
            </div>
        </aside>		
    </div>
</div>
<!-- /サイドメニュー -->