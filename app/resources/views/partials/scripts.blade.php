{{-- Vendor scripts --}}
<script type="text/javascript" src="{{ asset('assets/vendor/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendor/admin-lte/js/app.min.js') }}"></script>

{{-- todo: app.js --}}

{{-- Page specific scripts --}}
@stack('page-scripts')

{{-- Page specific inline scripts --}}
@stack('inline-scripts')
