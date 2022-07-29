<div class="admin-filter-bar">
    <div class="admin-filter-bar-content">
        <form action="{{ $action }}" method="GET">
            <div class="flex">
                <div class="flex admin-filter-options-container">
                    @foreach($filters as $filter)
                        <div class="admin-filter-option flex v-align-center">
                            <select name="{{ $filter['name'] }}">
                                <option value="">{{ $filter['title'] }}</option>
                                @foreach($filter['options'] as $option)
                                    <option value="{{ $option['id'] }}" @if($filter['selected'] == $option['id']) selected @endif>{{ $option['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
                <div class="admin-filter-button flex v-align-center">
                    <input type="submit" value="View results" class="button uppercase" />
                </div>
            </div>
        </form>
    </div>
</div>
