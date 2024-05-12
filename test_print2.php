<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <title>CV Printable A4</title>
</head>

<body>
<!-- partial:index.partial.html -->
<html lang="et">

<head>
    <title>Curriculum Vitae</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Margus Lillemagi - Curriculum Vitae" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,700|Lato:400,300' type='text/css'>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        body {
            background: rgb(204, 204, 204);
        }

        page {
            background: #fff;
            display: block;
            margin: 0 auto;
            margin-bottom: 5mm;
            margin-top: 5mm;
        }

        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }

        @page {
            size: 210mm 297mm;
            margin: 0;
        }

        @media print {

            /* Print settings */
            html,
            body,
            page {
                width: 210mm;
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
            }

            .no-overflow {
                overflow: hidden;
            }

            #Header,
            #Footer {
                display: none !important;
            }

            button {
                display: none;
            }

            size: A4 portrait;
            /* ... the rest of the rules ... */
        }

        button {
            background-color: black;
            width: 245px;
            border: none;
            outline: 0;
            color: #fff;
            font-family: 'Oswald', Helvetica, Arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
            padding: 8px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 0px 550px;
            cursor: pointer;
            text-transform: uppercase
        }

        button:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            color: #da2d2d;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }

        #button {
            width: 210mm;
            height: 40px;
            position: fixed;
            z-index: 10;
            /* background: #da2d2d;
            border-bottom: solid #da2d2d 6px; */
            /* background: #000000;
            border-bottom: solid #000000 6px; */
            top: 19px;
            right: 1px
        }
        /* ***************************************************************** */
        .size-a4 { width: 8.3in; height: 11.7in; }
        .pdf-header-center {
            padding: 50px 0 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .test-pdf {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .pdf-header {
            position: absolute;
            top: 1in;
            height: .6in;
            left: .5in;
            right: .5in;
            border-bottom: 1px solid #e5e5e5;
        }
        .pdf-page {
            margin: 0 auto;
            box-sizing: border-box;
            box-shadow: 0 5px 10px 0 rgba(0,0,0,.3);
            color: #333;
            position: relative;

            /* background image add */
            /* background:#fff url(http://www.arabianhsr.com/en/images/footer.gif) bottom center no-repeat; */
            background-size:contain;

            /* background-color: #fff; */
        }
        .company-logo {
            /* font-size: 30px; */
            font-weight: bold;
            padding: 20px 0 0 0;
            /* color: #3aabf0; */
        }
        .invoice-number {
            padding-top: .17in;
            float: right;
        }
    </style>
</head>
<body id="top">
    <!--Page 1-->
    <page size="A4">
        <div id="button" class="no-print">
            <button type="button" onclick="myFunction()"><span class="button-txt"><i class="fa fa-print"
                        aria-hidden="true"></i>
                    &nbsp;Print</span></button>
            <script>
                function myFunction() {
                    window.print();
                }
            </script>
        </div>
        <div class="pdf-page size-a4">
            <div class="pdf-header-center">
                Center
            </div>
            <div class="test-pdf">
                <span>11111</span>
                <span>22222</span>
                <span>33333</span>
            </div>
            <div class="pdf-header">
                <span class="company-logo">
                    Blauer See Delikatessen
                </span>
                <span class="invoice-number">
                    Invoice #23543
                </span>
            </div>

            <table class="table table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="text-center" style="width: 60px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        <!-- No. -->
                        ลำดับ
                    </th>
                    <th class="text-center" style="font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        <!-- Package name -->
                        รายละเอียด
                    </th>
                    <th class="text-center" style="width: 100px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        <!-- Count. -->
                        จำนวนที่ซื้อ
                    </th>
                    <th class="text-center" style="width: 120px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        <!-- Unit Price -->
                        ราคา / หน่วย(บาท)
                        <!-- <br>
                        (@lang('global.currency')) -->
                    </th>
                    <th class="text-center" style="width: 100px;font-size: 12px;font-weight: 100px;text-transform: capitalize;">
                        <!-- Amount -->
                        จำนวนเงิน(บาท)
                        <!-- <br>
                        (@lang('global.currency')) -->
                    </th>
                </tr>
            </thead>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="table table-bordered border-primary">
                <thead>
                   <th>#</th>
                   <th>First</th>
                   <th>First</th>
                   <th>First</th>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        ...
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2" class="table-active">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 3px;">( Apisit Ngaosri )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        <!-- Prepared By -->
                        ผู้จัดทำ
                    </span>
                </div>
                <div class="mt-5 col-6 text-center">
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">....................................................</span>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: 5px;">( .................................................... )</span><br>
                    <span class="col d-flex justify-content-center" style="font-size: 12px;margin-top: -20px;">
                        <!-- Authorized by -->
                        ผู้รับมอบอำนาจ
                    </span>
                </div>
            </div>
        </div>

        <!-- <div class="cv">
            <div id="header">
                <div class="contactDetails">
                    <ul>
                        <li class="icon" title="Kirjuta mulle!"><a href="mailto:my@mail.ee"><i
                                    class="fa fa-envelope">&nbsp;&nbsp;</i>apisit.jovanovic@gmail.com</a></li>
                        <li class="icon" title="Helista mulle!"><a href="tel:1234567"><i class="fa fa-phone"
                                    aria-hidden="true"></i>&nbsp;&nbsp;1234567</a></li>

                    </ul>
                </div>
            </div>
            <div class="mainDetails">
                <div id="headshot">
                    <img id="avatar" src="https://visualangle.ee/delivery/temp_image/icon.png" alt="Margus Lillemagi" title="" />
                    <img id="avatar" src="https://w7.pngwing.com/pngs/895/199/png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png" alt="Margus Lillemagi" title="" />
                </div>
                <div id="name">
                    <h1>Apisit</br>Ngaosri<span class="nameDetails">&nbsp;&nbsp;9 February 1994</span></h1>
                </div>
                <div class="clear"></div>
            </div>
            <div id="mainArea">
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>Profiil</h1>
                        </div>
                        <div class="sectionContent">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="sectionTitle">
                        <h1>Teadmised & oskused</h1>
                    </div>
                    <div class="sectionContent">
                        <ul class="keySkills">
                            <li class="subDetails">Oskan hästi</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;HTML, CSS, JS</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Bootstrap</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;React</li>
                
                            <li class="subDetails">Oskan rahuldavalt</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;PHP, Python</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Django</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;SQL, MySQL</li>

                            <li class="subDetails">Täiendan</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Node.js, Go</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Docks</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Webpack</li>

                        </ul>
                    </div>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="sectionTitle">
                        <h1>Portfoolio & sotsiaalmeedia</h1>
                    </div>
                    <div class="sectionContent">
                        <ul class="clients">
                            <li title="Vaata minu koodi!"><a href="https://codepen.io" target="_blank">codepen.io</a></li>
                            <li title="Jälgi minu Facebook'i!"><a href="https://www.facebook.com" target="_blank">facebook.com</a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="sectionTitle">
                        <h1>Töökogemus</h1>
                    </div>
                    <div class="sectionContent">
                        <ul class="list">
                            <li><span class="subDetails">2018 - k.a.&nbsp;&nbsp;</span><span class="bold">Lorem Ipsum</span> - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</li>
                            <li><span class="subDetails">2010 - 2012&nbsp;&nbsp;</span><span class="bold">Lorem Ipsum</span>- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</li>
                            <li><span class="subDetails">2008 - k.a.&nbsp;&nbsp;</span><span class="bold">Lorem Ipsum</span> - veebi- ja multimeedia lahenduste kujundamine, arendamine ja haldamine ning klientide nõustamine.</li>
                            <li><span class="subDetails">1990 - 2008.&nbsp;&nbsp;</span><span class="bold">Lorem Ipsum</span> - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="sectionTitle">
                        <h1>Haridus</h1>
                    </div>
                    <div class="sectionContent">
                        <ul class="list">
                            <li><span class="subDetails">2017-2019&nbsp;&nbsp;</span>Lorem ipsum dolor sit amet, consectetur</li>
                            <li><span class="subDetails">2001-2002&nbsp;&nbsp;</span>Lorem ipsum dolor sit amet</li>
                            <li><span class="subDetails">1997-1999&nbsp;&nbsp;</span>Consectetur adipiscing elit</li>
                            <li><span class="subDetails">1975-1986&nbsp;&nbsp;</span>Adipiscing elit</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </section>
                <section>
                    <div class="sectionTitle">
                        <h1>Võõrkeeled</h1>
                    </div>
                    <div class="sectionContent">
                        <ul class="list">
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;inglise</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;saksa</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>&nbsp;vene</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </section>
            </div>
        </div> -->
    </page>
</body>
<html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
</script>