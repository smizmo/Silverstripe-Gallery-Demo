<menu id="gallery-menu">
	<h2><%t Gallery.MenuTitle "Gallery Categories"%></h2>
	<ul class="gallery-menu">
	<% loop $ChildrenOf($getHolderId()) %>
		<li class="$LinkingMode">
			<a href="$Link" title="$Title.XML">
				<img src="$GalleryImages.First.Image.CroppedImage($Up.MenuWidth,$Up.MenuHeight).URL" alt="$Title"  />
				<span class="valign">$MenuTitle.XML</span>
			</a>
		</li>
	<% end_loop %>
	</ul>
</menu>