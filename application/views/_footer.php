

<div class="footer">
  <div class="container">
    <ul data-role="menu" class="menu">
      <li class="menu-item menu-item-active"  data-role="menu-item" >
          <p class="menu-title">台灣創客</p>
      </li>
      <li class="menu-item"  data-role="menu-item">
          <p class="menu-title">創客精神</p>
      </li>
      <li class="menu-item"  data-role="menu-item">
          <p class="menu-title">自造計畫</p>
      </li>
      <li class="menu-item"  data-role="menu-item">
          <p class="menu-title">創客活動</p>
      </li>
      <li class="menu-item" data-role="menu-item">
          <p class="menu-title">我是創客</p>
      </li>
      <li class="arrow-item">
        <div class="arrow">
          <img src="<?=base_url("images/uparrow.png")?>" />
        </div>
      </li>
    </ul>
    <div class="copyright">
      ©<?=date("Y")?> v-Maker.   台灣創客平台
      <br />
      <a href="<?=site_url("/copyright")?>">隱私與著作權條款</a>
    </div>
  </div>
</div>



  <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="<?=base_url("/js/headroom.min.js")?>"></script>
  <script src="<?=base_url("/js/jQuery.headroom.min.js")?>"></script>
  <script src="<?=base_url("/js/template.js")?>"></script>


<!-- end of Footer -->

<script>
window.base_url = <?=json_encode(base_url())?>;

function is_login(cb_ok){
  $.post(window.base_url+"member/is_login",function(res){
    if(res.data){
      cb_ok && cb_ok();
    }else{
      alert("請先登入");
    }
  });
}

function res_handle(cb){
  return function(res){
    if(!res.isSuccess){
      alert(res.errorMessage);
      return false;
    }
    cb && cb(res.data);
  };
}


</script>
<?php 
if(function_exists("js_section")){ 

  js_section();

} ?>

  
<!-- Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60522538-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End of Analytics -->


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=1440160232904222&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</body>
</html>
