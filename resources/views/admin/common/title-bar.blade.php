<div class="admin-title-container">
    @if(isset($back_link))
        <div class="admin-title-back-link">
            <a href="{{ route($back_link, $back_link_parameters ?? null) }}" class="bock">{{ $back_link_title }}</a>
        </div>
    @endif
    <div class="flex space-between">
        <div class="flex">
            <div class="admin-title semi-bold {{ $theme_color ?? '' }}">{{ $title }}</div>
            @if(isset($title_options) && !empty($title_options))
                <div class="admin-title-tree-dots relative pointer">
                    <div class="admin-title-menu absolute hide">
                        @foreach($title_options as $title_option)
                            <a href="{{ route($title_option['route'], $title_option['route_parameters']) }}" class="block">{{ $title_option['title'] }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
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
                @if (isset($action_buttons))
                    @foreach($action_buttons as $actionButton)
                            <a href="{{ $actionButton['route'] }}" class="admin-new-item action-item-button uppercase flex v-align-center bold">{{ $actionButton['title'] }}</a>
                    @endforeach
                @endif
                @if(isset($new_route))
                    <a href="{{ route($new_route, $new_route_params ?? []) }}" class="admin-new-item uppercase flex v-align-center bold">{{ $new_title }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
