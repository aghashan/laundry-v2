<form action="{{ $slot }}" method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm btn-outline-dark font-weight-bold mb-1">
        Delete
    </button>
</form>
