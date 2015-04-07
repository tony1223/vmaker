
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
    <div class="row page-content">
  <!-- Left Column -->
      <article class="col-sm-4 col-sm-offset-1 about-content">
        <header class="page-header">
          <h1 class="page-title">創客登入</h1>
        </header>

       <?php if(0) { ?>
       <h3>使用社群帳號登入</h3>
        <div class="sns_login_box2">
        <div class="button_sns">
        <a href="#">
          <img src="<?=base_url("sys_images/button_sns_fb.png")?>" style="vertical-align:middle; padding-right:3px;">Facebook</a>
        <a class="twitter" href="#">
          <img src="<?=base_url("sys_images/button_sns_twi.png")?>" style="vertical-align:middle; padding-right:5px;">twitter</a>
        <a class="google" href="#">
          <img src="<?=base_url("sys_images/button_sns_g.png")?>" style="vertical-align:middle; padding-right:5px;">Google+</a>
        </div>
        </div>
    <?php } ?>
        
        
        <div class="form_post">
          <form id="form" method="post">
             <table width="300px" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td style="vertical-align:text-top;white-space: nowrap; padding-right:20px;">Email：</td>
                  <td colspan="2"><input type="text" name="user" class="title user-input user"></td>
                </tr>
                <tr>
                  <td style="vertical-align:text-top;white-space: nowrap; padding-right:20px;">密碼：</td>
                  <td colspan="2"><input type="password" name="pwd" class="title user-input pwd">
                  <br>
                  <a class=" forget-pwd" href="javascript:void 0;">忘記密碼</a></td>
                </tr>
                </tbody>
              </table>
          </form>
        </div>
        <div>
          <br />
          <a href="" class="login btn btn-primary">登入</a>&nbsp;&nbsp;&nbsp;
          <a class="btn btn-default" href="<?=site_url("member/signup")?>">登錄為新創客</a>
        </div>
      </article>
      <aside class="col-sm-6 sidebar sidebar-right">
        <h2 class="ptitle"> 登錄創客</h2>
        <div>
          <p>任何對 maker 有在參與的人/組織都能登錄為創客！ </p>
          <p>
            在這裡提供一個完整的空間讓 maker 們能紀錄自己的 maker 專案。
          </p>
        </div>

      </aside>

    </div>
  </div>  <!-- /container -->

  <div class="lightbox lightbox-forget-pwd" style="display:none;"> 
    <div class="close">
     <a href="javascript:void 0;"><img class="btn-close" src="<?=base_url("images/btn_closed.png")?>"></a>
    </div>
      <div class="lightbox_note">
          忘記密碼
          <p>請輸入所登記的電子郵件地址後按送出，我們將會寄送連結到您的電子郵件信箱、讓您可以重新建立一組新的密碼。<br><br>在此之前請先確認您已經有台灣創客會員資格。</p><br><br>
          <div class="form_email">
              <form action="" _lpchecked="1">
              <label>輸入Email： </label><input type="text" name="useremail" class="forget_email" style="background-image: none; background-position: 0% 0%; background-repeat: repeat;">
              <br><br><br><br><br>
              <div class="button" style="width:280px;">
                <div class="button1 btn-forget">
                  <a href="javascript:void 0;">送出</a>
                </div>
                <div class="button2 btn-close"><a href="#">返回</a></div>
              </div>
              </form>
          </div>
          <p>&nbsp;</p>
      </div>
  </div>
  <div class="lightbox lightbox-forget-pwd-success" style="display:none;"> 
    <div class="close">
     <a href="javascript:void 0;"><img class="btn-close" src="<?=base_url("sys_images/btn_closed.png")?>"></a>
    </div>
      <div class="lightbox_note">
          忘記密碼
          <p>請至您的信箱收信完成後續動作。</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </div>
  </div>

<?php include(dirname(__FILE__)."/../_footer.php");?>

<?php function js_section() { ?>

<script src="<?=base_url("js/jquery.blockUI.js")?>" ></script>
<script>
var fn = function(){
  var user = $(".user").val();
  var pwd = $(".pwd").val();

  $.post(window.base_url+"/member/signing",{user:user,pwd:pwd},function(response){
    if(!response.isSuccess ){
      alert(response.errorMessage);
      return true;
    }

    if(response.isSuccess){
      self.location.href = window.base_url +"/member/";
      
    }
  });
  return false;
};
$(".user-input").keydown(function(e){
  if(e.keyCode == 13){
    return fn();
  }  
  return true;
});
$("#form").submit(fn);
$(".login").click(fn);

//forget

$('.forget-pwd').click(function() { 
    $.blockUI({ 
        message: $('.lightbox-forget-pwd'), 
        css: { 
            width:"50%",
            padding: '5px', 
            left:"25%",
            top:"10%",
            backgroundColor: '#fff', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px'
        } 
    }); 
    $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI); 
}); 

$(".lightbox .btn-close").click($.unblockUI);
$(".btn-forget").click(function(){
  $.post(window.base_url+"member/forget",{email:$(".forget_email").val()},res_handle(function(data){
    $.unblockUI();
    $.blockUI({
        message: $('.lightbox-forget-pwd-success'), 
        css: { 
            width:"60%",
            padding: '5px', 
            left:"20%",
            top:"10%",
            backgroundColor: '#fff', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px'
        } 
    });
    $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI); 
  }));
});

</script>

<?php } ?>

</body>
</html>


