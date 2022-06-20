<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
        @else
            <a href="/language/{{ $available_locale }}" >
                <img src="\img\svg\{{ $available_locale }}.svg" style="width:42px;height:42px;">
            </a>
        @endif
    @endforeach
</div>
