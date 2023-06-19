<!-- JavaScript -->
<!-- All JS Plugins -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
{{-- <script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/maplace-active.js') }}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> --}}

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/FormControls.js') }}"></script>
<script src="{{ asset('assets/admin/js/method-admin.js') }}"></script>
@yield('custom_js')
{{-- <script>
    $(document).ready(function(e){
        $('#sort_by').on('change', function(){
            this.form.submit();
            // $.ajax({
            //     url: "{{ route('sort.by') }}",
            //     method: "GET",
            //     data:{sort_by:sort_by},
                // success:function(res){
                //     $('.search-result').html(res);
                // }
            // })
        });
    })
</script> --}}
<script>
    $(document).ready(function(e) {
        $("#sort").on('change', function() {
            this.form.submit();
        });
    });
    $(document).ready(function(e) {
        $("#sorts").on('change', function() {
            this.form.submit();
        });
    });
</script>
<script>
    @if (session()->has('success'))
        toastr.options = {
            "progressBar": true,
            "timeOut": 2000,
            "closeButton": true
        }
        toastr.success("{{ session()->get('success') }}");
    @endif
    @if (session()->has('info'))
        toastr.options = {
            "progressBar": true,
            "timeOut": 2000,
            "closeButton": true
        }
        toastr.info("{{ session()->get('info') }}");
    @endif
    @if (session()->has('error'))
        toastr.options = {
            "progressBar": true,
            "timeOut": 2000,
            "closeButton": true
        }
        toastr.error("{{ session()->get('error') }}");
    @endif
</script>
