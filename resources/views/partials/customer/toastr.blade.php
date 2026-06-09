@if(Session::has('message'))
    @php
        $type =  Session::get('type', 'success') ;
        $message = Session::get('message') ;
        $options    = json_encode(Session::get('toaster_option', 'success'));
    @endphp
    <script>
        $(function(){
            toastr.{{$type}}('{{$message}}', null, '{{ $options }}');
        });
    </script>
  @endif