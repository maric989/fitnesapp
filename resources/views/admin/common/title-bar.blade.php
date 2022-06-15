<div class="admin-title-container">
    @if(isset($back_link))
        <div class="admin-title-back-link">
            <a href="{{ route($back_link) }}" class="bock">{{ $back_link_title }}</a>
        </div>
    @endif
    <div class="flex space-between">
        <div class="admin-title semi-bold">{{ $title }}</div>
        <div>
            <div class="flex">
                @if(isset($view_route))
                    <div class="admin-view-selector-container">
                        <div class="admin-view-selector flex">
                            <a href="{{ route($view_route, ['view_mode' => 'list']) }}" class="admin-view-selector-item-container relative @if($view == 'list') active @endif">
                                <div class="admin-view-selector-item admin-view-selector-list absolute"></div>
                                <div class="admin-view-selector-item admin-view-selector-list active-list absolute"></div>
                            </a>
                            <a href="{{ route($view_route, ['view_mode' => 'card']) }}" class="admin-view-selector-item-container relative @if($view == 'card') active @endif">
                                <div class="admin-view-selector-item admin-view-selector-card absolute"></div>
                                <div class="admin-view-selector-item admin-view-selector-card active-card absolute"></div>
                            </a>
                        </div>
                    </div>
                @endif
                @if(isset($new_route))
                    <a href="{{ route($new_route) }}" class="admin-new-item uppercase flex v-align-center bold">+ New program</a>
                @endif
            </div>
        </div>
    </div>
</div>