
<?php include(dirname(__FILE__)."/../_header.php") ?>

  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container story-edit">

  <!--
    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">自造者專案 - <?=h($story->title)?></li>
      <li class="active">編輯</li>
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
          <li role="presentation"  class="active"><a href="<?=site_url("/member/projects")?>">My Story</a></li>
        </ul>

        <div style="padding-top:30px;" class="col-md-10 panel">
          <form action="<?=site_url("member/project_update/".$story->storyID)?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="category">計畫說明</label>
              <select name="category">
              <?php foreach($categories as $cat ){ ?>
               <optgroup label="<?=h($cat["name"])?>">
                  <?php foreach($cat["childs"] as $child){ ?>
                    <option value="<?=h($child["key"])?>" 
                        <?=($story->category == $child["key"]) ?"selected":"" ?> ><?=h($child["name"])?></option>
                  <?php } ?>
                </optgroup>
              </li>
            <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="title">專案名稱</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="請輸入標題" value="<?=h($story->title)?>" />
            </div>
            <div class="form-group">
              <label for="content">計畫介紹</label>
              <textarea class="tinymce" style="height:400px;width:100%;" name="content" id="content"><?=h($story->content)?></textarea>
            </div>
            <div class="form-group">
              <label for="intro">計畫內容</label>
              <textarea class="tinymce" style="height:400px;width:100%;" name="intro" id="intro"><?=h($story->intro)?></textarea>
            </div>
            <div class="form-group">
              <label class="story-image-label" for="cover">計畫展示照片</label>
              <?php if($story->cover != null){ ?>
                <div class="thumbnail col-sm-2 clearfix" style="float:none;">
                  <img src="<?=base_url($story->cover)?>" />
                  <label><input type="checkbox" name="del_cover" value="1" />刪除這張照片</label>
                </div>
              <?php } ?>
              <input class="story-image" type="file" id="cover" name="cover">
              <p class="help-block"></p>

            </div>            
            <div class="form-group">
              <label for="exampleInputFile" style="float:left;">相關照片</label>
              <div style="clear:left;"></div>
              <?php foreach($images as $img) { ?>
                <div class="thumbnail col-sm-2 clearfix">
                  <img src="<?=base_url($img->url)?>" />
                  <label><input type="checkbox" name="del_res[]" value="<?=$img->resourceID?>" />刪除這張照片</label>
                </div>
              <?php } ?>
              <div style="clear:left;"></div>
              <?php for($ind = 1; $ind < 7; ++$ind){ ?>
              <input type="file"  name="files_<?=$ind?>" />
              <?php }?> 
              <p class="help-block"></p>
            </div>
            <div class="form-group">
              <label for="intro">關鍵字（選填）</label>
              <input type="text"  class="form-control" name="tags" value="<?=h($story->tags)?>" placeholder="tag1,tag2,tag3" />
            </div>
            <button type="submit" class="btn btn-default">送出</button>
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

