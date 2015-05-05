<section class="gallery-widget">
	<ul>
	<% loop $GalleryWidgetImages %>
		<li class="item" id="item$Pos">
			<a id="gallery$ID" href="$Link"><img src="$Image.CroppedImage($Up.ThumbWidthFeature,$Up.ThumbHeightFeature).URL" alt="$Title"  /></a>
		</li>
	<% end_loop %>
	</ul>
</section>