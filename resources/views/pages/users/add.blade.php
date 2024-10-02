<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New User"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New User</div>
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
                        <form id="users-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="fullname">Fullname <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-fullname-holder" class=" ">
                                                <input id="ctrl-fullname" data-field="fullname"  value="<?php echo get_value('fullname') ?>" type="text" placeholder="Enter Fullname"  required="" name="fullname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email-holder" class=" ">
                                                <input id="ctrl-email" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  required="" name="email"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-password-holder" class="input-group ">
                                                <input id="ctrl-password" data-field="password"  value="<?php echo get_value('password') ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control  password password-strength" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="fw-bold">Should contain</small>
                                                <small class="length chip">6 Characters minimum</small>
                                                <small class="caps chip">Capital Letter</small>
                                                <small class="number chip">Number</small>
                                                <small class="special chip">Symbol</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-confirm_password-holder" class="input-group ">
                                                <input id="ctrl-password-confirm" data-match="#ctrl-password"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="Confirm Password" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Password does not match
                                                </div>
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
                                            <label class="control-label" for="city">City <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-city-holder" class=" ">
                                                <input id="ctrl-city" data-field="city"  value="<?php echo get_value('city') ?>" type="text" placeholder="Enter City"  required="" name="city"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-phone-holder" class=" ">
                                                <input id="ctrl-phone" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="role">Role <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-role-holder" class=" ">
                                                <input id="ctrl-role" data-field="role"  value="<?php echo get_value('role') ?>" type="text" placeholder="Enter Role"  required="" name="role"  class="form-control " />
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
