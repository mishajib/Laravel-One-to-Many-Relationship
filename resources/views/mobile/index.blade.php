@extends('layouts.app')

@section('site-title', 'One to Many RelationShip')


@section('header-title', 'ONE TO MANY RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">View All Numbers</h3>
            <a href="{{ route('mobile.create') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Add New</a>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px; margin-right: 100px;">Back</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numbers</th>
                    <th scope="col">User</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                        @forelse($mobiles as $key=>$mobile)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $mobile->number }}</td>
                                <td>{{ $mobile->user->name }}</td>
                                <td>
                                    <a href="{{ route('mobile.edit', $mobile->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <button onclick="deleteMobile({{ $mobile->id }})" class="btn btn-danger" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $mobile->id }}" action="{{ route('mobile.destroy', $mobile->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('mobile.show', $mobile->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No data found!</td>
                            </tr>
                        @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deleteMobile(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
