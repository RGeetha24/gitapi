@extends('layouts.app')

@section('content')
<div class="container">
<div class="row my-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mb-3">
            <div class="card-header"> @lang('messages.editLanguage') </div>
                <div class="card-body">
                    <div class="formsec">
                        <form action="{{route('module.language.updatelanguage',$language->id)}}" class="form-horizontal" method="POST" role="form">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row align-items-center mb-4">
                                <div class="col-md-3 mb-2">
                                    <span class="f-md f-semi secondaryclr">@lang('messages.name')</span>
                                </div>
                                <div class="dropdown col-md-9">
                                    <div class="tabselect Locationselct  w-100">
                                        <div> 
                                            <select class="selectpicker w-100" id='lang_id' name='name' required>
                                                @foreach ($languagesData as $lang)
                                                <option {{ ( $lang->language == $language->name) ? 'selected' : '' }}  value={{$lang->language.'-'.$lang->code}}>{{$lang->language}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('name')
                                        <p class="errorColour  paddingTop10">{{ $message }}</p>
                                    @enderror
                                </div>  
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-3 mb-2">
                                    <span class="f-md f-semi secondaryclr ">@lang('messages.translation') @lang('messages.name')</span>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center w-100">
                                        <input type="text" class="form-control" value="{{$language->translatedName}}" name="translation" maxlength="100"  autocomplete="off" required/>
                                    </div>
                                    <small class="text-muted"><b>@lang('messages.note')</b> : @lang('messages.title100')</small>

                                    @error('translation')
                                        <p class="errorColour  paddingTop10">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class=" d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn primarybg border-none f-semi"   >
                                    @lang('messages.update') 
                                </button> 
                                <a class="btn btn-secondary border-none f-semi ml-2" href="{{route('module.language.languages')}}">
                                    @lang('messages.cancel') 
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>   
</div>
@endsection