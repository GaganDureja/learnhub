<x-structure title="Create Role">

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
                                    @include('roles.form')
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
