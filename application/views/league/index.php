<?php include(__DIR__."/../_header.php") ?>
  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">VMakers</li>
    </ol>

    <div class="row page-content">
      
      <!-- Article main content -->
      <article class="col-sm-12 about-content">
        <h2 class="thin"> 英雄擂臺 </h2>
        <div class="stories">
        <?php 
        $stories = Array(
          Array(
            "storyID" => 1,
            "cover" => "http://placekitten.com/350/300",
            "title" => "張忠謀",
            "createDate" => time()
          ),
          Array("cover" => "http://placekitten.com/350/299?t=2",
            "title" => "郭台銘",
            "storyID" => 2,
            "createDate" => time()
          ),
          Array("cover" => "http://placekitten.com/350/301?t=3",
            "title" => "嚴凱泰",
            "storyID" => 3,
            "createDate" => time()
          )
        );
        ?>

          <?php foreach($stories as $story){ 
            $story = new FormObject($story);
            ?>
            <div class="col-sm-4">  
              <a href="<?=site_url("story/view/".$story->storyID)?>">
                <div class="thumbnail">        
                  <img src="<?=($story->cover)?>" />
                  <div class="caption"><?=h($story->title)?></div>
                  <div class="caption"><?=_date_format($story->createDate)?></div>
                </div>
              </a>
            </div>        
          <?php } ?>

        </div>
      </article>
      <!-- /Article -->
      
    </div>
  </div>  <!-- /container -->

<?php function js_section(){ ?>
<?php } ?>

<?php include(__DIR__."/../_footer.php") ?>

