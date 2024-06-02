@extends('admin.master')

@section('body')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Assign Role to {{ ucfirst($role->name) }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="card-header">
                            {{ ucfirst($role->name) }}
                        </div>

                        <form action="{{ route('role.permission',$role->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="all_permission">
                                    <label class="form-check-label" for="">
                                        All Permission
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input name="permission[]" @if (in_array($permission->id, $role_permission)) checked
                                        @endif class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                            id="id">
                                        <label class="form-check-label" for="id">
                                            {{ ucfirst($permission->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" style="float:right" class="btn btn-primary mt-3">Assign Permission</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#all_permission').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>
@endpush
