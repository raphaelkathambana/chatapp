@extends('layouts.app')
@section('content')
{{ __('Failure') }}
<br>
{{ __('Fail 1: ?int $receiverId = null ====> ') }} {{ $wa }}
<br>
{{ __('Fail 2: $receiversId = (int) $request->get("receiver_id") ====> ') }}{{ $wawa }}
<br>
{{ __('Fail 3: $request->get("receiver_id") ====> ') }}{{ $wawawa }}
<br>
{{ __('Fail 4: $request->get("message" ====> ') }}{{ $message }}
@endsection
