<?php include("_header.php") ?>
  <!-- Header -->
  <div class="campaign">
      <div class="container">
        <div class="event event-active" >
          <div class="event-content">
            <div class="tags">
              <div class="tag">
                Fab Truck
              </div>
              <div class="tag">
                Projects
              </div>
              <div class="tag">
                Activities
              </div>
            </div>
            <div class="title">
              FAB TRUCK 3D  <br />
              創客精神校園行動
            </div>
            <div class="link-container">
              <ul class="link">
                <li class="link-item">
                  <a href="<?=site_url("school/info/".rawurlencode("國立中興大學附屬臺中高級農業職業學校"))?>">
                    <span class="link-date">2015, 4/8 - 4/10 </span> <span class="link-title"> First Stop  興大附農 </span>
                  </a>
                </li>
              </ul>
            </div>
            <ul class="news"> 
              <li class="news-item news-item-active">
                <p>2015 年 Fab Lab 亞洲年會，即將在5月盛大舉行。歡迎報名參加。</p>
                <span class="news-date"> 今天</span>
              </li>
              <li class="news-item">
                <p>註冊台灣創客平台，上傳你的自造計畫與大家分享你的新發現。 <a href="<?=site_url("member/")?>">即刻登入</a></p>
                <span class="news-date"> 今天</span>
              </li>
              <li class="news-item">
                <p>3D 列印校園巡迴計畫，讓你找到年會，即將在5月盛大舉行。 歡迎報名參加</p>
                <span class="news-date"> 今天</span>
              </li>
            </ul>
          </div>
          <div class="event-image">
            <img src="<?=base_url("images/event_1.png")?>" />
          </div>


        </div>
      </div>
  </div>
  <!-- /Header -->

  <!-- Intro -->
  <div class="container container-map container-content" >
    <h2 class="section-title">自造卡車巡迴 FAB TRUCK ROADMAP </h2>
    <div class="trucks">
      <div>車長：
        <span style='background:yellow;color:black;'>全區-台中家商</span> &nbsp;&nbsp;
        <span style='background:green;color:white;'>北區-新北高工</span>  &nbsp;&nbsp;
        <span style='background:orange;color:white;'>中區-台中高工</span>  &nbsp;&nbsp;
        <span style='background:red;color:white;'>南區-南二中</span>  &nbsp;&nbsp;
        <span style='background:purple;color:white;'>高屏區-鳳山高工</span> &nbsp;&nbsp;
        <span style='background:blue;color:white;'>東區-花蓮高工</span> </div>
    </div>
    <div class="controls">
      <input type="text" class="map-search form-control" placeholder="校名快速搜尋..." name="q" style="background-image: none; background-position: 0% 0%; background-repeat: repeat;">
    </div>
    <div id="map-canvas" style="height:577px;width:100%;"></div>
    <div class="infos">
      <div class="image">
        <img src="<?=base_url("images/map_1.png")?>" />
      </div>
      <div class="info align-height-to"  >
        <p class="school">興大附農</p>
        <p class="date">2015, 4/8 - 4/10 </p>
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
  <!-- /Intro-->

  <div class="container container-content " >
    <div class="container-latest container-col-left">
      <h2 class="section-title">最新自造計畫 LATEST PROJECTS </h2>
      <div class="projects">
        <?php foreach($stories as $story){ ?>
        <div class="project">
          <div class="project-content">
            <div class="tags">
              <?php render_tags($story->tags) ?>
            </div>
            <a href="<?=site_url("project/view/".$story->storyID)?>">
              <div class="title">
                <?=h($story->title)?>
              </div>
              <div class="date">
                <?=h(_date_format($story->createDate,"Y/m/d"))?>
              </div>
            </a>
          </div>
          <div class="project-mask">
            
          </div>
          <div class="project-image">
            <img src="<?=base_url($story->cover)?>" />
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="more">
        <div class="line">
        </div>
        <div class="text">
          更多資訊
        </div>
      </div>
    </div>
    <div class="container-school">
      <h2 class="section-title">校園積分排行 CAMPUS RANKING </h2>
      <div class="schools" style="min-height:530px;">
      <?php for($ind = 1 ; $ind < 6; ++$ind){ 
          $text=Array(
            1 => "一",
            2 => "二",
            3 => "三",
            4 => "四",
            5 => "五");
        ?>
        <div class="school">
          <div class="school-image"><img src="<?=base_url("images/school_".$ind.".png")?>" /></div>
          <div class="school-info">
            <div class="rank">全國排名第<?=$text[$ind]?></div>
            <div class="projects">共上傳 0 件計畫。</div>
            <div class="score">總積分 0 分</div>
            <div class="record">0 次看過  0 則留言</div>
          </div>
        </div>
      <?php } ?>
      </div>
      <div class="more">
        <div class="line">
        </div>
        <div class="text">
          更多資訊
        </div>
      </div>
    </div>


    <!-- -->
    <div class="container-heros container-col-left">
      <h2 class="section-title">創客英雄 LEGEND MAKERS </h2>
      <div class="heros">
        <?php foreach($heros as $hero) { ?>
        <div class="hero">
          <div class="hero-image">
            <div class="hero-image-content">
              <div class="tags">
                <?php render_tags($hero->tags) ?>
              </div>
            </div>          
            <a href="<?=site_url("project/view/".$hero->storyID)?>">
              <img src="<?=base_url($hero->cover)?>" />
            </a>
          </div>
          <div class="hero-content article-content">
            <a href="<?=site_url("project/view/".$hero->storyID)?>">
              <div class="title">
                <?=h($hero->title)?>
              </div>
              <div class="date"> <?=_date_format($hero->createDate)?> </div>
              <div class="desc"><?=$hero->content?></div>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="more">
        <div class="line">
        </div>
        <div class="text">
          更多資訊
        </div>
      </div>
    </div>

    <div class="container container-model container-col-right">
      <h2 class="section-title">創客徽章下載 3D model Download</h2>
      <div class="model-left">
        <a href="<?=base_url("images/vmaker_models.zip")?>"><img src="<?=base_url("images/dwmodel.png")?>" /></a>
      </div>
      <div class="model-right">
        <a href="<?=base_url("images/vmaker_models.zip")?>"> <img src="<?=base_url("images/dwmodel2.png")?>" /></a>
        <div class="fb">
          <img src="<?=base_url("images/facebook.png")?>" />
        </div>
      </div>
    </div>
    
    <div class="container container-comment container-col-right">
      <h2 class="section-title">最新留言 Latest Comments </h2>
      
      <div class="comments">
        <div class="comment-header">
          寫下你的意見 <span>Give us your feedback</span>
        </div>

        <div class="fb-comments" width="100%" data-version="v2.3" 
            data-href="<?=site_url("/")?>" data-numposts="5" data-colorscheme="light"></div>

      </div>
    </div>

    <div class="container-activity container-col-left">
      <h2 class="section-title">創客活動 ACTIVITIES</h2>
      <div class="activities">
        <?php foreach($activities as $act){ ?>
        <div class="activity">
          <div class="activity-image">
            <div class="activity-image-content">
              <div class="tags">
                <?php render_tags($act->tags) ?>
              </div>
            </div>          
            <a href="<?=site_url("project/view/".$act->storyID)?>">
              <img src="<?=base_url($act->cover)?>" />
            </a>
          </div>
          <div class="activity-content article-content">
            <a href="<?=site_url("project/view/".$act->storyID)?>">
              <div class="title">
                <?=h($act->title)?>
              </div>
              <div class="date"> <?=_date_format($act->createDate)?> </div>
              <div class="desc"><?=_truncate(strip_tags($act->intro),60)?></div>
            </a>
          </div>
        </div>
        <?php } ?>
        <?php for($ind = 0 ; $ind < 0; ++$ind){ ?>
        <div class="activity">
          <div class="activity-image">
            <div class="activity-image-content">
              <div class="tags">
                <div class="tag">
                  PC Technology
                </div>
              </div>
            </div>          
            <img src="<?=base_url('images/activity_1.png')?>" />
          </div>
          <div class="activity-content article-content">
            <div class="title">
              3D 列印筆 隨手創做帶來新發現
            </div>
            <div class="date"> 2015/3/28 </div>
            <div class="caption"> 小朋友參加創意工作坊</div>
            <div class="desc">我們用「教育」喚醒台灣的Maker精神：開設3D列印課程、數位製造課程、設計思考課程、Maker著重於...</div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="more">
        <div class="line">
        </div>
        <div class="text">
          更多資訊
        </div>
      </div>
    </div>

    <div class="container-video container-col-left">
      <h2 class="section-title">創客精神 vMaker</h2>
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
          <iframe width="100%" height="258" src="https://www.youtube.com/embed/VREirE8afgg" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>

  </div>
<!--

    <div class="row">
        <h1 class="lead" >台灣創客 - Top makers in Taiwan</h1>
        <p class="tagline" >2015 Fab Truck 3D列印校園巡迴計畫</p>
        <p>
          <a href="<?=site_url("school/info")?>" class="btn btn-default btn-lg" 
            role="button" >詳細資料</a> 
          <a href="<?=site_url("school/schedule")?>" class="btn btn-action btn-lg" role="button">報名志工</a>
        </p>
    </div>
-->

  <!-- Intro -->

  <!--
  <div class="container text-center">
    <br>
    <h2 class="thin"> Maker 年會</h2>
    <p class="text-muted">
        Fab Lab 亞洲年會此一活動的目的，在於藉由 Fab Lab 亞洲年會、工作坊、研討會、
        創意競賽及國際論壇等系列活動， 和亞洲及大洋洲區域 Fab Lab 間分享交流，
        一方面加強亞洲區 Fab Lab 間直接的溝通，促使各 個 Fab Lab 間交流彼此營運及技術上的經驗，
        相互學習，同時也藉由工作坊、研討會來討論、分享 Fab Lab 社群未來發展的方向及促成更多國際合作的計畫......
    </p>
    <p>
      由 FabLab.dynamic，FabLab.Taipei，FabLab.Tainan 主辦
    </p>
    <p class="text-muted"> 日期：2015/5/26 ~ 2015/5/31 </p>
    <p><a href="http://local.vmaker.tw/fan2">更多詳情 » </a></p>
  </div>

  -->
  <!-- /Intro-->
    

</div>  <!-- /container -->
  
<div class="page-about">
  <div class="container">
    <div class="logo"><img src="<?=base_url("images/logo.png")?>" /></div>
    <div class="desc">
      善於動手做的創客(maker)藉開源共享(open source)使構想成為具體、使問題獲得解決，
      具有創意的創客則逐漸成為當前新創事業前鋒，這股潮流正是促成台灣產業發展改變的新動能。
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
  <script>

    $(".align-height-to").each(function(){
      $(this).height($(this).next().height());
    });
    $(window).on("resize",function(){
      $(".align-height-to").each(function(){
        $(this).height($(this).next().height());
      });
    });
  </script>
<?php } ?>

<?php include("_footer.php");?>


