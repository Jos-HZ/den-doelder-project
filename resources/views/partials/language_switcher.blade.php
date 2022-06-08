<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
{{--            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>--}}
        @else
{{--            <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">--}}
{{--                <img src="\img\svg\{{ $available_locale }}.svg" >--}}
{{--                <span>{{ $locale_name }}</span>--}}
{{--            </a>--}}

            <a href="/language/{{ $available_locale }}">
                <img src= "\img\svg\{{ $available_locale }}.svg" style="width:42px;height:42px;">
            </a>
        @endif
    @endforeach
</div>
