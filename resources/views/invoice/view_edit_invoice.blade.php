@extends('layouts.app')

@section('dashboard')
Data Invoice
<small>Data Invoice</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Invoice</li>
@endsection
<style type="text/css">
  form .error {
    color: #ff0000;
  }
  /*th {
    color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
  }*/
</style>
@section('content')

<!-- View Table NPK -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      </div>
      <div class="box-body">
        <form id="edit-kl" action="{{ route('edit-invoice') }}" method="POST" class="invoice">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="form-group">
              <label for="bill_lcamount">Mata Uang &nbsp: {{ $data[0]->mata_uang }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Nilai Tagihan System : {{ number_format($data[0]->bill_lcamount) }}</label>
            </div>
            <div class="form-group">
              <label for="invoice_status">Invoice Status </label>
              <select id="frm_duration" name="invoice_status" class="form-control">
                <option value="">=====>Ubah Invoice Status<=====</option>
                <option @if($data[0]->invoice_status=='S'){{ 'selected' }}@else{{ '' }}@endif value="S">System</option>
                <option @if($data[0]->invoice_status=='C'){{ 'selected' }}@else{{ '' }}@endif value="C">Custom</option>
              </select>
            </div>
            <div id="divFrmC" class="form-group form-duration-div" style="display:none">
              <label for="nilai_custome">Nilai Tagihan Custom</label>
              <input id="nk" type="text" value="@if(isset($data[0]->nilai_custome)){{ $data[0]->nilai_custome }}@else{{ ''}}@endif" name="nilai_custome" class="form-control">
            </div>
            <div id="divFrm1C" class="form-group form-duration-div" style="display:none">
              <label for="no_invoice">Nomor Invoice </label>
              <input type="text" value="@if(isset($data[0]->no_invoice)){{ $data[0]->no_invoice }}@else{{ ''}}@endif" name="no_invoice" class="form-control" >
            </div>
            <div id="divFrm2C" class="form-group form-duration-div" style="display:none">
              <label for="catatan">Alasan Custom</label>
              <select id="catatan" name="catatan" class="form-control">
                <option value="">=====>Pilih Alasan Custome<=====</option>
                @foreach($ket as $dataket)
                <option value="{{$dataket->keterangan}}">{{$dataket->keterangan}}</option>
                @endforeach
              </select>
            </div>
          <div id="divFrm3C" class="form-group form-duration-div" style="display:none">
            <label for="scan">Upload Invoice Custom</label>
            <input id="scan" type="file" name="scan" class="form-control">
          </div>
            <input type="hidden" name="id" value="{{ $data[0]->id }}">
            <div class="form-group" style="text-align: right;">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
          </form>
      </div>  
      </div>
    </div>
  </div>
  <!-- End View Table NPK -->

  @endsection

  @section('scripts-edit-invoice')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
  $( "#frm_duration" ).change(function() {  
      updateDurationDivs();
            });
            
            // handle the updating of the duration divs
            function updateDurationDivs() {
                // hide all form-duration-divs
                $('.form-duration-div').hide();
                  
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm'+divKey).show();
                $('#divFrm1'+divKey).show();
                $('#divFrm2'+divKey).show();
                $('#divFrm3'+divKey).show();
            }        
        
            // run at load, for the currently selected div to show up
            updateDurationDivs();

  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
  
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
 
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
}

nk.addEventListener('keyup',function(e){
  nk.value = formatRupiah(this.value, ' ');
  nilai_custome.value = nk.value.replace(/[^,\d]/g, '').toString();
console.log(nilai_custome.value)
})
</script>

  <script type="text/javascript">
    $(function(){
    $('#datetimepicker').datetimepicker({format: 'M/D/YYYY HH:mm:ss A'});
  })
    $(document).ready( function () {
      $('#input-daterange').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      
      autoclose:true
      });

      $('#input-daterangee').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      autoclose:true
      });

      $('select').selectize({
    // sortField: 'text'
      });   
    });
</script>
@endsection
