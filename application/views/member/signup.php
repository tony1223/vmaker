
<?php include(dirname(__FILE__)."/../_header.php") ?>

  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">
    <!--
    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">Maker 登錄</li>
    </ol>
    -->

    <div class="row">
  <!-- Left Column -->
      <article class="col-xs-8 col-xs-offset-2  about-content">
        <header class="page-header">
          <h1 class="page-title">登錄為新創客</h1>
        </header>

        <form id="form1" action="<?=site_url("member/signuping")?>" method="post">
          <div id="login">
            <div class="form_post">
              <h2>歡迎登錄創客! 請填寫以下資訊完成註冊。</h2>
                <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
                    <td width="92" style="vertical-align:text-top;white-space: nowrap; padding-right:10px;">Email：<br><span style="color:#999; font-size:13px;">(登入帳號)</span></td>
                    <td width="508" colspan="2">
                      <input type="text" tabindex="1" name="email" style="width:210px;"  class="title" ></td>
                  </tr>
                  <tr>
                    <td style="vertical-align:text-top;white-space: nowrap; padding-right:10px;">就讀學校（選填）：</td>
                    <td colspan="2"><input tabindex="2" type="text" name="school" class="title">
                      <p style="color:#999;line-height:18px; font-size:13px;">(計算校際排名積分用，非學生免填)</p></td>
                  </tr>
                  <tr>
                    <td style="vertical-align:text-top;white-space: nowrap; padding-right:10px;">暱稱：</td>
                    <td colspan="2">
                    <div class="form_nickname">
                      <input style="width:210px;"  tabindex="3" type="text" name="nick_name" class="nickname" /> 
                      <?php if(0){ ?>
                      <img style="padding-left:10px;" src="<?=base_url("sys_images/btn_tick.png")?>">此暱稱可使用
                      <img style="padding-left:10px;" src="<?=base_url("sys_images/btn_cross.png")?>">此暱稱已存在 
                      <?php } ?>
                      <br>
                      <p style="color:#999;line-height:18px; font-size:13px; padding-bottom:10px; margin-top:5px; width:340px;">
                        (暱稱將會顯示在網站上作為您的名稱，不能與他人重複。)</p> 
                    </div>
                    
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align:text-top;white-space: nowrap; padding-right:10px;">輸入密碼：</td>
                    <td colspan="2"><input tabindex="4" type="password" name="pwd" class="title"></td>
                  </tr>
                  <tr>
                    <td style="vertical-align:text-top;white-space: nowrap; padding-right:10px;">確認密碼：</td>
                    <td colspan="2"><input tabindex="5" type="password" name="pwd2" class="title"></td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <label><input type="checkbox" name="agree" /> 我已閱讀並同意 <a href="<?=site_url("/copyright")?>" target="_blank">隱私與著作權條款</a></label></td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="button" style=" padding:70px 0 50px 130px; ">
              <input tabindex="8" type="submit" class="btn active" value="確認" />&nbsp;&nbsp;&nbsp;
              <a  tabindex="9" href="<?=site_url("member/signin")?>">返回</a>
            </div>
          </div> 
        </form>

      </article>

    </div>
  </div>  <!-- /container -->


<?php include(dirname(__FILE__)."/../_footer.php");?>

<?php function js_section() { ?>
<script>

$("#form1").submit(function(){
  var param = $(this).serialize();
  $.post( window.base_url +"member/signuping", param, res_handle(function(){
    alert("註冊成功，請到信箱收信啟動。");
    self.location.href = window.base_url + "member/signin";
  }));
  return false;
});

</script>

<?php } ?>



