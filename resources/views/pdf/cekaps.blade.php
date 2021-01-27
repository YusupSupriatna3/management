<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Cek AP</title>
    <style>
    /* --------------------------------------------------------------

    Hartija Css Print  Framework
    * Version:   1.0

    -------------------------------------------------------------- */

    body {
        width:100% !important;
        margin:0 !important;
        padding:0 !important;
        line-height: 1.45;
        font-family: Garamond,"Times New Roman", serif;
        color: #000;
        background: none;
        font-size: 14pt; }

        /* Headings */
        h1,h2,h3,h4,h5,h6 { page-break-after:avoid; }
        h1{font-size:19pt;}
        h2{font-size:17pt;}
        h3{font-size:15pt;}
        h4,h5,h6{font-size:14pt;}


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
        table { margin: 1px; text-align:left; }
        th { border-bottom: 1px solid #333;  font-weight: bold; }
        td { border-bottom: 1px solid #333; }
        th,td { padding: 4px 10px 4px 0; }
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
        <h1>Data Account</h1>
        <hr>
        <table>
            <thead>
                <tr>
                        <td>partner</td>
                        <td>ca</td>
                        <td>idnumber</td>
                        <td>bpext</td>
                        <td>nipnas</td>
                        <td>account_name</td>
                        <td>bpname</td>
                        <td>produk</td>
                        <td>bpstatus</td>
                        <td>bpinext</td>
                        <td>cfu</td>
                        <td>ubis</td>
                        <td>segmen</td>
                        <td>subsegmen</td>
                        <td>bisnis_area</td>
                        <td>business_share</td>
                        <td>divisi</td>
                        <td>witel</td>
                        <td>ba_trems</td>
                        <td>nfact</td>
                        <td>fikey</td>
                        <td>bill_doc</td>
                        <td>bill_type</td>
                        <td>bill_period</td>
                        <td>bill_post_date</td>
                        <td>bill_doc_date</td>
                        <td>nper</td>
                        <td>due_date</td>
                        <td>subproduk</td>
                        <td>tr_type</td>
                        <td>l11_seq</td>
                        <td>l11_element</td>
                        <td>bill_element</td>
                        <td>hkont</td>
                        <td>zzaccount</td>
                        <td>zzhkont</td>
                        <td>idrev</td>
                        <td>prod_seq</td>
                        <td>prod_sid</td>
                        <td>bill_curr</td>
                        <td>bill_jenis</td>
                        <td>bill_sign</td>
                        <td>cl_doc</td>
                        <td>cl_type</td>
                        <td>cl_period</td>
                        <td>cl_post_date</td>
                        <td>cl_doc_date</td>
                        <td>cl_status</td>
                        <td>cl_jenis</td>
                        <td>cl_user</td>
                        <td>cl_fikey</td>
                        <td>cl_id</td>
                        <td>cl_loket</td>
                        <td>cl_hkont</td>
                        <td>ba_pay</td>
                        <td>cl_curr</td>
                        <td>invstatus</td>
                        <td>invdocno</td>
                        <td>inv_period</td>
                        <td>inv_date</td>
                        <td>inv_due_date</td>
                        <td>bill_dcamount</td>
                        <td>bill_lcamount</td>
                        <td>cl_dcamount</td>
                        <td>cl_lcamount</td>
                        <td>cl_cash</td>
                        <td>cl_non_cash</td>
                        <td>keterangan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($cekaps as $cekap)
                    <tr>
                        <td>{{$cekap->partner}}</td>
                        <td>{{$cekap->ca}}</td>
                        <td>{{$cekap->idnumber}}</td>
                        <td>{{$cekap->bpext}}</td>
                        <td>{{$cekap->nipnas}}</td>
                        <td>{{$cekap->account_name}}</td>
                        <td>{{$cekap->bpname}}</td>
                        <td>{{$cekap->produk}}</td>
                        <td>{{$cekap->bpstatus}}</td>
                        <td>{{$cekap->bpinext}}</td>
                        <td>{{$cekap->cfu}}</td>
                        <td>{{$cekap->ubis}}</td>
                        <td>{{$cekap->segmen}}</td>
                        <td>{{$cekap->subsegmen}}</td>
                        <td>{{$cekap->bisnis_area}}</td>
                        <td>{{$cekap->business_share}}</td>
                        <td>{{$cekap->divisi}}</td>
                        <td>{{$cekap->witel}}</td>
                        <td>{{$cekap->ba_trems}}</td>
                        <td>{{$cekap->nfact}}</td>
                        <td>{{$cekap->fikey}}</td>
                        <td>{{$cekap->bill_doc}}</td>
                        <td>{{$cekap->bill_type}}</td>
                        <td>{{$cekap->bill_period}}</td>
                        <td>{{$cekap->bill_post_date}}</td>
                        <td>{{$cekap->bill_doc_date}}</td>
                        <td>{{$cekap->nper}}</td>
                        <td>{{$cekap->due_date}}</td>
                        <td>{{$cekap->subproduk}}</td>
                        <td>{{$cekap->tr_type}}</td>
                        <td>{{$cekap->l11_seq}}</td>
                        <td>{{$cekap->l11_element}}</td>
                        <td>{{$cekap->bill_element}}</td>
                        <td>{{$cekap->hkont}}</td>
                        <td>{{$cekap->zzaccount}}</td>
                        <td>{{$cekap->zzhkont}}</td>
                        <td>{{$cekap->idrev}}</td>
                        <td>{{$cekap->prod_seq}}</td>
                        <td>{{$cekap->prod_sid}}</td>
                        <td>{{$cekap->bill_curr}}</td>
                        <td>{{$cekap->bill_jenis}}</td>
                        <td>{{$cekap->bill_sign}}</td>
                        <td>{{$cekap->cl_doc}}</td>
                        <td>{{$cekap->cl_type}}</td>
                        <td>{{$cekap->cl_period}}</td>
                        <td>{{$cekap->cl_post_date}}</td>
                        <td>{{$cekap->cl_doc_date}}</td>
                        <td>{{$cekap->cl_status}}</td>
                        <td>{{$cekap->cl_jenis}}</td>
                        <td>{{$cekap->cl_user}}</td>
                        <td>{{$cekap->cl_fikey}}</td>
                        <td>{{$cekap->cl_id}}</td>
                        <td>{{$cekap->cl_loket}}</td>
                        <td>{{$cekap->cl_hkont}}</td>
                        <td>{{$cekap->ba_pay}}</td>
                        <td>{{$cekap->cl_curr}}</td>
                        <td>{{$cekap->invstatus}}</td>
                        <td>{{$cekap->invdocno}}</td>
                        <td>{{$cekap->inv_period}}</td>
                        <td>{{$cekap->inv_date}}</td>
                        <td>{{$cekap->inv_due_date}}</td>
                        <td>{{$cekap->bill_dcamount}}</td>
                        <td>{{$cekap->bill_lcamount}}</td>
                        <td>{{$cekap->cl_dcamount}}</td>
                        <td>{{$cekap->cl_lcamount}}</td>
                        <td>{{$cekap->cl_cash}}</td>
                        <td>{{$cekap->cl_non_cash}}</td>
                        <td>{{$cekap->keterangan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    </html>
