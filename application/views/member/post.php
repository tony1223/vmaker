
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
    <div class="row page-content">
  <!-- Left Column -->
      <article class="col-sm-12 about-content">
        <header class="page-header">
          <h1 class="page-title"><?=h($pageTitle)?> </h1>
        </header>


        <ul class="nav nav-tabs">
          <li role="presentation"><a href="<?=site_url("/member/index")?>">關於我</a></li>
          <li role="presentation"  class="active"><a href="<?=site_url("/member/projects")?>">我的自造者專案</a></li>
        </ul>

        <div style="padding-top:30px;" class="col-md-10 panel">
          <form action="<?=site_url("member/post_new")?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="category">計畫說明</label>
              <select name="category">
              <?php foreach($categories as $cat ){ ?>
               <optgroup label="<?=h($cat["name"])?>">
                  <?php foreach($cat["childs"] as $child){ ?>
                    <option value="<?=h($child["key"])?>"><?=h($child["name"])?></option>
                  <?php } ?>
                </optgroup>
              </li>
            <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="title">專案名稱</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="請輸入標題">
            </div>
            <div class="form-group">
              <label for="content">計畫說明</label>
              <textarea class="tinymce" style="height:400px;width:100%;" name="content" id="content"></textarea>
            </div>

            <div class="form-group">
              <label for="intro">計畫背景</label>
              <textarea class="tinymce" style="height:400px;width:100%;" name="intro" id="intro"></textarea>
            </div>
            <div class="form-group">
              <label for="cover">計畫展示照片</label>
              <input type="file" id="cover" name="cover">
              <p class="help-block"></p>
            </div>            
            <div class="form-group">
              <label for="exampleInputFile">更多相關圖片（選填）</label>
              <?php for($ind = 1; $ind < 7; ++$ind){ ?>
              <input type="file" name="files_<?=$ind?>" />
              <?php }?> 
              <p class="help-block"></p>
            </div>
            <div class="form-group">
              <label for="intro">關鍵字（選填）</label>
              <input type="text"  class="form-control" name="tags" value="" placeholder="tag1,tag2,tag3" />
            </div>
            <button type="submit" class="btn btn-default">送出</button>
            <br />
            <br />
            <br />
            <br />
          </form>          
        </div>

      </article>

    </div>
  </div>  <!-- /container -->


<?php include(dirname(__FILE__)."/../_footer.php");?>


<?php function js_section(){ ?>
<script src="<?=base_url("js/tinymce/tinymce.min.js")?>"></script>
<script src="<?=base_url("js/tinymce/jquery.tinymce.min.js")?>"></script>

<script type="text/javascript">
tinymce.init({
    selector: ".tinymce",
    language : 'zh_TW',
    plugins: [
        "nimage advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons | nimage",
    image_advtab: true,
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
 });
</script>

<?php } ?>

