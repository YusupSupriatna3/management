<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Surat Pernyataan Pembayaran</title>
    <style>
    /* --------------------------------------------------------------

    Hartija Css Print  Framework
    * Version:   1.0

    -------------------------------------------------------------- */

    body {
        width:100% !important;
        margin:0 !important;
        padding:0 !important;
        line-height: 1;
        font-family: Garamond,"Times New Roman", serif;
        color: #000;
        background: none;
        font-size: 12pt; }

        /* Headings */
        h1,h2,h3,h4,h5 { page-break-after:avoid; }
        h1{font-size:19pt;}
        h2{font-size:17pt;}
        h3{font-size:15pt;}
        h4,h5,h6{font-size:12pt;}


        p, h2, h3 { orphans: 3; widows: 3; }

        code { font: 12pt Courier, monospace; }
        blockquote { margin: 1.2em; padding: 1em;  font-size: 12pt; }
        hr { background-color: #ccc; }

        /* Images */
        img { float: left; margin: 1em 1.5em 1.5em 0; max-width: 100% !important; }
        a img { border: none; }

        /* Links */
        a:link, a:visited { background: transparent; font-weight: 700; text-decoration: underline;color:#333; }
        a:link[href^="http://"]:after, a[href^="http://"]:visited:after { content: " (" attr(href) ") "; font-size: 90%; }

        abbr[title]:after { content: " (" attr(title) ")"; }

        /* Don't show linked images  */
        a[href^="http://"] {color:#000; }
        a[href$=".jpg"]:after, a[href$=".jpeg"]:after, a[href$=".gif"]:after, a[href$=".png"]:after { content: " (" attr(href) ") "; display:none; }

        /* Don't show links that are fragment identifiers, or use the `javascript:` pseudo protocol .. taken from html5boilerplate */
        a[href^="#"]:after, a[href^="javascript:"]:after {content: "";}

        /* Table */
        table { margin: 1px; border-collapse: collapse; }
        th { border: 1px solid #333;  font-weight: bold; text-align:center;}
        th,td { padding: 4px 10px 4px 0; }
        p { padding: 4px 10px 4px 0; }
        tfoot { font-style: italic; }
        caption { background: #fff; margin-bottom:2em; text-align:left; }
        thead {display: table-header-group;}
        img,tr {page-break-inside: avoid;}

        /* Hide various parts from the site
        #header, #footer, #navigation, #rightSideBar, #leftSideBar
        {display:none;}
        */
        </style>
    </head>
    <body>
   
 <h5><center>SURAT PERNYATAAN PEMBAYARAN CUSTOMER TELKOM</center></h5>
        <hr>
        <p>Yang bertanda tangan di bawah ini :</p>
        <table>
            <thead>
            	<tr>
                	<td>Nama/NIK</td>
                    <td>:</td>
                    <td>{{ $res->manager_name }}/{{ $res->nik }}</td>
                </tr>
                <tr>
                	<td>Jabatan</td>
                    <td>:</td>
                    <td>Manager ES Collection & Debt Mgt Seg {{ $res->segmen }}</td>
                </tr>
                
            </thead>
        </table>
                <span>Menyatakan bahwa customer Telkom di bawah ini telah melakukan pembayaran ke Telkom dengan rincian sebagai berikut :</span><br><br>
        <table border="1px;" style="width: 75px;">
            <thead>
                <tr style="text-align: center;">
                    <th style="text-align: center;width: 150px;" nowrap>Nama CC</th>
                    <th style="text-align: center;width: 50px;" nowrap>Account</th>
                    <th style="text-align: center;width: 50px;" nowrap>Tagihan</th>
                    <th style="text-align: center;width: 50px;" nowrap>Tgl RC</th>
                    <th style="text-align: center;width: 150px;" nowrap>Jumlah Bayar</th>
                    <th style="text-align: center;width: 150px;" nowrap>No Rekening</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($data as $datas)
                    <tr>
                        <td style="text-align: center;" nowrap>{{ $datas->account_name }}</td>
                        <td style="text-align: center;" nowrap>{{ $datas->idnumber }}</td>
                        @if(substr($datas->nper,4)=='01')
                            <td style="text-align: center;" nowrap>{{ 'Jan`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='02')
                            <td style="text-align: center;" nowrap>{{ 'Feb`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='03')
                            <td style="text-align: center;" nowrap>{{ 'Mar`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='04')
                            <td style="text-align: center;" nowrap>{{ 'Apr`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='05')
                            <td style="text-align: center;" nowrap>{{ 'Mei`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='06')
                            <td style="text-align: center;" nowrap>{{ 'Jun`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='07')
                            <td style="text-align: center;" nowrap>{{ 'Jul`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='08')
                            <td style="text-align: center;" nowrap>{{ 'Ags`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='09')
                            <td style="text-align: center;" nowrap>{{ 'Sep`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='10')
                            <td style="text-align: center;" nowrap>{{ 'Okt`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='11')
                            <td style="text-align: center;" nowrap>{{ 'Nov`'.substr($datas->nper,2,2) }}</td>
                        @elseif(substr($datas->nper,4)=='12')
                            <td style="text-align: center;" nowrap>{{ 'Des`'.substr($datas->nper,2,2) }}</td>
                        @endif
                        
                        <td style="text-align: center;" nowrap>{{ date('d/m/Y',strtotime($datas->cl_post_date)) }}</td>
                        <td style="text-align: center;" nowrap>{{ number_format($datas->total_cash) }}</td>
                        <td style="text-align: center;" nowrap>{{ $datas->cl_hkont }}</td>
                    </tr>
                @endforeach                   
            </tbody>
        </table><br><br><br><br><br><br><br><br>
        <span style="margin-left: 500px;">Jakarta, {{ $tgl }}</span><br>
        <span style="margin-left: 450px;">MGR ES Collection & Debt Mgt Seg {{ $res->segmen }}</span><br><br><br><br><br><br>
        <div style="margin-left: 520px;">
        <span><u>{{ $res->manager_name }}</u></span><br>
        <span style="margin-left: 10px;">NIK.{{ $res->nik }}</span>
        </div>
    
    </body>
    </html>
