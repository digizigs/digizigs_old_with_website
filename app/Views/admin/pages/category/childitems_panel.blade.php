<ul class="">
	@foreach($category->child as $category)   
		<li class="">
			<b>{!!$category->name!!}</b>{{$loop->remaining}}
			<span class="count pull-right badge">{{$category->posts->count()}}</span>
			@include('admin.pages.category.childItems_panel')
		</li>		                         
	@endforeach
</ul>
