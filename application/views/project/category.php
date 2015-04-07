<?php include(__DIR__."/../_header.php") ?>
  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">

    <div class="row page-content">
      <div class="container">
        <h1>創客的自造計畫</h1>
      </div>
      <div class="container container-menu container-col-left">
        <h2 class="section-title">計畫類別 PROJECT CATEGORIES</h2>
        
        <ul class="category-menu">
        <?php foreach($categories as $cat ){ ?>
          <li>
            <a class="category-title" href="#"><?=$cat["name"]?></a>
            <ul class="category-sub-menu">
              <?php foreach($cat["childs"] as $child){ ?>
              <li>
                <a href="<?=site_url("project/category/".h($child["key"]))?>"><?=h($child["name"])?></a>
              </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
        </ul>

        <div class="container-hot">
          <img src="<?=base_url("images/interactive.png")?>" />
          <h2 class="section-title">熱門自造計畫 POPULAR PROJECTS</h2>
          <div class="article-interactive">
          	<?php foreach($hot_stories as $story){ ?>
          	<div class="article">
              <div class="article-image">
              	<?php if($story->cover != null) { ?>
              	<img src="<?=base_url($story->cover)?>" />
              	<?php }else{ ?>
              	<div style="width:80px;height:66px;background:#dddddd;padding-left:10px;padding-top:20px;">暫無圖片</div>
              	<?php } ?>
              </div>
              <div class="article-info">
                <div class="rank"><?=h($story->title)?></div>
                <!-- <div class="score">by Hank &amp; Maxwell </div> -->
                <div class="score"> &nbsp; </div>
                <div class="record"><?=h($story->count_show)?> 次看過  0 則留言</div>
              </div>
            </div>
          	<?php }?>
          <?php for($ind = 1 ; $ind < 0; ++$ind){  ?>
            <div class="article">
              <div class="article-image"><img src="<?=base_url("images/vmaker-design.png")?>" /></div>
              <div class="article-info">
                <div class="rank">V-maker 視覺互動設計，圓形代表居中調和的設計思維。</div>
                <div class="score">by Hank &amp; Maxwell </div>
                <div class="record">oo 人看過  o 則留言</div>
              </div>
            </div>
          <?php } ?>
          </div>
          <!--
          <div class="more">
            <div class="line">
            </div>
            <div class="text">
              更多資訊
            </div>
          </div>
          -->
        </div>
      </div>

      <div class="container-projects container-item container-col-right">
        <h2 class="section-title">[ <?=$current_cat["name"]?> ] 類別自造計畫 </h2>
        <div class="items" style="min-height:300px;">
        	<?php if(count($stories) == 0){ ?>
        		<p>暫無資料</p>
        	<?php } ?>
          <?php foreach($stories as $story){ ?>
          <div class="item">
            <div class="item-image">
              <div class="item-image-content">
                <div class="tags">
                  <?php render_tags($story->tags) ?>
                </div>
              </div> 
              <a href="<?=site_url("project/view/".$story->storyID)?>">
                <?php if($story->cover != null){ ?>
                <img src="<?=base_url($story->cover)?>" />
                <?php } else { ?> 
                <div style="width:298px;height:258px;background:#dddddd;padding-left:40%;padding-top:40%;">暫無圖片</div>
                <?php } ?>
              </a>
            </div>
            <div class="item-content article-content">
              <a href="<?=site_url("project/view/".$story->storyID)?>">
                <div class="title">
                  <?=h($story->title)?>
                </div>
                <div class="date"> <?=h(_date_format($story->createDate))?> </div>
                <div class="caption"> </div>
                <div class="desc"><?=_truncate(strip_tags($story->content),80)?></div>
              </a>
            </div>
          </div>
          <?php } ?>
          <?php for($ind = 0 ; $ind < 0; ++$ind){ ?>
          <div class="item">
            <div class="item-image">
              <div class="item-image-content">
                <div class="tags">
                  <div class="tag">
                    PC Technology
                  </div>
                </div>
              </div>          
              <img src="<?=base_url('images/hero_1.png')?>" />
            </div>
            <div class="item-content article-content">
              <div class="title">
                童子賢 - 動手創造(test)
              </div>
              <div class="date"> 2015/3/28 </div>
              <div class="caption"> 科技的腦。素質的心</div>
              <div class="desc">從二十九歲創辦華碩，四十歲催生華碩工業設計部門、打開華碩自有品牌筆記型電腦一片天，
                到四十八歲一肩挑起華碩分家後的代工重擔、帶領和碩聯合為止...</div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="container-video container-col-right">
        <h2 class="section-title">創客精神 V-MAKER</h2>
        <div class="video">
          <div class="video-info article-content">
            <div class="title">
              自造世代中文預告
            </div>
            <div class="date"> 2015/2/9 </div>
            <div class="caption"> 關於創客與自造者運動的國際紀錄片 </div>
            <div class="desc">片中訪問美國自造者運動的主要靈魂人物，
              以及科技領域裡世界級的思想領袖，探討「自造者...</div>
          </div>
          <div class="video-content">
            <iframe width="300" height="258" src="https://www.youtube.com/embed/VREirE8afgg" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>  <!-- /container -->

<div class="container-map container-content" >
  <div class="container">
    <h2 class="section-title">自造卡車巡迴 FAB TRUCK ROADMAP </h2>
  </div>
  <div id="map-canvas" style="height:400px;width:100%;"></div>
  <div class="infos">
    <div class="image">
      <img src="<?=base_url("images/map_1.png")?>" />
    </div>
    <div class="info">
      <p class="school">師大附中</p>
      <p class="date">2015, 5/6 - 5/8 </p>
      <p class="eye"><img src="<?=base_url("images/eye.png")?>" /></p>
    </div>
    <div class="image">
      <img src="<?=base_url("images/map_2.png")?>" />
    </div>
    <div class="image">
      <img src="<?=base_url("images/map_3.png")?>" />
    </div>
  </div>
</div>
  <script>  
window.schools = <?=json_encode($events)?>;
</script>

<?php function js_section(){ ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pjQV-YnaO1pAhhE-RhsM_0bPuzlYFVg"></script>
  <script src="<?=base_url("js/truckmap.js")?>"> </script>
  <script>
    google.maps.event.addDomListener(window, 'load', window.map_init);
  </script>
<?php } ?>

<?php include(__DIR__."/../_footer.php") ?>

