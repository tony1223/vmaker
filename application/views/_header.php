<?php

    if(!isset($sub)){
        $sub = "";
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">


    <title> 
        <?php if(isset($pageTitle) ){ ?>
            <?=h($pageTitle)?> | 台灣創客運動 
        <?php }else{ ?>
            台灣創客運動 - Top makers in Taiwan
        <?php } ?>
    </title>

    <?php if(isset($og_desc)) { ?>
    <meta name="description" content="<?=h($og_desc)?>" /> 
    <?php }else{ ?>
    <meta name="description" content="台灣創客運動 - Top makers in Taiwan" /> 
    <?php } ?>

    <!--給FB看的設定-->
    <?php if(isset($og_image)){ ?>
<meta property="og:image" content="<?=$og_image?>" />
    <?php } ?>

<meta property="og:type" content="website" />
<meta property="fb:app_id" content="245849092187897" />
<!-- <meta property="fb:admins" content="107507809341864"/> -->

    <?php if(isset($pageTitle) ){ ?>
        <meta property="og:title" content="<?=h($pageTitle)?> | 台灣創客 " />
    <?php }else{ ?>
        <meta property="og:title" content="台灣創客" />
    <?php } ?>

    <?php if(isset($og_url)) { ?>
        <meta property="og:url" content="<?=h($og_url)?>" />
    <?php } ?>

    <?php if(isset($og_desc)) { ?>
    <meta name="og:description" content="<?=h($og_desc)?>" /> 
    <?php }else{ ?>
    <meta name="og:description" content="" /> 
    <?php } ?>


    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url("images/apple-icon-57x57.png")?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url("images/apple-icon-60x60.png")?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url("images/apple-icon-72x72.png")?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url("images/apple-icon-76x76.png")?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url("images/apple-icon-114x114.png")?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url("images/apple-icon-120x120.png")?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url("images/apple-icon-144x144.png")?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url("images/apple-icon-152x152.png")?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url("images/apple-icon-180x180.png")?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url("images/android-icon-192x192.png")?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url("images/favicon-32x32.png")?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url("images/favicon-96x96.png")?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url("images/favicon-16x16.png")?>">
    <link rel="manifest" href="<?=base_url("images/manifest.json")?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=base_url("images/ms-icon-144x144.png")?>">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="<?=base_url("css/bootstrap-theme.css")?>" media="screen">
    <link rel="stylesheet" href="<?=site_url("scss/file/main.scss")?>" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=base_url("js/html5shiv.js")?>"></script>
    <script src="<?=base_url("js/respond.min.js")?>"></script>
    <![endif]-->
</head>

<body class="home <?=$page_key?>">
    <!-- Fixed navbar -->
    <div class="header">
        <div class="container">
            <div class="logo"><a class="navbar-brand" href="<?=site_url("/")?>">
                <img src="<?=base_url("images/web_logo.png")?>" alt="vmaker=maker 2.0"></a>
            </div>
            <?php if(!is_login()){?>
            <div class="controls">
                <a href="<?=site_url("member")?>">登入 / Log in</a>
            </div>
            <?php }else{ ?>
            <div class="controls">
                <a href="<?=site_url("member/logout")?>">登出 / Log out</a>
            </div>
            <?php } ?>
            <ul data-role="menu" class="menu">
                <li class="menu-item <?=$sub =="home" ?"menu-item-active" :""?> "  data-role="menu-item" >
                    <a href="<?=site_url("/")?>">
                        <p class="menu-title">台灣創客</p>
                        <p class="menu-label">HOME</p>
                        <p class="menu-status"></p>
                    </a>
                </li>
                <li class="menu-item <?=$sub =="about" ?"menu-item-active" :""?> "  data-role="menu-item">
                    <a href="<?=site_url("/about")?>">
                        <p class="menu-title">創客精神</p>
                        <p class="menu-label">vMaker</p>
                        <p class="menu-status"></p>
                    </a>
                </li>
                <li class="menu-item <?=$sub =="projects" ?"menu-item-active" :""?> "  data-role="menu-item">
                    <a href="<?=site_url("/project")?>">
                        <p class="menu-title">自造計畫</p>
                        <p class="menu-label">PROJECTS</p>
                        <p class="menu-status"></p>
                    </a>
                </li>
                <!--
                <li class="menu-item <?=$sub =="activity" ?"menu-item-active" :""?> "  data-role="menu-item">
                    <p class="menu-title">創客活動</p>
                    <p class="menu-label">ACTIVITIES</p>
                    <p class="menu-status"></p>
                </li>
                -->
                <li class="menu-item <?=$sub =="member" ?"menu-item-active" :""?> " data-role="menu-item">
                    <a href="<?=site_url("/internation")?>">
                        <p class="menu-title">國際訊息</p>
                        <p class="menu-label">INTERNATIONAL</p>
                        <p class="menu-status"></p>
                    </a>
                </li>
                <li class="menu-item <?=$sub =="member" ?"menu-item-active" :""?> " data-role="menu-item">
                    <a href="<?=site_url("/member")?>">
                        <p class="menu-title">我是創客</p>
                        <p class="menu-label">BEING MAKER</p>
                        <p class="menu-status"></p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
