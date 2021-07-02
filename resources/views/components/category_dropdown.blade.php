@props(['categories' => [['slug' => 'Haider', 'name' => 'bhai', 'id' => 1]]])
<x-dropdown data-js="
value => {
    location = '/?categories' + value;
}
">
@foreach ($categories as $category)
    <li><a href="?category={{ $category->slug }}">{{ $category->name }}</a></li>
@endforeach
</x-dropdown>
