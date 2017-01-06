<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>
    <?php 
    if(!is_home()){wp_title(' | ', true, 'right');}bloginfo('name');
    ?>
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- /CSS -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- グローバルナビゲーション -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url('/'); ?>">サイトタイトル</a>
            </div>
            <?php
                // 指定したカテゴリーの ID を取得
                $category_id01 = get_cat_ID( 'カテゴリー名' );
                $category_id02 = get_cat_ID( 'カテゴリー名' );
                $category_id03 = get_cat_ID( 'カテゴリー名' );
                $category_id04 = get_cat_ID( 'カテゴリー名' );

                // このカテゴリーの URL を取得
                $category_link01 = get_category_link( $category_id01 );
                $category_link02 = get_category_link( $category_id02 );
                $category_link03 = get_category_link( $category_id03 );
                $category_link04 = get_category_link( $category_id04 );
            ?>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo esc_url( $category_link01 ); ?>">メニュー01</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $category_link02 ); ?>">メニュー02</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $category_link03 ); ?>">メニュー03</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $category_link04 ); ?>">メニュー04</a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_link(固定ページID); ?>">メニュー05</a>
                    </li>
                    <li>
                        <a href="<?php echo get_page_link(固定ページID); ?>">メニュー06</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /グローバルナビゲーション -->
