@extends('adminiy.layout.main') @section('content')
<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width" id="mypitch">
        <!-- START: Card Data-->
        <!-- SALE Modal -->
        <!-- Add Event Modal -->
        <div id="addevent" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md text-left">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="model-header">{{$name}} Form</h4>
                    </div>
                    <div class="modal-body">
                        {!! $form !!}
                    </div>
                    <div class="modal-footer">
                        <button id="discard" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button id="add-generic" type="submit" class="btn btn-primary eventbutton">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Event Modal End-->
        <h3>{{$name}}</h3>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mt-3 updateevent" data-role_id="" data-rolename="" data-slug="" style="cursor: pointer;">
                <div class="card border-bottom-0">
                    <div class="card-content border-bottom border-primary border-w-5" style="border-color: #ff6b68 !important;">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="media-body align-self-center pl-3"><span class="mb-0 h6 font-w-600">Click here to add {{$name}}</span> <br /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" id="answers_app">
            <h4>{{$name}} Detail Report</h4>
            <?php $total = 0; ?>
            <table id="example" class="table table-striped" style="width: 100%;">
                {!! $table !!}
            </table>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->
@endsection @section('css')
<style type="text/css">
    .start-date .js-example-basic-multiple + span {
        width: 100% !important;
    }
    .card {
        border: 1px solid var(--bordercolor);
        border-radius: 5px;
        background: var(--mainbackground);
    }
    .card .card-content {
        z-index: 1;
    }
    .border-w-5 {
        border-width: 5px !important;
    }
    .p-4 {
        padding: 1.5rem !important;
    }
    .circle-50 {
        width: 50px;
        height: 50px;
        line-height: 55px;
        border-radius: 50%;
        text-align: center;
    }
    .font-w-600 {
        font-weight: 600;
    }
    .font-w-500 {
        font-weight: 500;
    }
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }
    .outline-badge-primary {
        border: 1px solid var(--primarycolor);
        color: var(--primarycolor);
        position: relative;
        overflow: hidden;
    }
    .cf-xsn:before {
        content: "\ece9";
    }
    .card-liner-icon {
        font-size: 25px;
        line-height: 31px;
    }
    .outline-badge-primary > * {
        z-index: 1;
    }
    .outline-badge-primary:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: var(--primarycolor);
        opacity: 0.2;
        left: 0px;
        top: 0px;
        z-index: 0;
    }
