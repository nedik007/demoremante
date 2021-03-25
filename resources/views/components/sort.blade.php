@php
if (!isset($params)) $params = [];
$getRoute = function($nextParams) use($routeName, $params) {
    $params = array_merge($params, $nextParams);
    return route($routeName, $params);
}

@endphp

<div class="sort">
    <ul>
        <li>
            <a @if($orderBy == 'title' && $orderByDesc == 'asc') class="selected" @endif href="{{$getRoute(['orderBy' => 'title', 'orderByDesc' => 'asc'])}}">Dle názvu a-z</a>
        </li>
        <li><a @if($orderBy == 'title' && $orderByDesc == 'desc') class="selected" @endif href="{{$getRoute(['orderBy' => 'title', 'orderByDesc' => 'desc'])}}">Dle názvu z-a</a></li>
        <li><a @if($orderBy == 'price' && $orderByDesc == 'asc') class="selected" @endif href="{{$getRoute(['orderBy' => 'price', 'orderByDesc' => 'asc'])}}">Dle ceny 0-100</a></li>
        <li><a @if($orderBy == 'price' && $orderByDesc == 'desc') class="selected" @endif href="{{$getRoute(['orderBy' => 'price', 'orderByDesc' => 'desc'])}}">Dle ceny 1000-0</a></li>
    </ul>
</div>
