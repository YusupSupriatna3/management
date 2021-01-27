<!DOCTYPE html>
<html>
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
            @foreach ($arr as $data)
                @foreach ($data['details'] as $datas)
                @endforeach
            @endforeach
            	<tr>
                	<td>Nama/NIK</td>
                    <td>:</td>
                    <td>/</td>
                </tr>
                <tr>
                	<td>Jabatan</td>
                    <td>:</td>
                    <td>Manager ES Collection & Debt Mgt Seg </td>
                </tr>
                
            </thead>
        </table>
                <p>menyatakan bahwa customer Telkom di bawah ini telah melakukan pembayaran ke Telkom dengan rincian sebagai berikut :</p>
        <table border="1px;">
            <thead>
                <tr>
                    <th>Nama CC</th>
                    <th>Account</th>
                    <th>Tagihan</th>
                    <th>Tgl RC</th>
                    <th>Jumlah Bayar</th>
                    <th>No Rek Mandiri</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($arr as $data)
                @foreach ($data['details'] as $datas)
            		<tr style="text-align:center;">
                        <td rowspan="3">{{$datas->customer}}</td>
                        <td>{{$datas->accnum}}</td>
                        <td>{{$datas->m_date}}</td>
                        <td>{{ date('d/m/Y', strtotime($datas->date_rc)) }}</td>
                    	<td>{{$datas->amount}}</td>
                    	<td>10300042100122</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        <p align='right'>Jakarta,{{ date('d F Y') }}</p>
        <p align='right'>MGR ES Collection & Debt Mgt Seg </p><br><br>
        <p align='right'></p>
        <p align='right'>NIK.</p>
    
    </body>
    </html>
