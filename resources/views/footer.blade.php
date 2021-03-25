<div class="foot" >
    <div class="foot__in" >

        <div class="foot__developer" >
            <a href="{{route('admin.home')}}">Administrace</a> |||
            @if(session('login'))
                <a href="{{route('logout')}}">Odhlasit se</a>
            @endif
            <p >Toto je jen DEMO. Není to funkční eshop.</p >
        </div >
    </div >

    <div class="clearfix" ></div >

</div >
