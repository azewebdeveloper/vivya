<div class="sidebar" data-color="purple">
    <div class="logo">
        <a style="text-transform: unset" href="{{route('admin.index')}}" class="simple-text">
            <img style="width: 25px;margin-right: 5px;vertical-align: -14px" src="{{asset('images/logo.png')}}" alt="">  Vavawear.az
        </a>
    </div>
        @php
            $url = url()->current();
            $class = 'active';
        @endphp
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class=" @if($url == 'https://vavawear.az/admin') active @elseif($url == 'https://vavawear.az/admin/create') @else ' ' @endif " >
                <a href="{{route('admin.index')}}">
                    <i class="fas fa-user"></i>
                    <p>Adminlər</p>
                </a>
            </li>
            <li class=" @if(str_contains($url,'admin/editor')) active @else ' ' @endif ">
                <a href="{{route('admin.editor.index')}}">
                    <i class="fas fa-ruler-combined"></i>
                    <p>Ölçülər</p>
                </a>
            </li>
            <li class="@if(str_contains($url,'admin/book')) active @elseif(str_contains($url,'search')) active @else ' ' @endif " >
                <a href="{{route('admin.book.index')}}">
                    <i class="fas fa-tshirt"></i>
                    <p>Məhsullar</p>
                </a>
            </li>
            <li class="@if(str_contains($url,'admin/order')) active @else ' ' @endif " >
                <a href="{{route('admin.order.index')}}">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Sifarişlər</p>
                </a>
            </li>
        </ul>
    </div>
</div>
