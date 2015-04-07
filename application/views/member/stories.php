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
          <li role="presentation"><a href="<?=site_url("/member/index")?>">關於我</a></li>
          <li role="presentation"  class="active"><a href="<?=site_url("/member/projects")?>">我的自造者專案</a></li>
        </ul>

        <div class="panel" style="padding: 30px;">
          <br />
          <table class="table table-bordered " style="width:80%;">
              <tr>
                <td>#</td>
                <td>標題</td>
                <td>發表時間</td>
                <td>最後更新時間</td>
                <td>編輯</td>
              </tr>
              <?php if(count($articles) == 0){ ?>
              <tr>
                <td colspan="5" class="text-center" style="height:100px;padding-top:40px;">
                  <a href="<?=site_url("/member/post")?>">目前還沒有，現在新增一個專案？</a>
                </td>
              </tr>
              <?php } ?>
              <?php foreach($articles as $article){ ?>
              <tr>
                <td><?=h($article->storyID)?></td>
                <td><?=h($article->title)?></td>
                <td><?=_date_format($article->createDate)?></td>
                <td><?=_date_format($article->modifyDate)?></td>
                <td>
                  <a href="<?=site_url("/member/project_edit/".$article->storyID)?>">編輯</a>
                  <a href="<?=site_url("/project/view/".$article->storyID)?>">檢視</a>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <a style="color:red;" href="<?=site_url("/member/project_del/".$article->storyID)?>">刪除</a>
                </td>
              </tr>
              <?php } ?> 
          </table>
          <Br />
          <a class="btn btn-default" href="<?=site_url("member/post")?>">建立新專案</a>          
        </div>

      </article>

    </div>
  </div>  <!-- /container -->


<?php include(dirname(__FILE__)."/../_footer.php");?>

<?php function js_section() { ?>


<?php } ?>

