<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "Home"; // set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col comp-grid " >
                    <div class="">
                        <div class="h5 font-weight-bold">Home</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-4 comp-grid " >
                    <?php $rec_count = $comp_model->getcount_institution();  ?>
                    <a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("institution") ?>' >
                    <div class="row gutter-sm align-items-center">
                        <div class="col-auto" style="opacity: 1;">
                            <i class="fa fa-bank fa-2x "></i>
                        </div>
                        <div class="col">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Institution</div>
                                <small class="">Total Institution</small>
                            </div>
                            <h2 class="value"><?php echo $rec_count; ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 comp-grid " >
                <?php $rec_count = $comp_model->getcount_department();  ?>
                <a class="animated zoomIn record-count alert alert-success"  href='<?php print_link("department") ?>' >
                <div class="row gutter-sm align-items-center">
                    <div class="col-auto" style="opacity: 1;">
                        <i class="fa fa-sitemap fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="flex-column justify-content align-center">
                            <div class="title">Department</div>
                            <small class="">Total Department</small>
                        </div>
                        <h2 class="value"><?php echo $rec_count; ?></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 comp-grid " >
            <?php $rec_count = $comp_model->getcount_location();  ?>
            <a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("location") ?>' >
            <div class="row gutter-sm align-items-center">
                <div class="col-auto" style="opacity: 1;">
                    <i class="fa fa-map-marker fa-2x"></i>
                </div>
                <div class="col">
                    <div class="flex-column justify-content align-center">
                        <div class="title">Location</div>
                        <small class="">Total Location</small>
                    </div>
                    <h2 class="value"><?php echo $rec_count; ?></h2>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
</div>
<div  class="mb-3" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-3 comp-grid " >
                <?php $rec_count = $comp_model->getcount_assets();  ?>
                <a class="animated zoomIn record-count alert alert-danger"  href='<?php print_link("assets") ?>' >
                <div class="row gutter-sm align-items-center">
                    <div class="col-auto" style="opacity: 1;">
                        <i class="fa fa-bank fa-2x"></i>
                    </div>
                    <div class="col">
                        <div class="flex-column justify-content align-center">
                            <div class="title">Assets</div>
                            <small class="">Total Assets</small>
                        </div>
                        <h2 class="value"><?php echo $rec_count; ?></h2>
                    </div>
                </div>
            </a>
            <?php $rec_count = $comp_model->getcount_building();  ?>
            <a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("building") ?>' >
            <div class="row gutter-sm align-items-center">
                <div class="col-auto" style="opacity: 1;">
                    <i class="fa fa-building-o fa-2x"></i>
                </div>
                <div class="col">
                    <div class="flex-column justify-content align-center">
                        <div class="title">Building</div>
                        <small class="">Total Building</small>
                    </div>
                    <h2 class="value"><?php echo $rec_count; ?></h2>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 comp-grid " >
        <?php $rec_count = $comp_model->getcount_component();  ?>
        <a class="animated zoomIn record-count alert alert-success"  href='<?php print_link("component") ?>' >
        <div class="row gutter-sm align-items-center">
            <div class="col-auto" style="opacity: 1;">
                <i class="fa fa-th-large fa-2x"></i>
            </div>
            <div class="col">
                <div class="flex-column justify-content align-center">
                    <div class="title">Component</div>
                    <small class="">Total Component</small>
                </div>
                <h2 class="value"><?php echo $rec_count; ?></h2>
            </div>
        </div>
    </a>
    <?php $rec_count = $comp_model->getcount_brand();  ?>
    <a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("brand") ?>' >
    <div class="row gutter-sm align-items-center">
        <div class="col-auto" style="opacity: 1;">
            <i class="fa fa-apple fa-2x"></i>
        </div>
        <div class="col">
            <div class="flex-column justify-content align-center">
                <div class="title">Brand</div>
                <small class="">Total Brand</small>
            </div>
            <h2 class="value"><?php echo $rec_count; ?></h2>
        </div>
    </div>
</a>
</div>
<div class="col-md-3 comp-grid " >
    <?php $rec_count = $comp_model->getcount_maintenance();  ?>
    <a class="animated zoomIn record-count alert alert-warning"  href='<?php print_link("maintenance") ?>' >
    <div class="row gutter-sm align-items-center">
        <div class="col-auto" style="opacity: 1;">
            <i class="fa fa-wrench fa-2x"></i>
        </div>
        <div class="col">
            <div class="flex-column justify-content align-center">
                <div class="title">Maintenance</div>
                <small class="">Total Maintenance</small>
            </div>
            <h2 class="value"><?php echo $rec_count; ?></h2>
        </div>
    </div>
</a>
<?php $rec_count = $comp_model->getcount_supplier();  ?>
<a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("supplier") ?>' >
<div class="row gutter-sm align-items-center">
    <div class="col-auto" style="opacity: 1;">
        <i class="fa fa-truck fa-2x"></i>
    </div>
    <div class="col">
        <div class="flex-column justify-content align-center">
            <div class="title">Supplier</div>
            <small class="">Total Supplier</small>
        </div>
        <h2 class="value"><?php echo $rec_count; ?></h2>
    </div>
</div>
</a>
</div>
<div class="col-md-3 comp-grid " >
    <?php $rec_count = $comp_model->getcount_employees();  ?>
    <a class="animated zoomIn record-count alert alert-secondary"  href='<?php print_link("employees") ?>' >
    <div class="row gutter-sm align-items-center">
        <div class="col-auto" style="opacity: 1;">
            <i class="fa fa-users fa-2x"></i>
        </div>
        <div class="col">
            <div class="flex-column justify-content align-center">
                <div class="title">Employees</div>
                <small class="">Total Employees</small>
            </div>
            <h2 class="value"><?php echo $rec_count; ?></h2>
        </div>
    </div>
</a>
<?php $rec_count = $comp_model->getcount_department();  ?>
<a class="animated zoomIn record-count alert alert-primary"  href='<?php print_link("department") ?>' >
<div class="row gutter-sm align-items-center">
    <div class="col-auto" style="opacity: 1;">
        <i class="fa fa-sitemap fa-2x"></i>
    </div>
    <div class="col">
        <div class="flex-column justify-content align-center">
            <div class="title">Department</div>
            <small class="">Total Department</small>
        </div>
        <h2 class="value"><?php echo $rec_count; ?></h2>
    </div>
</div>
</a>
</div>
</div>
</div>
</div>
<div  class="mb-3" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>
</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    $(document).ready(function(){
    // custom javascript | jquery codes
    });
</script>
@endsection
