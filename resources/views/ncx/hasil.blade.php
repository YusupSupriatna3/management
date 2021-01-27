@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
  $(document).ready( function () {
          $('select').selectize({
          // sortField: 'text'
        });
  });
  
</script>


@stop
@extends('layouts.app')
@section('dashboard')
Search Account
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
      </div>
<!-- end -->  
      
        <form action="{{ route('search-ncx') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            
          <div class="form-group">
              <label class="col-md-4 control-label">SID</label>
              <div class="col-md-6">
                <input id="sid" type="text" class="form-control" name="sid" placeholder="INPUT SID" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-4">
                <button type="submit" id="cari_ncx" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>
 

      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title pull-right"><a href="{{ URL('/ncx') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
      </div>
      </div>
  <div style="overflow-x:auto;">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th nowrap style="text-align: center;">NIPNAS</th>
                <th nowrap style="text-align: center;">LI_SID</th>
                <th nowrap style="text-align: center;">ACCOUNTNAS</th>
                <th nowrap style="text-align: center;">AGREENUM</th>
                <th nowrap style="text-align: center;">AGREENUM_PARENT</th>
                <th nowrap style="text-align: center;">AGRRENUM_MASTER</th>
                <th nowrap style="text-align: center;">AGREE_ITEMNUM</th>
                <th nowrap style="text-align: center;">AGREE_NAME</th>
                <th nowrap style="text-align: center;">AGREE_TYPE</th>
                <th nowrap style="text-align: center;">AGREE_CREATED</th>
                <th nowrap style="text-align: center;">AGREE_CREATEDBY</th>
                <th nowrap style="text-align: center;">AGREE_STATUS</th>
                <th nowrap style="text-align: center;">AGREE_STATUS_DATE</th>
                <th nowrap style="text-align: center;">AGREE_START_DATE</th>
                <th nowrap style="text-align: center;">AGREE_END_DATE</th>
                <th nowrap style="text-align: center;">ORDER_ID</th>
                <th nowrap style="text-align: center;">ORDER_CREATED_DATE</th>
                <th nowrap style="text-align: center;">ORDER_CREATEDBY</th>
                <th nowrap style="text-align: center;">ORDER_STATUS</th>
                <th nowrap style="text-align: center;">ORDER_STATUS_DATE</th>
                <th nowrap style="text-align: center;">LI_ID</th>
                <th nowrap style="text-align: center;">LI_PRODUCTID</th>
                <th nowrap style="text-align: center;">LI_PRODUCT_NAME</th>
                <th nowrap style="text-align: center;">LI_PRODPARTNUM</th>
                <th nowrap style="text-align: center;">LI_VENDORNUM</th>
                <th nowrap style="text-align: center;">LI_SERVICE_ACCOUNT</th>
                <th nowrap style="text-align: center;">LI_BILLING_ACCOUNT</th>
                <th nowrap style="text-align: center;">LI_CUSTOMER_ACCOUNT</th>
                <th nowrap style="text-align: center;">LI_MONTHLY_PRICE</th>
                <th nowrap style="text-align: center;">LI_OTC_PRICE</th>
                <th nowrap style="text-align: center;">LI_MANUAL_PRICE_OVERRIDE</th>
                <th nowrap style="text-align: center;">LI_MANUAL_DISCOUNT</th>
                <th nowrap style="text-align: center;">CURRENCY</th>
                <th nowrap style="text-align: center;">LI_BANDWIDTH</th>
                <th nowrap style="text-align: center;">LI_CREATED_DATE</th>
                <th nowrap style="text-align: center;">LI_CREATEDBY</th>
                <th nowrap style="text-align: center;">LI_BILLDATE</th>
                <th nowrap style="text-align: center;">LI_BILLING_START_DATE</th>
                <th nowrap style="text-align: center;">LI_STATUS</th>
                <th nowrap style="text-align: center;">LI_STATUS_DATE</th>
                <th nowrap style="text-align: center;">LI_MILESTONE</th>
                <th nowrap style="text-align: center;">LI_MILESTONE_DATE</th>
                <th nowrap style="text-align: center;">LI_FULFILLMENT_STATUS</th>
                <th nowrap style="text-align: center;">LI_PAYMENT_TERM</th>
                <th nowrap style="text-align: center;">ORDER_SUBTYPE</th>
                <th nowrap style="text-align: center;">LAST_UPDATE</th>
                <th nowrap style="text-align: center;">CURRENT_BANDWIDTH</th>
                <th nowrap style="text-align: center;">BEFORE_BANDWIDTH</th>
                <th nowrap style="text-align: center;">PRODUCT_ACTIVATION_DATE</th>
                <th nowrap style="text-align: center;">QUOTE_ROW_ID</th>
                <th nowrap style="text-align: center;">ORDER_DESCRIPTION</th>
                <th nowrap style="text-align: center;">LINE_ITEM_DESCRIPTION</th>
                <th nowrap style="text-align: center;">DISCNT_AMT</th>
                <th nowrap style="text-align: center;">DISC_AMT_RC</th>
                <th nowrap style="text-align: center;">X_MRC_TOT_DISC_AMNT</th>
                <th nowrap style="text-align: center;">REV_NUM</th>
                <th nowrap style="text-align: center;">AGREE_CREATEDBY_NAME</th>
                <th nowrap style="text-align: center;">ORDER_CREATEDBY_NAME</th>
                <th nowrap style="text-align: center;">LI_CREATEDBY_NAME</th>
                <th nowrap style="text-align: center;">ASSET_INTEG_ID</th>
                <th nowrap style="text-align: center;">ADJ_UNIT_PRI</th>
                <th nowrap style="text-align: center;">BASE_UNIT_PRI</th>
                <th nowrap style="text-align: center;">COMPLETED_DT</th>
                <th nowrap style="text-align: center;">NET_PRI</th>
                <th nowrap style="text-align: center;">ACTION_CD</th>
                <th nowrap style="text-align: center;">CMPND_PROD_NUM</th>
                <th nowrap style="text-align: center;">PROVCOM_DATE</th>
                <th nowrap style="text-align: center;">PAR_ORDER_ITEM_ID</th>
                <th nowrap style="text-align: center;">BILL_PROFILE_ID</th>
                <th nowrap style="text-align: center;">AM</th>
                <th nowrap style="text-align: center;">LI_BILLCOMDATE</th>
                <th nowrap style="text-align: center;">TANGGAL_PROSES</th>
                <th nowrap style="text-align: center;">PREVORDER</th>
                <th nowrap style="text-align: center;">AGREEITEMNUMM</th>
                <th nowrap style="text-align: center;">AGREENAME</th>
                <th nowrap style="text-align: center;">AGREETYPE</th>
                <th nowrap style="text-align: center;">AGREESTATUS</th>
                <th nowrap style="text-align: center;">AGREESTATUSDATE</th>
                <th nowrap style="text-align: center;">AGREECREATEDDATE</th>
                <th nowrap style="text-align: center;">AGREECREATEDBY</th>
                <th nowrap style="text-align: center;">CUSTACCNTNUM</th>
                <th nowrap style="text-align: center;">CUSTACCNTNAME</th>
                <th nowrap style="text-align: center;">CUST_REGION</th>
                <th nowrap style="text-align: center;">CUST_WITEL</th>
                <th nowrap style="text-align: center;">CUST_SEGMEN</th>
                <th nowrap style="text-align: center;">CUST_ACC_STATUS</th>
                <th nowrap style="text-align: center;">SOLD_WIL_ID</th>
                <th nowrap style="text-align: center;">BILLACCNTNUM</th>
                <th nowrap style="text-align: center;">BILLACCNTNAME</th>
                <th nowrap style="text-align: center;">BILL_REGION</th>
                <th nowrap style="text-align: center;">BILL_WITEL</th>
                <th nowrap style="text-align: center;">BILLACCNTSTATUS</th>
                <th nowrap style="text-align: center;">TAXNUMBER</th>
                <th nowrap style="text-align: center;">HANDLINGTYPE</th>
                <th nowrap style="text-align: center;">BILL_WIL_ID</th>
                <th nowrap style="text-align: center;">SERVACCNTNUM</th>
                <th nowrap style="text-align: center;">SERVACCNTNAME</th>
                <th nowrap style="text-align: center;">SERVICE_REGION</th>
                <th nowrap style="text-align: center;">SERVICE_WITEL</th>
                <th nowrap style="text-align: center;">SERVICE_SEGMENT</th>
                <th nowrap style="text-align: center;">SERVACCNTSTATUS</th>
                <th nowrap style="text-align: center;">SERVICE_WIL_ID</th>
                <th nowrap style="text-align: center;">LAST_REFRESH</th>
                <th nowrap style="text-align: center;">X_CX_TERMIN_FLG</th>
                <th nowrap style="text-align: center;">X_CX_TERMIN_VALUE</th>
                <th nowrap style="text-align: center;">FULFLMNT_ITEM_CODE</th>
                <th nowrap style="text-align: center;">BILLING_TYPE_CD</th>
                <th nowrap style="text-align: center;">PRICE_TYPE_CD</th>
                <th nowrap style="text-align: center;">LOGIN</th>
                <th nowrap style="text-align: center;">CHANGE_REASON_CD</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $ncxs)
                <tr role="row" class="odd">
                        <td nowrap style="text-align: center;">{{$ncxs->nipnas}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_sid}}</td>
                        <td nowrap style="text-align: center;">
                            <a href="{{ url('view-cek-pembayaran/'.$ncxs->accountnas) }}">{{$ncxs->accountnas}}</a>
                        </td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreenum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreenum_parent}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agrrenum_master}}</td>
                        <td nowrap >{{$ncxs->agree_itemnum}}</td>
                        <td nowrap >{{$ncxs->agree_name}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_type}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_created}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_createdby}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_status}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_status_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_start_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_end_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_created_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_createdby}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_status}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_status_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_productid}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_product_name}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_prodpartnum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_vendornum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_service_account}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_billing_account}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_customer_account}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_monthly_price}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_otc_price}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_manual_price_override}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_manual_discount}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->currency}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_bandwidth}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_created_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_createdby}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_billdate}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_billing_start_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_status}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_status_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_milestone}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_milestone_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_fulfillment_status}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_payment_term}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_subtype}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->last_update}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->current_bandwidth}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->before_bandwidth}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->product_activation_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->quote_row_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_description}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->line_item_description}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->discnt_amt}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->disc_amt_rc}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->x_mrc_tot_disc_amnt}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->x_nrc_tot_disc_amnt}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->rev_num}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agree_createdby_name}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->order_createdby_name}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_createdby_name}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->asset_integ_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->adj_unit_pri}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->base_unit_pri}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->completed_dt}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->net_pri}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->action_cd}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->cmpnd_prod_num}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->provcom_date}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->par_order_item_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->bill_profile_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->am}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->li_billcomdate}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->tanggal_proses}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->prevorder}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreeitemnumm}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreename}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreetype}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreestatus}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreestatusdate}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreecreateddate}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->agreecreatedby}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->custaccntnum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->custaccntname}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->cust_region}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->cust_witel}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->cust_segmen}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->cust_acc_status}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->sold_wil_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->billaccntnum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->billaccntname}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->bill_region}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->bill_witel}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->billaccntstatus}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->taxnumber}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->handlingtype}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->bill_wil_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->servaccntnum}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->servaccntname}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->service_region}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->service_witel}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->service_segment}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->servaccntstatus}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->service_wil_id}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->last_refresh}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->x_cx_termin_flg}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->x_cx_termin_value}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->fulflmnt_item_code}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->billing_type_cd}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->price_type_cd}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->login}}</td>
                        <td nowrap style="text-align: center;">{{$ncxs->change_reason_cd}}</td>
              </tr>
            @endforeach
            </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
          <div class="pull-right" id="example2_paginate">
            {{$data->render()}}
          </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
  
  
@endsection