<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
@props(['title' => 'Category'])
<div class="relative flex lg:inline-flex items-center dropdown bg-gray-100 rounded-xl">
    <button class="dropdown-btn lg-inline-flex flex" style="width: 100%;">
        <span class="left-10">{{ $title }}</span>
        <svg
            class="transform pointer-events-none"
            style="--tw-rotate: 270deg;"
            width="22"
            height="22"
            viewBox="0 0 22 22">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222"
                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
            </g>
        </svg>
    </button>
    <ul class="dropdown-list bg-gray-100 rounded-xl">
        {{ $slot }}
    </ul>
</div>
