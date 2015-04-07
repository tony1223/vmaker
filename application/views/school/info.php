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
      <h1><?=h($event->name)?>&nbsp;&nbsp;&nbsp;<small><?=h($event->area)?> - <?=$event->index?></small></h1> 
      <div class="container-datas clearfix container-data-<?=count($imgs) > 0 ? "two":"one"?>">
        <p>活動日期：<?=$event->start?> ~ <?=$event->end?></p>
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
          <h2 class="section-title">活動位置 PROJECT SHOWCASE</h2>
          <div class="images event-image">
            <div id="map-canvas2" data-name="<?=h($event->name)?>" data-lat="<?=$event->lat?>" data-lng="<?=$event->lat?>" style="height:400px;width:100%;"></div>
            <?php if(0){ ?>
            <?php if($story->cover!= null){ ?>
            <img src="<?=base_url($story->cover)?>" />
            <?php } else { ?>
            暫無資料
            <?php } ?>
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="container-desc">
        <h2 class="section-title">計畫簡介 DESCRIPTION</h2>
        <div class="content">
          <div class="date"> <?=_date_format("2015/".$event->start,"Y-m-d")?> </div>
          <div class="text">
            <txt>
              <h3>緣起</h3>
              <p class="sec">由於新科技的不斷推陳出新，急遽的改變了我們的生活內容，同時也改變了我們參與世 界的方法，
              過去僅是2D平面的思考模式，在3D時代來臨時使我們面對更多的挑戰。
              為了結 合台灣過去科技製造發展的優勢基礎，來面對新一波科技潮流衝擊，
              我們思考從學校出發， 結合Maker（創客）實作精神，
              與最新的3D列印技術，規劃能與學校程銜接的普及化推廣計 畫。</p> 
              </ul>
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
  


          <p class="sec">
            此計畫引進美國MIT（麻省理工學院）發起的Fab Lab實驗室模式及其教育推廣概念，
            創造可供參與者自行設計、製造創作作品的空間。在實踐上，以3D列印行動實驗室Fab Truck，

            巡迴學校的方式來落實觀念推廣，讓有興趣的師生實際參與體驗教學、創意啟發到動手實作。
            同時在互動過程中，傳遞以科技改善社會與生活的意義，讓更多師生實際了解3D、運用3D，
            更期望能在創意的激發下，培育更多的相關人才，並了解國際趨勢，
            養成與國際對話的能力，進而建構影響未來台灣先進技術產業發展的基礎。
          </p>

          <p class="sec">
            同時本計畫也以雲端資源分享的方式，讓有興趣的師生能自由運用Fab Truck的設備資源，
            將個人設計的作品製作記錄分享給大眾，讓更多想法和產品能夠相互激盪，而有更廣泛的應用。
          </p>

          <h3>目標</h3>

          <ul class="def-ul">
            <li> 
              <p>一、3D人才紮根 </p>
              <p class="sec">從青年進入階段植入高科技技術的學習與應用，有助於對未來科技發展的前導認知，更能為未來產業發展生態提供需求人才。</p>
            </li>
            <li> 
              <p>二、科技帶動創意 </p>
              <p class="sec">透過開放性的自主創意設計，引導學生思考，帶動改善創意設計的概念，
                期待引發更大量的創意被實現，積極促成社會設計與創新。</p>
            </li>
            <li> 
              <p>三、國際趨勢接軌 </p>
              <p class="sec">在當前講求實踐能力的時代，國際性的Fab Lab組織所帶來的不只是知識分享，
              同時也是將腦中想法能具體實踐的能力分享與推廣，行動Fab Lab的計畫在世界許多國家已行之有年，
              目前荷蘭、美國皆有Fab Lab行動實驗室的行動卡車計畫，此計畫亦可國際串聯。

              本計畫執行，將是臺灣做為亞洲地區第一個推動Fab Lab 行動實驗室的計畫，同時也是全球唯三擁有此計畫的地區。</p>
            </li>


          </ul>
<h3>計畫內容</h3>

        <ul class="def-ul">
          <li> 
            <p>一、建置Fab Truck行動實驗室 </p>
            <p class="sec"> 
              Fab Truck利用租賃貨櫃進行改裝，成為一個可以展示並結合3D數位設計製造的行動實驗室，
              提供相關硬體設備如3D印表機、3D掃描器、小型CNC電腦銑床、 鐳射切割機及電腦割字機等，
             以工作坊形式並舉辦體驗活動，創造更多元化的科教 推廣模式，
             讓學生、老師透過實際動手體驗，學習到數位設計與製造的意義及應用 價值，
             並透過國際上行動Fab Lab的計畫串聯，可在相關社群中分享成果。</p>
          </li>
          <li> 
            <p>二、辦理校園巡迴推廣活動 </p>
            <p class="sec"> 
              本計畫屬實驗及推廣性質，
              規劃以一部 Fab Truck 行動實驗室移動至已普及設置 3D 列印設備的各高級中等學校辦理 3D 列印校園巡迴推廣活動，
              並針對各校課程發展及設備需求，規劃符合師生需求的研習課程。
            </p>
          </li>
          <li> 
            <p>三、協辦種子師資培訓</p>
            <p class="sec"> 
              協助辦理各學科中心、群科中心及技教中心3D列印種子教師專業培訓研習，
              並研發教材及教案，以利各學科中心、群科中心及技教中心辦理所屬學群科教師研習，
              推廣高級中等學校3D列印應用融入課程與教學。
            </p>
          </li>
          <li> 
            <p>四、協辦學生競賽</p>
            <p class="sec"> 
              協助辦理全國高級中等學校學生3D列印競賽，獎勵優秀學生作品，
              激發學生創造能力與學習動機，並能透過社群平台互相交流分享，以推動學生3D列印創作與自造風氣。
            </p>
          </li>
          <li> 
            <p>五、協助輔導區域自造實驗室(簡稱Fab Lab)</p>
            <p class="sec"> 
              協助輔導新設Fab Lab學校，傳承Fab Lab規劃及推動經驗，
              以利區域資源整合並發揮種子效應，推廣3D列印教學成效至更多地區與學校。
            </p>
          </li>
        </ul>

        <h3>活動日期及地點</h3>

        <ul class="def-ul">
          <li>
            活動日期：<?=$event->start?> ~ <?=$event->end?>
          </li>
          <li>
            活動地點：<?=$event->name?> ( <?=$event->address?> )
          </li>
        </ul>

        <h3>巡迴活動內容</h3>

        <ul class="def-ul">

          <li>
            一、參與對象：
            <p class="sec"> 以巡迴學校之教師、學生為主，參與教師給予研習時數，參與學生由各
              巡迴學校推薦遴選或安排適合的科班、年級學生參加。
            </p>
          </li>
          <li>
            二、課程內容
            <ul class="def-ul">
              <li>
                1.Fab Lab簡介：
                <p class="sec"> 介紹全球及區域性Fab Lab特色及在世界各地的影響與改變，傳達Fab Lab知識分享精神、Fab Lab對各領域的影響、Fab Lab落實行動的價值。
                </p>
              </li>

              <li>
                2.主題講座：
                <p class="sec"> 安排3D製圖建模、3D掃描等軟體教學，學習設計製作3D模型，奠定3D 列印之學習基礎，鼓勵學習動機，培育成為未來3D列印等相關人才。
                </p>
              </li>

              <li>
                3.教學軟體：
                <p class="sec"> 宜選用自由軟體、免費軟體或雲端應用軟體等做為3D列印教學軟體，
                以利師生容易取得所需應用軟體，提高學習動機與學習成效，同時瞭解軟體授權的觀念。
                </p>
              </li>

              <li>
                4.操作體驗：
                <p class="sec"> 參加研習課程之師生實施分組，藉由分組討論與發想，共同創作設計作品，
                每組組員共同操作體驗如何將設計之作品以3D印表機等設備輸出成型，
                共同完成一個專屬於自己的體驗作品。
                </p>
              </li>

            </ul>
          </li>

          <li>
            三、研習講座
            <p class="sec">
              研習講師、助教及導覽員由承辦學校聘請專家學者或協辦單位專業人員擔任，
              並依各學校實際課程需求安排調整。
            </p>

          </li>
          <li>
            四、活動場地
             <ul class="def-ul">
              <li>
                1. Fab Truck行動實驗室
                <p class="sec"> 裝設Fab Lab相關設備如3D印表機、3D掃描器、
                  小型CNC電腦銑床、鐳射切割機及電腦割字機等設備，
                  於 Fab Truck 內導覽解說及示範操作，供全校師生參觀及體驗。
                </p>
              </li>
              <li>
                2.研習教室
                <p class="sec"> 巡迴學校之研習教室以安排電腦教室為主，參加研習之師生以每人一機為原則，以利達成學習成效。承辦學校並提供8~10台3D印表機等設備，供參加研習師生分組列印輸出作品。
                </p>
              </li>
              <li>
               3.展示場地
                <p class="sec">各巡迴學校可協助安排展示本校師生相關3D創作成品，
                  或搭配設備廠商展出數位製造成品與相關設備，供全校師生參觀，
                  並可邀請鄰近學校師生到校參觀，擴大實施成效。
                </p>
              </li>
            </ul>
          </li>
        </ul>          

        </div>
      </div>

      <div class="container container-comment container-col-right">
        <h2 class="section-title">最新留言 Latest Comments </h2>
        
        <div class="comments">
          <div class="comment-header">
            寫下你的意見 <span>Give us your feedback</span>
          </div>

          <div class="fb-comments" width="100%" data-version="v2.3" data-href="<?=site_url("school/info/".rawurlencode($event->name))?>" data-numposts="5" data-colorscheme="light"></div>

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

