{{-- 處理表單 --}}
<form method="post" action="{{ route('deleteSelect') }}">
    {{ csrf_field() }}
    <ul class="list-group mb-0">
        @foreach ($lists as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 rounded-0 mb-2">
            <div class="d-flex align-items-center">
                <label for="id-{{ $item->id }}">
                    <input class="form-check-input me-2"
                        name="id[{{ $item->id }}]"
                        id="id-{{ $item->id }}"
                        type="checkbox"
                        value="{{ $item->id }}" />{{ $item->content }}
                </label>
            </div>
            <a href="/delete/{{ $item->id }}" title="Remove item">
                <i class="icon-remove"></i>
            </a>
        </li>
        @endforeach
    </ul>
    <hr>
    <button type="submit" class="btn btn-danger btn-lg ms-2">Delete Selected</button>
</form>
