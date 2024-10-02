<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Component"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="fa fa-angle-left"></i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Add New Component</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="component-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('component.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="supplierid">Supplierid <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-supplierid-holder" class=" ">
                                                <input id="ctrl-supplierid" data-field="supplierid"  value="<?php echo get_value('supplierid') ?>" type="number" placeholder="Enter Supplierid" step="any"  required="" name="supplierid"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="typeid">Typeid <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-typeid-holder" class=" ">
                                                <input id="ctrl-typeid" data-field="typeid"  value="<?php echo get_value('typeid') ?>" type="number" placeholder="Enter Typeid" step="any"  required="" name="typeid"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="brandid">Brandid <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-brandid-holder" class=" ">
                                                <input id="ctrl-brandid" data-field="brandid"  value="<?php echo get_value('brandid') ?>" type="number" placeholder="Enter Brandid" step="any"  required="" name="brandid"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-name-holder" class=" ">
                                                <input id="ctrl-name" data-field="name"  value="<?php echo get_value('name') ?>" type="text" placeholder="Enter Name"  required="" name="name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="serial">Serial <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-serial-holder" class=" ">
                                                <input id="ctrl-serial" data-field="serial"  value="<?php echo get_value('serial') ?>" type="text" placeholder="Enter Serial"  required="" name="serial"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-quantity-holder" class=" ">
                                                <input id="ctrl-quantity" data-field="quantity"  value="<?php echo get_value('quantity') ?>" type="text" placeholder="Enter Quantity"  required="" name="quantity"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="purchasedate">Purchasedate <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-purchasedate-holder" class="input-group ">
                                                <input id="ctrl-purchasedate" data-field="purchasedate" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('purchasedate') ?>" type="datetime" name="purchasedate" placeholder="Enter Purchasedate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cost">Cost <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cost-holder" class=" ">
                                                <input id="ctrl-cost" data-field="cost"  value="<?php echo get_value('cost') ?>" type="text" placeholder="Enter Cost"  required="" name="cost"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="warranty">Warranty <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-warranty-holder" class=" ">
                                                <input id="ctrl-warranty" data-field="warranty"  value="<?php echo get_value('warranty') ?>" type="text" placeholder="Enter Warranty"  required="" name="warranty"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-status-holder" class=" ">
                                                <input id="ctrl-status" data-field="status"  value="<?php echo get_value('status') ?>" type="text" placeholder="Enter Status"  required="" name="status"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="picture">Picture </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-picture-holder" class=" ">
                                                <div class="dropzone " input="#ctrl-picture" fieldname="picture" uploadurl="{{ url('fileuploader/upload/picture') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="picture" id="ctrl-picture" data-field="picture" class="dropzone-input form-control" value="<?php echo get_value('picture') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="description">Description </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-description-holder" class=" ">
                                                <textarea placeholder="Enter Description" id="ctrl-description" data-field="description"  rows="5" name="description" class=" form-control"><?php echo get_value('description') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="locationid">Locationid <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-locationid-holder" class=" ">
                                                <input id="ctrl-locationid" data-field="locationid"  value="<?php echo get_value('locationid') ?>" type="number" placeholder="Enter Locationid" step="any"  required="" name="locationid"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="checkstatus">Checkstatus <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-checkstatus-holder" class=" ">
                                                <input id="ctrl-checkstatus" data-field="checkstatus"  value="<?php echo get_value('checkstatus') ?>" type="number" placeholder="Enter Checkstatus" step="any"  required="" name="checkstatus"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="fa fa-send"></i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
