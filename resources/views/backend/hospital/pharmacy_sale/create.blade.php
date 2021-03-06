@extends('layouts.backend.layout') @section('content')

<style type="text/css">
    @keyframes ldio-284ix4wfeaei {
        0% {
            opacity: 1
        }
        50% {
            opacity: .5
        }
        100% {
            opacity: 1
        }
    }
    
    .ldio-284ix4wfeaei div {
        position: absolute;
        width: 10px;
        height: 40px;
        top: 30px;
        animation: ldio-284ix4wfeaei 1s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    }
    
    .ldio-284ix4wfeaei div:nth-child(1) {
        transform: translate(15px, 0);
        background: #e15b64;
        animation-delay: -0.6s;
    }
    
    .ldio-284ix4wfeaei div:nth-child(2) {
        transform: translate(35px, 0);
        background: #f47e60;
        animation-delay: -0.4s;
    }
    
    .ldio-284ix4wfeaei div:nth-child(3) {
        transform: translate(55px, 0);
        background: #f8b26a;
        animation-delay: -0.2s;
    }
    
    .ldio-284ix4wfeaei div:nth-child(4) {
        transform: translate(75px, 0);
        background: #abbd81;
        animation-delay: -1s;
    }
    
    .loadingio-spinner-bars-whv1n2lzl1 {
        width: 41px;
        height: 41px;
        display: inline-block;
        overflow: hidden;
        background: #ffffff;
    }
    
    .ldio-284ix4wfeaei {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(0.41);
        backface-visibility: hidden;
        transform-origin: 0 0;
        /* see note above */
    }
    
    .ldio-284ix4wfeaei div {
        box-sizing: content-box;
    }
    /* generated by https://loading.io/ */
</style>
<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">
    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="index.html">
                <img alt="Logo" src="../assets/media/logos/logo-light.png" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            @include('layouts.backend.sidebar')
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                @include('layouts.backend.header_top')
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor mt-5">
                    <!-- begin:: Content -->
                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="kt_content">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                  <i class="kt-font-brand fa fa-star"></i>
                  </span>
                                    <h3 class="kt-portlet__head-title">
                     Add New Pharmacy Sale
                  </h3>
                                </div>
                            </div>
                            <form class="kt-form" action="/account/pharmacy/create" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col col-5">
                                        <div class="kt-portlet__body">
                                            <label>Medicines In Stock</label>
                                            <select id='callbacks' multiple='multiple' name="items[]">
                                                @foreach($medicines as $pro)
                                                <option value='{{$pro->id}}'>{{$pro->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-3">
                                        <div class="table-responsive mt-5">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th><b>Items</b></th>
                                                        <th><b>Qty</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="itemContent">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col col-4">
                                        <div class="form-group mr-5 mt-5">
                                            <label>Sub Total</label>
                                            <input type="text" class="form-control" id="sub_total" name="sub_total" value="0" readonly>
                                        </div>
                                        <div class="form-group mr-5">
                                          <label>Discount</label>
                                          <input onkeyup="update_cost()" type="text" class="form-control" id="discount" name="discount" value="0">
                                       </div>
                                       <div class="form-group mr-5">
                                          <label>Gross Total</label>
                                          <input type="text" class="form-control" id="gross_total" name="gross_total" value="0">
                                       </div>
                                    </div>
</div>
                                 <div class="kt-portlet__foot kt-portlet__foot--solid">
                                    <div class="kt-form__actions">
                                       <div class="row">
                                             <div class="col-12">
                                                <button type="submit" class="btn btn-brand"><i class="fa fa-paper-plane"></i> Submit</button>
                                             </div>
                                       </div>
                                    </div>
                                 </div>
                        </form>
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <!--begin: Datatable -->
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
                <!-- end:: Content -->
                <!-- end:: Content -->
            </div>
            <script>
                var $input = $('#patient_number');
                $('#name_field').hide();
                $('.loading_data').hide();
                $("#load_data").hide();
                $input.keydown(function() {
                    $("#load_data").show();
                    $('.loading_data').hide();
                    $('#name_field').hide();
                });

                function loadData() {
                    $("#load_data").hide();
                    $('#name_field').hide();
                    $('.loading_data').show();
                    $.ajax({
                        type: 'POST',
                        url: '/account/appointment/get_patient_record',
                        data: {
                            _token: '<?php echo csrf_token() ?>',
                            patient_number: $input.val()
                        },
                        dataType: 'json',
                        success: function(data) {
                            setTimeout(
                                function() {
                                    $('.loading_data').hide();
                                    $('#patient_name').val(data.patient_name);
                                    $('#patient_id').val(data.patient_id);
                                    $('#name_field').show();
                                }, 500
                            );
                        }
                    });
                }
            </script>

            <script>
                function loadTemplate() {
                    var value = $('select[name="template_id"]').val();
                    var content = CKEDITOR.instances['report_content'];
                    if (value == 0) {
                        content.setData("<p></p>");
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '/account/get_report_template',
                            data: {
                                _token: '<?php echo csrf_token() ?>',
                                template_id: value
                            },
                            dataType: 'json',
                            success: function(data) {
                                content.setData(data.template);
                            }
                        });
                    }
                }
            </script>
            <script>
                var items = new Array();

                function updateCart() {
                    var content = "";
                    var i;
                    for (i = 0; i < items.length; i++) {
                        content += "<tr><td><b>" + items[i].name + "</b></br>" + "Rs. " + items[i].price + "</br>" + items[i].company + "</br>" + items[i].stock + " in stock" + "</td><td>" + "<input type='number' style='width: 50px;' data-id='" + i + "' value='" + items[i].quantity + "' onchange='updateQuantity(this)' min='0' name='quantity[]'>" + "</td></tr>";
                    }
                    $('#itemContent').html(content);
                    update_cost();
                }

                function updateQuantity(identifier) {
                    var item_index = $(identifier).data('id');
                    var quantity = $(identifier).val();
                    items[item_index].quantity = quantity;
                    console.log(items);
                    update_cost();
                }

                function update_cost(){
                  var total = 0;

                  var sub_total = $('#sub_total');
                  var discount = $('#discount');
                  var gross_total = $('#gross_total');

                  for (i = 0; i < items.length; i++) {
                     total += items[i].quantity * items[i].price;
                  }
                  sub_total.val(total);
                  var gross = total - discount.val();
                  gross_total.val(gross);

                }

                $('#callbacks').multiSelect({
                    afterSelect: function(values) {
                        $.ajax({
                            type: 'POST',
                            url: '/account/get_medicine_detail',
                            data: {
                                _token: '<?php echo csrf_token() ?>',
                                medicine_id: values
                            },
                            dataType: 'json',
                            success: function(data) {
                                let product = {
                                    p_id: values,
                                    name: data.medicine_name,
                                    price: data.sale_price,
                                    company: data.company,
                                    stock: data.quantity,
                                    quantity: 1,
                                }
                                items.push(product);
                                updateCart();
                            }
                        });
                    },
                    afterDeselect: function(values) {
                        var i;
                        for (i = 0; i < items.length; i++) {
                            if (items[i].p_id[0] == values) {
                                items.splice(i, 1);
                                break;
                            }
                        }
                        updateCart();
                    }
                });
            </script>
            @endsection