<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
             <label for="">Name</label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            {{-- <input type="text" name="title" class="form-control"> --}}
            @error('title')
                {{ $message }}
            @enderror
            <label for="Role">Role</label>
            {!! Form::text('role', null, ['class' => 'form-control']) !!}
             @error('role')
                {{ $message }}
            @enderror
        </div>
         <div class="col-lg-6">
            <label for="email">Email</label>
             {!! Form::email('email', null, ['class' => 'form-control']) !!}
              @error('email')
                {{ $message }}
            @enderror

         </div>
    </div>
</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="#" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>


