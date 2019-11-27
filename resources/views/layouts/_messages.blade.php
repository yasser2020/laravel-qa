

@if(session('success'))
<div class="alert alert-success" role="alert">
   <strong>Success</strong> {{session('success')}}
</div>

@endif