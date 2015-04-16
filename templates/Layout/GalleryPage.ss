<div class="gallery">
    <article>
		<h1>$MainTitle</h1>
		<% if $SectionTitle %>
			<h2 class="section-title">$SectionTitle</h2>
		<% end_if %>
		<% include GalleryMenu %>
		<% include Gallery %>
		<% include GalleryPagination %>
        <div class="content">$Content</div>
    </article>
    $Form
    $PageComments
</div>