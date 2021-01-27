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
    Cek Pembayaran Ap
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
      
        <form action="{{ route('search-payment') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            
            <div class="form-group">
              <label class="col-md-4 control-label">NOMOR KL</label>
              <div class="col-md-6">
                <select id="nomorkl" name="nomorkl" class="form-control select2" placeholder="PILIH NOMOR KL">
                <option value="">PILIH NOMOR KL</option>
                  @foreach($nomorkls as $kl)
                    <option value="{{ $kl->nomor_kl }}">{{ $kl->nomor_kl }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">ACCOUNT</label>
              <div class="col-md-6">
                <select id="accnum" name="accnum" class="form-control select2" placeholder="PILIH ACCOUNT">
                <option value="">PILIH ACCOUNT</option>
                  @foreach($accounts as $account)
                    <option value="{{ $account->accnum }}">{{ $account->accnum }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-4">
                <button type="submit" id="cari_pks" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>
 

      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><a target="_blank" href="{{ route('export.paymentneed') }}"><button id="download" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="fa fa-download" aria-hidden="true"></span> Download Surat Pernyataan Pembayaran</button></a></h3>
        <h3 class="box-title pull-right"><a href="{{ URL('/paymentneed') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
      </div>
      </div>
  <div style="overflow-x:auto;">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th nowrap style="text-align: center;">NOMOR_KL</th>
                <th nowrap style="text-align: center;">PAYMENTID</th>
                <th nowrap style="text-align: center;">TYPETRANS</th>
                <th nowrap style="text-align: center;">BABILL</th>
                <th nowrap style="text-align: center;">DESKRIPSI</th>
                <th nowrap style="text-align: center;">ACCOUNT</th>
                <th nowrap style="text-align: center;">CUSTOMER</th>
                <th nowrap style="text-align: center;">CUR</th>
                <th nowrap style="text-align: center;">AMOUNT</th>
                <th nowrap style="text-align: center;">PRODUCT</th>
                <th nowrap style="text-align: center;">USERFLG</th>
                <th nowrap style="text-align: center;">CLEARINGDOC</th>
                <th nowrap style="text-align: center;">FLAGDATE</th>
                <th nowrap style="text-align: center;">BANK_ACCOUNT</th>
                <th nowrap style="text-align: center;">DATE_RC</th>
                <th nowrap style="text-align: center;">KETERANGAN</th>
                <th nowrap style="text-align: center;">POSTDATE</th>
                <th nowrap style="text-align: center;">POTPPN</th>
                <th nowrap style="text-align: center;">POTPPH</th>
                <th nowrap style="text-align: center;">POTLAIN</th>
                <th nowrap style="text-align: center;">REVERSEDOC</th>
                <th nowrap style="text-align: center;">REVERSEDATE</th>
                <th nowrap style="text-align: center;">NODOC</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $datas)
              <tr role="row" class="odd">
                <td nowrap style="text-align: center;">{{$datas->nomor_kl}}</td>
                <td nowrap style="text-align: center;">{{$datas->paymentid}}</td>
                <td nowrap style="text-align: center;">{{$datas->typetrans}}</td>
                <td nowrap style="text-align: center;">{{$datas->babill}}</td>
                <td nowrap style="text-align: center;">{{$datas->deskripsi}}</td>
                <td nowrap style="text-align: center;">{{$datas->accnum}}</td>
                <td nowrap style="text-align: center;">{{$datas->customer}}</td>
                <td nowrap style="text-align: center;">{{$datas->cur}}</td>
                <td nowrap style="text-align: center;">{{$datas->amount}}</td>
                <td nowrap style="text-align: center;">{{$datas->product}}</td>
                <td nowrap style="text-align: center;">{{$datas->userflg}}</td>
                <td nowrap style="text-align: center;">{{$datas->clearingdoc}}</td>
                <td nowrap style="text-align: center;">{{$datas->flagdate}}</td>
                <td nowrap style="text-align: center;">{{$datas->bank_account}}</td>
                <td nowrap style="text-align: center;">{{$datas->date_rc}}</td>
                <td nowrap style="text-align: center;">{{$datas->keterangan}}</td>
                <td nowrap style="text-align: center;">{{$datas->postdate}}</td>
                <td nowrap style="text-align: center;">{{$datas->potppn}}</td>
                <td nowrap style="text-align: center;">{{$datas->potpph}}</td>
                <td nowrap style="text-align: center;">{{$datas->potlain}}</td>
                <td nowrap style="text-align: center;">{{$datas->reversedoc}}</td>
                <td nowrap style="text-align: center;">{{$datas->reversedate}}</td>
                <td nowrap style="text-align: center;">{{$datas->nodoc}}</td>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript">
            // jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#accnum').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('paymentneed.account') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'accnum':query},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#accnum_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#accnum').val(value);
                    // after click is done, search results segment is made empty
                    $('#accnum_list').html("");
                });
            });
        </script>
  
@endsection