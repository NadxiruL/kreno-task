<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <h6 class="alert alert-danger"> Please insert you input </h6>
                    @endif

                    @if (session('success'))
                        <h6 class="alert alert-success"> {{ session('success') }} </h6>
                    @endif

                    <a href="{{ route('department.create') }}"><button class="btn btn-primary">Add Department
                        </button></a>
                    <table class="table mt-3">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>{{ $department->name }}</td>

                                    <td>
                                        <img class="card-img-top" style="width:30px"
                                            src=" {{ asset('images/' . $department->image_path) }}"
                                            alt="Card image cap">
                                    </td>
                                    <td>
                                        {{ $department->description }}
                                    </td>
                                    <td>
                                        <form action="{{ route('department.destroy', $department->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('are you sure you want to delete {{ $department->name }}? ') ">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger">Delete</button>
                                        </form>

                                        <a href="{{ route('department.edit', $department->id) }}"
                                            class="btn btn-secondary">Edit</a>


                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
