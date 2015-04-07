<?php include(__DIR__."/../_header.php") ?>
  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">資源平台</li>
    </ol>

    <div class="row">
      
      <!-- Article main content -->
      <article class="col-sm-8 about-content">
        <header class="page-header">
          <h1 class="page-title">資源平台</h1>
          <small>本專區將整合並連結國內外的 maker 教學資源，創客們註冊後可發表自己的資料在這。</small>
        </header>
        <div style="min-height:400px;">
          <a href="http://www.thingiverse.com/SpaceCoaster/collections/chess">
            <p>西洋棋</p>
          </a>
          <div class="row">
            <div class="col-xs-6 col-md-6">
              <a class="thumbnail" href="http://www.thingiverse.com/thing:40605">
                <img src="http://thingiverse-production.s3.amazonaws.com/renders/6a/99/68/60/c1/IMAG4281_preview_featured.jpg" />
              </a>
            </div>
            <div class="col-xs-6 col-md-6">
              <a class="thumbnail" href="http://www.thingiverse.com/thing:351119">
                <img src="http://thingiverse-production.s3.amazonaws.com/renders/50/a1/0f/d7/f1/photo_13__preview_featured.jpg" />
              </a>
            </div>
            <div class="col-xs-6 col-md-6">
              <a class="thumbnail" href="http://www.thingiverse.com/thing:20528">
                <img src="http://thingiverse-production.s3.amazonaws.com/renders/10/a5/6a/35/b9/lewis_display_large_preview_featured.jpg" />
              </a>
            </div>
              
          </div>
        </div>
      </article>
      <!-- /Article -->
      

      <?php if(0) { ?>
      <!-- Sidebar -->
      <aside class="col-sm-4 sidebar sidebar-right">

        <div class="widget">
          <h4>相關附件</h4>
          <ul class="list-unstyled list-spaces">
            <li><a href="#">103 年成果</a></li>
            <li><a href="#">104年上半年度巡迴學校</a></li>
            <li><a href="#">104年下半年度巡迴學校</a>。</li>
            <li><a href="#">義工招募</a></li>
          </ul>
        </div>

      </aside>
      <!-- /Sidebar -->
      <?php } ?>

    </div>
  </div>  <!-- /container -->

<?php function js_section(){ ?>
<?php } ?>

<?php include(__DIR__."/../_footer.php") ?>

