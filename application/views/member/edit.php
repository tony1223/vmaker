

<?php include(dirname(__FILE__)."/../_header.php") ?>

  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">
  <!--
    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">創客會員</li>
      <li class="active">編輯資料</li>
    </ol>
  -->

    <div class="row">
  <!-- Left Column -->
      <article class="col-sm-12 about-content">
        <header class="page-header">
          <h1 class="page-title"><?=h($pageTitle)?></h1>
        </header>

        <div class="panel" style="padding:30px;">

          <form action="<?=site_url("member/info_editing")?>" method="POST">
            <div class="member_data" style="padding-bottom:20px;">
              <div class="title">個人簡介：</div>
              <textarea name="intro" style="width: 100%; height: 100px; font-size: 15px; font-family: Helvetica, Arial, 'LiHei Pro', 'Microsoft JhengHei', 微軟正黑體, 新細明體, sans-serif; line-height: 25px; letter-spacing: 0.5px; margin-left: -10px; padding: 10px; background-image: none; background-position: 0% 0%; background-repeat: repeat;"><?=h($mem->mem_desc)?></textarea>
            </div>
            <div class="form_profile_edit" style="width:420px; float:left;">
              <div class="titlea">
                               聯絡資訊：
              </div>
              <div class="titlea">
                <div style="padding-left:00px;  font-size:13px; color:#aeaeae; letter-spacing:0.5px; line-height:20px; width:450px; ">
                Email可勾選是否同意公開，其他社群資訊填寫即為同意公開，社群資訊會公開於創客頁。
                </div>
              </div>
                   <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td style="vertical-align:text-top;white-space: nowrap; padding-right:20px;"><div class="email">Email：</div></td>
                        <td colspan="2" ><span style=" color:#4591b8; line-height:26px;"><?=$mem->email?></span>
                        <label><br>
                          是否同意公開社群聯絡方式：</label>
                          <Br />
                          <label>
                            <input type="radio"  <?=($mem->publish=="1" ?"checked":"")?> name="publish" value="1" />
                            是
                          </label>
                          <label>
                            <input <?=(($mem->publish=="0" || $mem->publish =="") ?"checked":"")?> style=" margin-left:20px;" type="radio" name="publish" value="0" />
                            否
                          </label>
                            
                        </td>
                      </tr>
                      <tr>
                        <td class="member-info-field "><div class="web">個人網站：</div></td>
                        <td colspan="2">
                          <input type="text" name="url" class="title" 
                            value="<?=h($mem->url)?>" />
                          </td>
                      </tr>
                      <tr>
                        <td class="member-info-field "><div class="twitter">Twitter：</div></td>
                        <td colspan="2">
                          <input type="text" name="twitter" class="title" 
                            placeholder="請輸入 twitter 網址" 
                            value="<?=h($mem->twitter)?>"></td>
                      </tr>
                      <tr>
                        <td  class="member-info-field "><div class="facebook">Facebook</div></td>
                        <td colspan="2"><input type="text" name="facebook" class="title" placeholder="請輸入 facebook 網址" 
                        value="<?=h($mem->facebook)?>"></td>
                      </tr>
                      <tr>
                        <td  class="member-info-field "><div class="google">Google+</div></td>
                        <td colspan="2">
                          <input type="text" name="gplus" class="title" 
                          value="<?=h($mem->gplus)?>"
                          placeholder="請輸入 Google+ 網址" ></td>
                      </tr>
                        <tr><td style="vertical-align:text-top;"><label>公開 email：</label></td>
                        <td style="width:250px;">

                          <label>
                            <input type="radio" <?=($mem->is_epaper=="1" ?"checked":"")?> name="epaper" value="1">
                            是
                          </label>
                          <label>
                            <input <?=($mem->is_epaper=="0" ?"checked":"")?> style=" margin-left:50px;" type="radio" name="epaper" value="0">
                            否
                          </label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="form_profile_edit" style="margin-top:60px;width:420px; float:right; margin-right:10px;">
                   <table  class="table table-bordered"  width="420px" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td class="member-info-field ">暱稱：</td>
                        <td colspan="2"><?=h($mem->nick_name)?></td>
                      </tr>
                     <tr>
                        <td class="member-info-field ">更改密碼：</td>
                        <td colspan="2"><span style="font-weight:normal;">輸入舊密碼</span>
                          <input style="width:210px; float:right;" type="password" name="old_pwd" class="title" />
                          <br />

                        </td>
                      </tr>
                     <tr>
                        <td class="member-info-field "></td>
                        <td colspan="2"><span style="font-weight:normal;">輸入新密碼</span>                                      
                          <input style="width:210px; float:right;" type="password" name="pwd" class="title"></td>
                     </tr>
                     <tr>
                        <td  class="member-info-field "></td>
                        <td colspan="2"><span style="font-weight:normal;">確認新密碼</span>                                      
                          <input style="width:210px; float:right;" type="password" name="pwd2" class="title"></td>
                     </tr>
                    </tbody>
                </table>
              </div>                          
              <div style="clear:both;"></div>
                 
            <div class="button" style=" padding-left:390px; padding-top:100px;">
              <button class="btn active">確認</button>&nbsp;&nbsp;&nbsp;
              <a href="<?=site_url("member/")?>">返回</a>
            </div>
          </form>
        </div>

      </article>

    </div>
  </div>  <!-- /container -->


<?php include(dirname(__FILE__)."/../_footer.php");?>

<?php function js_section() { ?>


<?php } ?>

