@if (session()->has('success'))
    <div class ='alert alert-success alert-dismissable fade show' role="alert">
        {{ session()->get('success') }}
        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
           <span aria-hidden='true'>&times;</span> 
        </button>
    </div>
@endif
@if (session()->has('error'))
    <div class ='alert alert-danger alert-dismissable fade show' role="alert">
        {{ session()->get('error') }}
        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
           <span aria-hidden='true'>&times;</span> 
        </button>
    </div>
@endif