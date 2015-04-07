<?php 
	function render_tags($tags){
		$tags = explode(",",$tags);

		foreach($tags as $tag){ 
		?>
		<div class="tag">
		<?=h($tag)?>
		</div>
		<?php 
		} 
	}

?>