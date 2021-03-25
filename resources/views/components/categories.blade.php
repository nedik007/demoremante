<div class="categories">
    <h2>Vyberte si z nabízených kategorií</h2>

    <ul>
        @foreach ($categories as $item)
            <li>
                <a @if(@$category && $category->id == $item->id) class="font-weight-bold" @endif href="{{route('category', ['Category' => $item])}}">{{$item->title}}</a>
            </li>
        @endforeach
    </ul>
</div>
