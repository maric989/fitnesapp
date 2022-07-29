<div class="admin-header-bar">
    <div class="flex space-between">
        <div class="admin-search-bar">
            <form action="{{ $action ?? '' }}" method="GET">
                <input class="admin-search-input {{ $theme_color ?? '' }}" placeholder="{{ $placeholder }}" name="s" />
            </form>
        </div>
        <div class="admin-header-right flex v-align-center">
            <div><img src="@if(isset($theme_color)){{ asset('/images/admin-notification-' . $theme_color . '.png') }}@else{{ asset('/images/admin-notification.png') }}@endif" class="block" alt="Notification" /></div>
            <div class="admin-avatar"><img src="{{ asset('/images/admin-avatar.png') }}" class="block" alt="Avatar" /></div>
        </div>
    </div>
</div>
