<!--begin::Form-->
<form id="kt_modal_form" class="form" action="{{$route}}" method="post" data-method="{{isset($model)?'PUT':'POST'}}">
    @csrf
    @if(isset($model))
        @method('PUT')
    @endif
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_scroll" data-kt-scroll="true"
         data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_header"
         data-kt-scroll-wrappers="#kt_modal_scroll" data-kt-scroll-offset="300px">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                   placeholder="name" value="{{isset($model)?$model->name:''}}"/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-10">
        <button type="reset" class="btn btn-light me-3 close" data-kt-users-modal-action="cancel">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
{{--@push('scripts')--}}
{{--    <script src="{{asset("assets/js/custom/apps/user-management/users/list/add.js")}}"></script>--}}
{{--@endpush--}}
