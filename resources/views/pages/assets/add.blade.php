<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Asset"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Asset</div>
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
                    <button data-bs-toggle="modal" data-bs-target="#Modal017Page1" class="btn btn-primary"><i class='fa fa-archive'></i>  Tambah Supplier</button>
                    <div data-backdrop="true" class="modal fade" id="Modal017Page1" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class='fa fa-archive'></i>  Tambah Supplier</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" reset-grids">
                                        <?php
                                            $params = []; //new query param
                                            $query = array_merge(request()->query(), $params);
                                            $queryParams = http_build_query($query);
                                            $url = url("supplier/add?$queryParams");
                                        ?>
                                        <div class="ajax-inline-page" data-url="{{ $url }}" >
                                            <div class="ajax-page-load-indicator">
                                                <div class="text-center d-flex justify-content-center load-indicator">
                                                    <span class="loader mr-3"></span>
                                                    <span class="fw-bold">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button data-bs-toggle="modal" data-bs-target="#Modal228Page1" class="btn btn-primary"><i class='fa fa-apple'></i>  Tambah Brand</button>
                    <div data-backdrop="true" class="modal fade" id="Modal228Page1" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class='fa fa-apple'></i>  Modal Title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" reset-grids">
                                        <?php
                                            $params = []; //new query param
                                            $query = array_merge(request()->query(), $params);
                                            $queryParams = http_build_query($query);
                                            $url = url("brand/addpagemodal?$queryParams");
                                        ?>
                                        <div class="ajax-inline-page" data-url="{{ $url }}" >
                                            <div class="ajax-page-load-indicator">
                                                <div class="text-center d-flex justify-content-center load-indicator">
                                                    <span class="loader mr-3"></span>
                                                    <span class="fw-bold">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button data-bs-toggle="modal" data-bs-target="#Modal118Page1" class="btn btn-primary"><i class='fa fa-code-fork'></i>  Tambah Tipe Aset</button>
                    <div data-backdrop="true" class="modal fade" id="Modal118Page1" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class='fa fa-code-fork'></i>  Modal Title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0 reset-grids">
                                    <div class=" reset-grids">
                                        <?php
                                            $params = []; //new query param
                                            $query = array_merge(request()->query(), $params);
                                            $queryParams = http_build_query($query);
                                            $url = url("assettype/add?$queryParams");
                                        ?>
                                        <div class="ajax-inline-page" data-url="{{ $url }}" >
                                            <div class="ajax-page-load-indicator">
                                                <div class="text-center d-flex justify-content-center load-indicator">
                                                    <span class="loader mr-3"></span>
                                                    <span class="fw-bold">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="assets-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('assets.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="supplierid">Supplier <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-supplierid-holder" class=" ">
                                                <select required=""  id="ctrl-supplierid" data-field="supplierid" name="supplierid"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->supplierid_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('supplierid', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="typeid">Type <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-typeid-holder" class=" ">
                                                <select required=""  id="ctrl-typeid" data-field="typeid" name="typeid"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->typeid_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('typeid', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="brandid">Brand <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-brandid-holder" class=" ">
                                                <select required=""  id="ctrl-brandid" data-field="brandid" name="brandid"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->brandid_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('brandid', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="assettag">Assettag </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-assettag-holder" class=" ">
                                                <input id="ctrl-assettag" data-field="assettag"  value="<?php echo get_value('assettag') ?>" type="text" placeholder="Enter Assettag"  name="assettag"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="serial">Serial </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-serial-holder" class=" ">
                                                <input id="ctrl-serial" data-field="serial"  value="<?php echo get_value('serial') ?>" type="text" placeholder="Enter Serial"  name="serial"  class="form-control " />
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
                                            <label class="control-label" for="purchasedate">Purchasedate </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-purchasedate-holder" class="input-group ">
                                                <input id="ctrl-purchasedate" data-field="purchasedate" class="form-control datepicker  datepicker"  value="<?php echo get_value('purchasedate') ?>" type="datetime" name="purchasedate" placeholder="Enter Purchasedate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="warranty">Warranty (Month) </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-warranty-holder" class=" ">
                                                <input id="ctrl-warranty" data-field="warranty"  value="<?php echo get_value('warranty') ?>" type="text" placeholder="Enter Warranty (Month)"  name="warranty"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="status">Status </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-status-holder" class=" ">
                                                <?php
                                                    $options = Menu::status();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('status', $value, "");
                                                ?>
                                                <label class="option-btn">
                                                <input class="btn-check" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="status" />
                                                <span class="btn btn-outline-secondary"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-11">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="cost">Cost </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-cost-holder" class=" ">
                                                    <input id="ctrl-cost" data-field="cost"  value="<?php echo get_value('cost') ?>" type="text" placeholder="Enter Cost"  pattern="--Positive Numbers--" name="cost"  class="form-control " />
                                                </div>
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
                                                <div class="dropzone " input="#ctrl-picture" fieldname="picture" uploadurl="{{ url('fileuploader/upload/picture') }}"    data-multiple="true" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="5">
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
                                                <select required=""  id="ctrl-locationid" data-field="locationid" name="locationid"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->locationid_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('locationid', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="user_role_id">Enter the code <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="d-flex">
                                                <div>
                                                    <button type="button" data-captcha="{{ captcha_src('flat') }}" class="btn btn-sm btn-light fw-bold">
                                                    <?php echo Captcha::img('flat'); ?>
                                                    </button>
                                                </div>
                                                <div>
                                                    <input class="form-control" required="" placeholder="Enter the code" name="captcha" />
                                                </div>
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
