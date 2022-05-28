@push('js')
    <script>
        $(() => {
            @foreach(Session::get('success') ?? [] as $key => $message)
                toastr["success"]("{!! $message !!}")
            @endforeach


            @foreach(Session::get('error') ?? [] as $key => $message)
                toastr["error"]("{!! $message !!}")
            @endforeach
        });
    </script>
@endpush
