<div class="flex flex-col gap-12">
    @foreach($categories as $category)
        {{--
           Check if the category is active and has associated data
           using the Model Accessor we created earlier.
        --}}
        @if($category->is_active && $category->has_data)
            <div class="portfolio-section" data-identifier="{{ $category->identifier }}">
                {{--
                   Dynamic component mapping:
                   Identifier 'works' calls component 'categories.work'
                   Identifier 'educations' calls component 'categories.education'
                --}}
                @php
                    $componentName = 'categories.' . Str::singular($category->identifier);
                    // Pass the specific data collection to the component
                    $$categoryData = ${$category->identifier};
                @endphp

                <x-dynamic-component :component="$componentName" :data="$categoryData" />
            </div>
        @endif
    @endforeach
</div>
