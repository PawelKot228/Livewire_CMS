<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
    data-accordion="false">
    @foreach($nav_items as $nav_item)
        @php
            $has_submenu = isset($nav_item['submenu']);
            $url = isset($nav_item['route']) ? route($nav_item['route']) : '';
        @endphp
        <li class="nav-item">
            <a href="{{$url}}" class="nav-link">
                <i class="nav-icon {{$nav_item['icon'] ?? ''}}"></i>
                <p>
                    {{__($nav_item['label'])}}
                    @if($has_submenu)
                        <i class="right fas fa-angle-left"></i>
                    @endif
                </p>
            </a>
            @if($has_submenu)
                <ul class="nav nav-treeview">
                    @foreach($nav_item['submenu'] as $submenu_item)
                        @php
                            $url = isset($submenu_item['route']) ? route($submenu_item['route']) : '';
                        @endphp
                        <li class="nav-item">
                            <a href="{{$url}}" class="nav-link">
                                    <i class="nav-icon {{$submenu_item['icon'] ?? ''}}"></i>
                                <p>{{__($submenu_item['label'])}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
