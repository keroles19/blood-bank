
{!! Form::model($model,[

'action' =>'Posts\postController@store',
'method' =>'post',
'enctype'=> 'multipart/form-data',
]);
Form::token()
 !!}
<div class="card-body">
    <div class="form-group">
        <label for="titleForPost">Title</label>
        {!!
         Form::text('title',null,[
         'class'=>'form-control',
         'placeholder'=>'Enter title for post'
         ])
         !!}
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Picture</label>
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('image',[
                'class'=>'custom-file-input',
                'id'=>'image',
                'accept'=>'image/x-png,image/gif,image/jpeg'
                ]) !!}
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="titleForPost">Describe post</label>
        {!! Form::textarea('body',null,[
        'class'=>'form-control'
        ]) !!}
    </div>
    <div class="form-group">
        <label>Category</label>
        {!! Form::select('category_id',$category::pluck('name','id'),null,
        [
        'class' =>'form-control'
        ]
) !!}
    </div>
</div>

<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


{!!
 Form::close()
 !!}
