<ul class="list-group mb-0">
    @foreach ($lists as $item)
    <li class="list-group-item d-flex justify-content-between align-items-center border-0 rounded-0 mb-2">
        <div class="d-flex align-items-center">
            <input class="form-check-input me-2" type="checkbox" value="{{ $item->id }}" />
            {{ $item->content }}
        </div>
        <a href="/delete/{{ $item->id }}" title="Remove item">
            <i class="icon-remove"></i>
        </a>
    </li>
    @endforeach
</ul>
