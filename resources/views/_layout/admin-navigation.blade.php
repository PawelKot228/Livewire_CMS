<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
    data-accordion="false">
    @foreach($nav_items as $nav_item)
        @php
            $has_submenu = isset($nav_item['submenu']);
        @endphp
        <li class="nav-item">
            <a href="{{$nav_item['route']}}" class="nav-link">
                <i class="nav-icon {{$nav_item['icon'] ?? ''}}"></i>
                <p>
                    {{$nav_item['label']}}
                    @if($has_submenu)
                        <i class="right fas fa-angle-left"></i>
                    @endif
                </p>
            </a>
            @if($has_submenu)
                <ul class="nav nav-treeview">
                    @foreach($nav_item['submenu'] as $submenu_item)
                        <li class="nav-item">
                            <a href="{{$submenu_item['route']}}" class="nav-link">
                                    <i class="nav-icon {{$submenu_item['icon'] ?? ''}}"></i>
                                <p>{{$submenu_item['label']}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
