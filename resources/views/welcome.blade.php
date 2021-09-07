<x-app>
    <div class="container">
        <div class="row justify-content-center">
            @if ($images)                
            @foreach ($images as $image)
                <div class="col-lg-5 col-md-6 p-2">
                    <div class="card position-relative mt-2"
                        style="background-image: url('{{ asset('uploads/' . $image->image) }}')">
                        <div class="detials p-2">
                            <span class="font-weight-bold">{{ $image->title }}</span>
                            <span class="font-weight-bold">Created By {{ $image->user->name }}</span>
                            <span class="font-weight-bold">{{ $image->created_at }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
             <span class="text-center p-3">Empty</span>
            @endif
        </div>
    </div>

    @guest
        <x-register></x-register>
        <x-login></x-login>
    @endguest
</x-app>
