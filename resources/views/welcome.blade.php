@extends('layouts.app')

@section('site-title', 'One to Many RelationShip')


@section('header-title', 'ONE TO MANY RELATIONSHIP')


@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">View All Data</h3>
            <a href="{{ route('user.create') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Add New</a>
            <a href="{{ route('mobile.index') }}" class="btn btn-primary float-right" style="margin-top: -40px; margin-right: 100px;">Mobile</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                    @forelse($users as $key=>$user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @forelse($user->mobiles as $number)
                                    <ul>
                                        <li style="list-style: none;">{{ $number->number }}</li>
                                    </ul>
                                @empty
                                    NO data found
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button onclick="deleteUser({{ $user->id }})" class="btn btn-danger" type="button">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="3">No Data Found!</td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deleteUser(id) {
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
