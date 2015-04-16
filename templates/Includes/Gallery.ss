<div class="gallery-holder">
	<div class="featured-image-holder">
		<div id="featuredImage">
				<img src="$PaginatedGalleryImages.First.Image.CroppedImage($FeaturedWidth,$FeaturedHeight).AbsoluteURL" alt="$Title" />	
		</div>
		<div id="gallery-controls">
			<ul>
				<li class="prev"><a id="prev" href="#" title="<%t Gallery.Prev "Prev"%>"></a></li>
				<li class="next"><a id="next" href="#" title="<%t Gallery.Next "Next"%>"></a></li>
				<li class="full"><a id="featuredImageAnchor" href="$PaginatedGalleryImages.First.Image.SetWidth($FullWidth).AbsoluteURL">Full</a></li>
			</ul>
		</div>
	</div>
	<ul id="thumbs">
	<% loop $PaginatedGalleryImages %>
		<li class="item" id="item$Pos">
			<a <% if $Pos == 1 %>class="current" <% end_if %>id="gallery$ID" href="$Image.CroppedImage($Up.FeaturedWidth,$Up.FeaturedHeight).AbsoluteURL" data-rel="$Image.SetWidth($Up.FullWidth).AbsoluteURL"><img src="$Image.CroppedImage($Up.ThumbWidth,$Up.ThumbHeight).URL" alt="$Title"  /></a>
		</li>
	<% end_loop %>
	</ul>
</div>