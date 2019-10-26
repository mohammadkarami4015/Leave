@extends('master')
@section('menu')

@endsection

@section('content')
    <div class="box box-primary">
        <form role="form" method="post" action="{{route('letter.update',['id'=>$letter->id])}}">
            {{csrf_field()}}
            {{method_field('patch')}}
            <div class="box-body">
                <div class="col-md-8">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="name" name="title" class="form-control" id="exampleInputEmail1" value="{{$letter->title}}">
                </div>

                <div class="col-md-8">
                    <label for="exampleInputEmail1">متن نامه</label>
                    <textarea type="name" rows="20" name="details" class="form-control" id="exampleInputEmail1" >{{$letter->details}}</textarea>
                </div>

                <hr>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="form-group">
                            <label> قابل نمایش برای</label>
                            @foreach($users as $user)
                                <div class="checkbox">
                                    <label>
                                        <input {{in_array(($user->id),$letter->users->pluck('id')->toArray()) ? 'checked' : ''}} name="user_id[]" value="{{$user->id}}" type="checkbox">
                                        {{$user->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ویرایش</button>
                <a href="{{route('letter.index')}}"><button   type="button" class="btn btn-success">بازگشت </button></a>
            </div>
        </form>
    </div>

@endsection