</style>
<link rel="stylesheet" href="{{asset('vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}" />
@endsection @section('js')
<script src="{{asset('vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="{{asset('js/datatable.script.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var description = CKEDITOR.replace("description");
        description.on("change", function (evt) {
            $("#description").text(evt.editor.getData());
        });
    });
    // CKEDITOR.replace( 'description', );
</script>
<script type="text/javascript">
    $(document).on('change','.approval',function(){
        var cat_id = $(this).data("cat_id");
        console.log(cat_id);
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "",
            data: {cat_id, cat_id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    toastr.success(response.message);
                }else{
                    toastr.error(response.message);
                }
            }
        });
    });
    $(document).on('change','.active_ads',function(){
        var ad_id = $(this).data("ad_id");
        console.log(ad_id);
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "",
            data: {ad_id, ad_id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    toastr.success(response.message);
                }else{
                    toastr.error(response.message);
                }
            }
        });
    });
    $(document).on('change','.featured',function(){
        var product_id = $(this).data("pro_id");
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "",
            data: {product_id, product_id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    toastr.success(response.message);
                }else{
                    toastr.error(response.message);
                }
            }
        });
    });
    $(document).on('change','.best_seller',function(){
        var product_id = $(this).data("pro_id");
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "",
            data: {product_id, product_id , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 1) {
                    toastr.success(response.message);
                }else{
                    toastr.error(response.message);
                }
            }
        });
    });
    $("#add-generic").click(function(f){
        $("#generic-form").submit();
        
    })
    $("#productshow").click(function(){
        $("#generic-form").submit();
    })
    $(document).ready(function () {
        $('#categoryid').bind('change', function() {
            var value = $('#categoryid :selected').val();
            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url: "",
                data: {id:value, _token:"{{csrf_token()}}"},
                success: function (response) {
                    if (response.status == 1) {
                        $("#varlist").remove();
                        $("#repeted").append(response.message);
                    }
                }
            });
        });
    });
    $(".editsetlist").click(function(){
        console.log("here")
        $("#price").val($(this).data("price"))
        $("#stock").val($(this).data("stock"))
        $("#sku").val($(this).data("sku"))
        $("#record_id").val($(this).data("edit_id"))
        var value = $(this).data("productlistid")
        $("#listset").remove();
        $.ajax({
            type : 'POST',
            dataType : 'JSON',
            url: "",
            data: {id:value, _token:"{{csrf_token()}}"},
            success: function (response) {
                if (response.status == 1) {
                    $("#row").append(response.message)
                    $("#addevent").modal("show");
                }
            }
        });
    });
    $("#add").click(function(){
        var dup = $(this).closest("#row").find("#repeted").html();
        $("#var").append(dup);
    })
    $("#addpitch").click(function(){
        var dup = $(this).closest("#generic-form").find("#pitchrepeted").html();
        var count = $(this).closest("#generic-form").find("#pitchcount").val();
        if (count<5) {
            $("#pitchvar").append(dup);
            count=+count+1
            $(this).closest("#generic-form").find("#pitchcount").val(count)
            if (count>=5) {
                $(this).remove();
            }
        }
        console.log(dup)
    })
    $("body").on(".add-event","click", function(){
        $("#generic-form")[0].reset();
        $("#addevent").modal("show")
        $("#attribute").click();
    })
    $(".updateevent").click(function(){
        $("#addevent").modal("show")
        // $("#attribute").click();
    })
    $("body").on("click" ,".delete-record",function(){
        var id = $(this).data("id");
        var model = $(this).data("model");
        var is_active = 0;
        var is_deleted = 1;
        $.ajax({
            type: 'post',
            dataType : 'json',
            url: "",
            data: {id:id, model:model, is_active:is_active, is_deleted:is_deleted , _token: '{{csrf_token()}}'},
            success: function (response) {
                if (response.status == 0) {
                    toastr.error(response.message);
                }else{
                    var table = $('#example').DataTable();
                    // table.ajax.reload();
                    location.reload();
                    toastr.success(response.message);
                }
            }
        });
    })
    $(document).ready(function() {
        $('#note').select2();
    });
    $("#finish_caliper").select2({
        tags: true
    });
    function convertToSlug( str ) {
      //replace all special characters | symbols with a space
      str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
      // trim spaces at start and end of string
      str = str.replace(/^\s+|\s+$/gm,'');
      // replace space with dash/hyphen
      str = str.replace(/\s+/g, '-');
      document.getElementById("slug").value = str;
      //return str;
    }
    $("#attribute").click(function(){
        var otype = $(this).children("option:selected").val();
        if (otype == "roles") {
            $("#role-label").show();
            $("#rank-label").show();
        }else if(otype == "departments"){
            $("#role-label").hide();
            $("#rank-label").show();
        }else if(otype == "designations"){
            $("#role-label").hide();
            $("#rank-label").show();
        }
        else if(otype == "project"){
            $("#role-label").hide();
            $("#rank-label").show();
        }
    })
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script type="text/javascript">
    $("#former-submit").click(function () {
        $("#assign-role-form").submit();
    });
    $(".role-assign-modal").click(function () {
        $(".show-role-name").text("Role assign for " + $(this).data("rolename"));
        var role_id = $(this).data("role_id");
        $.ajax({
            type: "post",
            dataType: "json",
            url: "",
            data: { role_id, role_id, _token: "{{csrf_token()}}" },
            success: function (response) {
                if (response.body == "") {
                    toastr.error("No rights found");
                } else {
                    $("#body_modal").html(response.body);
                    $("#addrole-modal").modal("show");
                }
            },
        });
    });
    $(".delete-pitcher").click(function () {
        var id = $(this).data("id");
        var model = $(this).data("model");
        var index = $(this).data("index");
        var is_active = 0;
        var is_deleted = 1;
        console.log(index);
        $.ajax({
            type: "post",
            dataType: "json",
            url: "",
            data: { id: id, model: model, is_active: is_active, is_deleted: is_deleted, index: index, _token: "{{csrf_token()}}" },
            success: function (response) {
                if (response.status == 0) {
                    toastr.error(response.message);
                } else {
                    location.reload();
                    toastr.success(response.message);
                }
            },
        });
    });
    $("#add-sale").click(function (f) {
        var has_error = 0;
        $("#sale-form")
            .find("input")
            .each(function (i, e) {
                if ($(e).prop("required") == true) {
                    if ($(e).val() == "") {
                        has_error++;
                        f.preventDefault();
                        return false;
                    }
                }
            });
        if (has_error == 0) {
            $("#sale-form").submit();
        } else {
            toastr.error("Fill all required fields");
        }
    });
    $(document).on("change", ".sale", function () {
        product_id = $(this).data("pro_id");
        $("#product_id").val(product_id);
        if ($(this).is(":checked")) {
            $("#sale-form")[0].reset();
            $("#addsale").modal("show");
        } else {
            $.ajax({
                type: "post",
                dataType: "json",
                url: "",
                data: { product_id, product_id, _token: "{{csrf_token()}}" },
                success: function (response) {
                    if (response.status == 1) {
                        location.reload();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
            });
        }
    });
</script>
@endsection
