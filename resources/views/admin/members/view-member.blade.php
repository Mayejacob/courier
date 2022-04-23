@extends('admin.layouts.master')
@section('title','View Member')

@push('css')
    
@endpush

@section('content')


<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                  <span class="username">
                    <a href="#">{{ $user->name}}</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                  </span>
                  <span class="description">{{ date('l d M Y, g:iA', strtotime($user->created_at))}} </span>
                </div>
                <!-- /.user-block -->
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6">
                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
        
                <p>
                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                  <span class="float-right">
                    <a href="#" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Comments (5)
                    </a>
                  </span>
                </p>
        
                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
            </div>
        </div>

    </div>
    
</div>

    
@endsection

@push('js')
    
@endpush