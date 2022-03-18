<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
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


                    <form class="col-md-4" method="POST" action="{{ route('employee.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input type="file" name="image"
                                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400">
                            <div>Only jpg,png,bmp accepted.</div>
                        </div>


                        <div class=" form-group ">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword">About</label>
                            <textarea name="about" id="" cols="40" rows="10"></textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputRole">Permission</label>
                            <select name="permission" class="form-control" id="exampleFormControlSelect1">

                                <option value="Edit Post">Edit Post</option>
                                <option value="Write Post">Write Post</option>
                                <option value="Edit & Write">Edit & Write</option>


                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputRole">Role</label>
                            <select name="roles_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDepartment">Department</label>
                            <select name="department_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
