@extends('Pages.layout.menu')
@section('content')
    <form class="" method="POST" action="./Pages/Help" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-group row">
            <div class="col-md-12">
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                <input type="text" class="form-control dark-mode" name="name" placeholder="Họ và tên">
                    @error('name')
                    <div class="error-text">{{ $message }}</div>
                     @enderror
            </div>
            
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <input type="text" class="form-control dark-mode" name="title" placeholder="Tiêu đề">
                    @error('title')
                    <div class="error-text">{{ $message }}</div>
                     @enderror
            </div>
            </div>

            <div class="form-group row">
            <div class="col-md-12">
                <input type="text" class="form-control dark-mode" name="email" placeholder="Email">
                    @error('email')
                    <div class="error-text">{{ $message }}</div>
                     @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea class="form-control dark-mode" id="" cols="30" name="content" rows="10" placeholder="Để lại tin nhắn của bạn ở đây. Cảm ơn đóng góp của các bạn."></textarea>
                @error('content')
                    <div class="error-text">{{ $message }}</div>
                     @enderror
            </div>
            </div>

            <div class="form-group row">
            <div class="col-md-6">
                
                <button type="submit" class="btn btn-warning dark-mode"><i class="white fa fa-save"></i>  Liên hệ</button>
            </div>
        </div>

    </form>

@endsection
