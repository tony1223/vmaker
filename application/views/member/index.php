
<?php include(dirname(__FILE__)."/../_header.php") ?>

  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">

  <!--
    <ol class="breadcrumb"> 
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">創客</li>
      <li class="active">創客首頁</li>
    </ol>
  -->
  
    <div class="row">
  <!-- Left Column -->
      <article class="col-sm-12 about-content">
        <header class="page-header">
        </header>


        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="<?=site_url("/member/index")?>">關於我</a></li>
          <li role="presentation"><a href="<?=site_url("/member/projects")?>">我的自造者專案</a></li>
        </ul>

        <div class="panel" style="padding: 20px;">
            <div class="member_data col-md-12" style="padding-top:30px;padding-bottom:20px;">
              <div class="title">個人簡介：</div>
              <div class="content">
              <?php if($mem->mem_desc != ""){ ?>
                <?=nl2br(h($mem->mem_desc))?>
              <?php }else{ ?>
                暫無資料
              <?php } ?>
              </div>
            </div>

          
        <div class="form_profile_edit col-md-12" style="width:420px; float:left;">
           <div class="titlea" >
            社群資訊：
           </div>
                   
           <table class="table table-bordered col-md-5 del-left-pad" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="member-info-field "><div class="email">Email：</div></td>
                  <td class="member-info-content" colspan="2" >
                    <div class="link"><a href="#"><?=h($mem->email)?></a></div></td>
                </tr>
              <tr>
                <td class="member-info-field "><div class="web">個人網站：</div></td>
                <td class="member-info-content ">
                  <div class="link">
                    <a href="#"><?=h($mem->url==""?"暫無資料":$mem->url)?></a></div></td>
              </tr>
              <tr>
                <td class="member-info-field " ><div class="twitter">Twitter：</div></td>
                <td class="member-info-content " colspan="2" >
                  <div class="link"><a href="#">
                    <?=h($mem->twitter==""?"暫無資料":$mem->twitter)?></a></div></td>
              </tr>
              <tr>
                <td class="member-info-field " ><div class="facebook">Facebook</div></td>
                <td class="member-info-content " colspan="2" ><div class="link" style="width: 200px; word-break: normal;">
                  <a href="#"><?=h($mem->facebook==""?"暫無資料":$mem->facebook)?></a></div></td>
              </tr>
              <tr>
                <td class="member-info-field " ><div class="google">Google+</div></td>
                <td class="member-info-content " colspan="2" ><div class="link">
                  <a href="#"><?=h($mem->gplus==""?"暫無資料":$mem->gplus)?></a></div></td>
              </tr>
            </tbody>
          </table>
       </div>


        <div class="form_profile_edit col-md-5 " style="">

           <div class="titlea" >
            基本資料：
           </div>
           <form action="">
               <table class="table table-bordered " border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td class="member-info-field ">暱稱：</td>
                    <td colspan="2"  class="member-info-content ">
                      <?=h($mem->nick_name)?>
                    </td>
                  </tr>
                  <tr>
                    <td class="member-info-field "><div class="">Email：</div></td>
                    <td class="member-info-content" colspan="2" >
                      <div class="link"><a href="#"><?=h($mem->email)?></a></div></td>
                  </tr>                
                  <tr>
                    <td  class="member-info-field ">生日：</td>
                    <td colspan="2"  class="member-info-content ">
                      <?=_date_format($mem->birthday,"Y/m/d")?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
        </div>                                                                
        <div style="clear:both;"></div>
        <div class="button" style="padding-left:430px; padding-top:50px;">
          <a class="btn btn-primary" href="<?=site_url("member/info_edit")?>">編 輯</a></div></div>
      </div>


      </article>

    </div>
  </div>  <!-- /container -->


<?php include(dirname(__FILE__)."/../_footer.php");?>

<?php function js_section() { ?>


<?php } ?>

