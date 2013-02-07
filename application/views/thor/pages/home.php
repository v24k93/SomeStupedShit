<!-- SLIDER START-->
	
		<div id="slider">
			<img src="{base_url}application/views/thor/img/slider/slide1.jpg" class="slider_img" style="display: block;" id="slide_1" width="532" height="199" alt="slider-image-1"/>
			<img src="{base_url}application/views/thor/img/slider/slider_img_2.jpg" class="slider_img" id="slide_2" width="532" height="199" alt="slider-image-2"/>
			<img src="{base_url}application/views/thor/img/slider/slider_img_3.jpg" class="slider_img" id="slide_3" width="532" height="199" alt="slider-image-3"/>
			<img src="{base_url}application/views/thor/img/slider/slider_img_4.jpg" class="slider_img" id="slide_4" width="532" height="199" alt="slider-image-4"/>
			<img src="{base_url}application/views/thor/img/slider/slider_img_5.jpg" class="slider_img" id="slide_5" width="532" height="199" alt="slider-image-5"/>
		</div>
		
	<script type="text/javascript">
	$(function(){
		var count = $("#slider img").length, i = 1;
		
		$('#slide_' + i).css("display","block");
					
		setInterval(function(){
			var old_slide = $('#slide_' + i);
			if(i >= count)
				i = 0;
			var new_slide = $('#slide_' + (i + 1));
			old_slide.fadeOut(300);
			setTimeout(function(){
				old_slide.css("display","none");
				new_slide.css("display","block");
				new_slide.fadeIn(300);
				i++;
			}, 300);
		}, 3000);
	});
	</script>
	<!-- SLIDER END -->
<div class="main-box">
	<div class="main-box-header">
		<div class="main-box-title">
			{lang_vote_sites}
		</div>
	</div>
	<div class="main-box-bg">
		{vote_pages}
	</div>
</div>
{news}
<div class="main-box">
	<div class="main-box-header">
		<div class="main-box-title">
			{news_title} | Written By {news_poster}, {news_date}
		</div>
	</div>
	<div class="main-box-bg">
		<div class="main-box-text">
			<img src="{base_url}content/img/avatars/default-0.jpg" class="news-avatar" alt="News Avatar" />{news_content}<div class="clear"></div>
		</div>
	</div>
</div>
{/news}