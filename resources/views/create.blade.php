{{-- 處理表單 --}}
<form class="d-flex justify-content-center align-items-center mb-4" method="post" action="{{ route('store') }}">
    {{ csrf_field() }}
    <div class="form-outline flex-fill">
        <input type="text" name="content" class="form-control form-control-lg" />
        {{-- <label class="form-label" for="content">What do you need to do today?</label> --}}
    </div>&nbsp;
    <button type="submit" class="btn btn-primary btn-lg ms-2">Add</button>
</form>
