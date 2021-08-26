<x-app>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 my-4">
                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group  ">
                        <input class="form-control @error('title')  border border-danger @enderror" type="text"
                            name="title" placeholder="Enter Title" value="{{ old('title') }}">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image"
                            class="form-control @error('image')  border border-danger @enderror">
                    </div>

                    <button class="btn btn-primary">Uplaod</button>

                </form>
            </div>
        </div>
    </div>

</x-app>
