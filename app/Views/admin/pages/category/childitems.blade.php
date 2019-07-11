<ul>
	@foreach($category->child as $category)
		<li>
			{!!$category->name!!}
			@include('admin.pages.category.childItems')
		</li>
	@endforeach
</ul>