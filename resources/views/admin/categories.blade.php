@extends('admin.layout')

@section('body')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Products</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <p>Add lightweight datatables to your project with using the <a
                                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                            wish to conver to a datatable</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($cat_data as $categories) --}}

                                <tr>
                                    <th scope="row">{{ $categories->id }}</th>
                                    <td>{{ $categories->category }}</td>
                                    <td><span class="badge badge-pill badge-danger">Status</span></td>
                                    <td><button type="button" class="btn btn-danger"><i class='bi bi-trash'></i></button></td>
                                    <td><button type="button" class="btn btn-danger"><i class='bi bi-trash'></i></button></td>
                                </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <a href="{{ url('/admin/add_product') }}"><button type="button" class="btn btn-success"><i class="bi bi-plus">Add Product</i></button></a>
</main><!-- End #main -->

@stop
