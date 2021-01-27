@extends('layouts.app')

@section('dashboard')
Data Invoice
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Invoice</li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
  th {
  color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
  }
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <form id="form-search" name="form-search" action="{{ route('search-invoice') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
             <label class="col-md-2 control-label" style="color: white;"></label>
              <div class="col-md-2">
                <select class="invoice-cari form-control select2" name="no_akun">
                </select>
              </div>
              <div class="col-md-2">
                <select class="bp_number form-control select2" name="bp_number" id="bp_number">
                </select>
              </div>
              <div class="col-md-3">
                <select class="cus_name form-control select2" name="cus_name" id="cus_name">
                </select>
              </div>
              <label class="col-md-1 control-label">&nbsp;</label>
              <div class="col-md-2">
                <button type="submit" id="cari_invoice" class="btn btn-warning btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script type="text/javascript">
    $(function(){
   

    //   $('select').selectize({
    // // sortField: 'text'
    //   });   
    });
    // select2(
    //     '.ri-form-group .sku1-data',
    //     '.ri-form-group .sku2-data',
    //     '.ri-form-group .basic-multiple'
    // );

    
    $(document).ready(function(){
        $('.invoice-cari').select2({
            placeholder: 'Cari account number...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.account_number,
                            id      : item.account_number
                        }
                    })
                    };
                },
            cache: true
            }
        });

        $('.bp_number').select2({
            placeholder: 'Cari bp number...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.bpnumber,
                            id      : item.bpnumber
                        }
                    })
                    };
                },
            cache: true
            }
        });

        $('.cus_name').select2({
            placeholder: 'Cari customer name...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.customer_name,
                            id      : item.customer_name
                        }
                    })
                    };
                },
            cache: true
            }
        });            
    })
</script>
@endsection

