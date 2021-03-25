<div class="afterHead">
    <div>
        <a href="{{route('homepage.index')}}"><img class="logo" src="{{asset('images/logo.svg')}}"/></a>
    </div>
    <form class="search" action="{{route('fulltext')}}">
        <input type="text" name="q" value="{{@$q}}"/>
        <input type="submit" value="Hledej" class="btn btn-info"/>
    </form>


</div>

<hr class="hr"/>
