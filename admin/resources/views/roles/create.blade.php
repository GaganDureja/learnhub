<x-structure title="Create Role">
    @push('page-css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @endpush

    <div class="page-container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom border-dashed d-flex align-items-center">
                        <h4 class="header-title">Add Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="role" name="role"
                                                    placeholder="Instructor">
                                                <label for="role">Role Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <x-form-buttons />
                                </form>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->


    </div> <!-- container -->

</x-structure>
