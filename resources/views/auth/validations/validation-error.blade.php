{{$error}}
@if($error)
@if($code == '2002')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="mdi mdi-alert-outline me-2"></i>
    Could not connect to the database
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@else
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="mdi mdi-alert-outline me-2"></i>
    An unexpected error occured
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endif