<!-- <html>
<head>
<style type='text/css'>
html, body {
    font-family: 'myriad-pro-1', 'myriad-pro-2', Helvetica, Arial, Sans-Serif;
    margin-left: 20px;
    margin-right: 20px;
}
p.breakhere {
    page-break-before: always
}
table {
    border-collapse: collapse;
    page-break-inside: avoid
}
td {
    border: 1px solid #000
}
.noBorder {
    border: 0
}
#header {
    background:#ffffff url('gradient.png') no-repeat center center;
    height: 100px;
}
#text {
    position:relative;
    text-align:center;
}
</style>
</head>
<body>
<div id='header'>
    <div id='text'>
        SURAT PERNYATAAN PEMBAYARAN CUSTOMER TELKOM
        <hr>
    </div>
</div>
<table width='100%'>
    <tr style="text-align:center">
        <td>Nama CC</td>
        <td>Account</td>
        <td>Tagihan</td>
        <td>Tgl Flaging</td>
        <td>Jml Flaging</td>
        <td>No Rekening</td>
    </tr>
    <tr>
        <td width='30'>Ups Cardig International</td>
        <td width='30'><center>
                X
            </center></td>
        <td width='30'>&nbsp;</td>
        <td width='30'>&nbsp;</td>
        <td width='30'>&nbsp;</td>
        <td width='30'>Testing 12</td>
    </tr>
</table>
</body>
</html> -->

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
        img,tr.breakNow {page-break-inside: avoid;}
        div.breakNow { page-break-inside:avoid; page-break-after:always; }

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
                    <td>Gamya Rizki/720049</td>
                </tr>
                <tr>
                	<td>Jabatan</td>
                    <td>:</td>
                    <td>Manager ES Collection & Debt Mgt Seg C</td>
                </tr>
                
            </thead>
        </table>
                <span>Menyatakan bahwa customer Telkom di bawah ini telah melakukan pembayaran ke Telkom dengan rincian sebagai berikut :</span><br><br>
        @for ($i = 0; $i < 10; $i++)
        <table border="1px;" style="width: 75px;">
            <thead>
                <tr style="text-align: center;">
                    <th style="width: 100px;" nowrap>Nama CC</th>
                    <th style="width: 80px;" nowrap>Akun</th>
                    <th style="width: 100px;" nowrap>Tagihan</th>
                    <th style="width: 100px;" nowrap>Tgl Flaging</th>
                    <th style="width: 125px;" nowrap>Jumlah Bayar</th>
                    <th style="width: 150px;" nowrap>Rekening Mandiri</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>
            </tbody>
        </table>
        <div class="breakNow"></div>
        @endfor
        <br><br><br><br><br><br><br><br>
        <span style="margin-left: 500px;">Jakarta, 17 Desember 2020</span><br>
        <span style="margin-left: 450px;">MGR ES Collection & Debt Mgt Seg C</span><br><br><br><br><br><br>
        <div style="margin-left: 520px;">
        <span><u>Gamya Rizki</u></span><br>
        <span style="margin-left: 10px;">NIK.720049</span>
        </div>
    
    </body>
    </html>
