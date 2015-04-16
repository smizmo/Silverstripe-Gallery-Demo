<% if $PaginatedGalleryImages.MoreThanOnePage %>
	<div id="GalleryPagination">
		<ul class="pagination">
		<% if $PaginatedGalleryImages.NotFirstPage %>
			<li class="page-prev"><a href="$PaginatedGalleryImages.PrevLink"><%t Gallery.Prev "Prev"%></a></li>
		<% end_if %>
		<% loop $PaginatedGalleryImages.Pages %>
			<% if $CurrentBool %>
				<li class="active"><a href="$Link">$PageNum</a></li>
			<% else %>
				<% if $Link %>
					<li><a href="$Link">$PageNum</a></li>
				<% else %>
					...
				<% end_if %>
			<% end_if %>
        <% end_loop %>
		<% if $PaginatedGalleryImages.NotLastPage %>
			<li class="page-next"><a class="next" href="$PaginatedGalleryImages.NextLink"><%t Gallery.Next "Next"%></a></li>
		<% end_if %>
		</ul>
	</div>
<% end_if %>