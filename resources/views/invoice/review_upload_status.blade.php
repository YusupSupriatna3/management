@extends('layouts.app')

@section('google_fonts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">
    table tr th{
      background-color: #265a88;
      color: white;
    }
    table tr td{
      background-color: #265a88;
      color: white;
    }
    label,span{
        color: white;
    }
    #TableMitra_info{
        color: white;
    }
    select, input{
        color: black;
    }
    a#mitra_color{
        color: white;
    }
</style>

@endsection

@section('dashboard')
<small>Review Upload Status Invoice</small>
@endsection


@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-8">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <form action="{{ route('simpan-upload-invoice') }}" method="POST">
            {{ csrf_field() }}
            @foreach($reviewa as $datas)
                <input name="reviewAcc[]" type="hidden" value="{{$datas->account_number}}">
                <input name="reviewPeriod[]" type="hidden" value="{{$datas->periode}}">
                <input name="reviewStats[]" type="hidden" value="{{$datas->invoice_status}}">
            @endforeach
            <input type="submit" value="Simpan" class="btn btn-success" title="Simpan Upload">
            &nbsp
            <button class="btn btn-success" title="Batal Upload">
                <i class="fa fa-close">
                    <a href="{{route('view-upload-invoice')}}" style="color:white">Batal</a>
                </i>
            </button>
        </form>
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive" style="font-size:12px">
                <thead>
                  <tr><th nowrap>ACCOUNT NUMBER</th>
                      <th nowrap>PERIODE</th>
                      <th nowrap>INVOICE STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($reviewa as $datas)
                  <tr>
                      <td nowrap>{{ $datas->account_number }}</td>
                      <td nowrap>{{ $datas->periode }}</td>
                      <td nowrap>{{ $datas->invoice_status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('member_script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#TableMitra').DataTable();
    } );
</script>

@endsection
