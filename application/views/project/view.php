<?php include(__DIR__."/../_header.php") ?>
  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">
  <!--
    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">Makers</li>
    </ol>
  -->

    <div class="row page-content">
      <h1><?=h($story->title)?></h1>
      <div class="container-datas clearfix container-data-<?=count($imgs) > 0 ? "two":"one"?>">
        <?php if(count($imgs) > 0) {?>
        <div class="container-images">
          <h2 class="section-title">更多圖片 IMAGES</h2>
          <div class="images event-image">
            <?php foreach($imgs as $img) { ?>
            <div class="image">
              <img src="<?=base_url($img->url)?>" />
            </div>
            <?php }?>
          </div>
        </div>
        <?php }?>
        <div class="container-showcase">
          <h2 class="section-title">計畫展示 PROJECT SHOWCASE</h2>
          <div class="images event-image">
            <?php if($story->cover!= null){ ?>
            <img src="<?=base_url($story->cover)?>" />
            <?php } else { ?>
            暫無資料
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="container-desc">
        <h2 class="section-title">計畫簡介 DESCRIPTION</h2>
        <div class="content">
          <div class="date"> <?=_date_format($story->createDate)?> </div>
          <div class="text">
            <txt>
              <?=$story->content?>
            </txt>
          </div>
          <div class="share">
          </div>
        </div>
      </div>

      <div class="container-information">
        <h2 class="section-title">計畫相關內容 project information</h2>
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#">計畫內容</a></li>
          <!--
          <li role="presentation"><a href="#">相關報導</a></li>
          <li role="presentation"><a href="#">活動訊息</a></li>
          -->
        </ul>
        <div class="panel">
          <?php if(_get_user_sn() ==  $story->userID){ ?>
            <div class="pull-right">
              <a href="<?=site_url("/member/project_edit/".$story->storyID)?>">
                編輯
              </a>
              &nbsp;&nbsp;
              <a href="<?=site_url("/member/project_del/".$story->storyID)?>">
                刪除
              </a>
              &nbsp;&nbsp;
            </div>
          <?php } ?>
          <?=$story->intro?>
        </div>
      </div>

      <div class="container container-comment container-col-right">
        <h2 class="section-title">最新留言 Latest Comments </h2>
        
        <div class="comments">
          <div class="comment-header">
            寫下你的意見 <span>Give us your feedback</span>
          </div>

          <div class="fb-comments" width="322" data-version="v2.3" data-href="<?=site_url("project/view/".$story->storyID)?>" data-numposts="5" data-colorscheme="light"></div>

        </div>
      </div>
    </div>
  </div>  <!-- /container -->
<div class="container-map container-content" >
  <div class="container">
    <h2 class="section-title">自造卡車巡迴 FAB TRUCK ROADMAP </h2>
    <div class="controls">
      <input type="text" class="map-search form-control" placeholder="校名快速搜尋..." name="q" style="background-image: none; background-position: 0% 0%; background-repeat: repeat;">
    </div>
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
  <script src="<?=base_url("js/jquery.blockUI.min.js")?>"></script>
  <script>
      $('.event-image img').click(function() { 
        $.blockUI({ 
            message: $(this).clone().css("max-width","80%"), 
            css: { 
                top:  '10%', 
                left: '5%', 
                width: '90%' 
            } 
        }); 
        $('.blockOverlay').attr('title','').click($.unblockUI); 

    }); 
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pjQV-YnaO1pAhhE-RhsM_0bPuzlYFVg"></script>
  <script src="<?=base_url("js/truckmap.js")?>"> </script>
  <script>
    google.maps.event.addDomListener(window, 'load', window.map_init);
  </script>

<?php } ?>

<?php include(__DIR__."/../_footer.php") ?>

