<html>
<head>

<title>...</title>
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css">
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css">
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.mobile.min.css">
<style type="text/css">
html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
.kakao {
  width: 500px;
  height: 100px;
  /* background:url(./kakao.png) no-repeat;  */
  /*background-size:contain;*/
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
.pdf-header {
  position: absolute;
  top: .5in;
  height: .6in;
  left: .5in;
  right: .5in;
  border-bottom: 1px solid #e5e5e5;
}
.invoice-number {
  padding-top: .17in;
  float: right;
}
.pdf-footer {
  position: absolute;
  bottom: .5in;
  height: .6in;
  left: .5in;
  right: .5in;
  padding-top: 10px;
  border-top: 1px solid #e5e5e5;
  text-align: left;
  color: #787878;
  font-size: 12px;
}
.pdf-body {
  position: absolute;
  top: 3.7in;
  bottom: 1.2in;
  left: .5in;
  right: .5in;
}

.size-a4 { width: 8.3in; height: 11.7in; }
.size-letter { width: 8.5in; height: 11in; }
.size-executive { width: 7.25in; height: 10.5in; }

.company-logo {
  font-size: 30px;
  font-weight: bold;
  color: #3aabf0;
}
.for {
  position: absolute;
  top: 1.5in;
  left: .5in;
  width: 2.5in;
}
.from {
  position: absolute;
  top: 1.5in;
  right: .5in;
  width: 2.5in;
}
.from p, .for p {
  color: #787878;
}
.signature {
  padding-top: .5in;
}
.box-col {
  float: left;
}
</style>
</head>
<body>

<div id="example">
    <div class="box wide hidden-on-narrow">
        <div class="box-col">
        <select id="paper" style="width: 100px;">
            <option value="size-a4" selected>A4</option>
            <option value="size-letter">Letter</option>
            <option value="size-executive">Executive</option>
        </select>
        </div>
        <div class="box-col">
        <button class="export-pdf k-button" onclick="getPDF('.pdf-page')">Export</button>
        </div>
        <div class="box-col">
        <button class="export-pdf k-button" onclick="getPrint('.pdf-page')">Print</button>
        </div>    
    </div>
    <div class="page-container hidden-on-narrow">
        <div class="pdf-page size-a4">
        <div class="pdf-header">
            <span class="company-logo">
            Blauer See Delikatessen
            </span>
            <span class="invoice-number">Invoice #23543</span>
        </div>
        <div class="pdf-footer">
            <p>Blauer See Delikatessen<br />
            Lutzowplatz 456<br />
            Berlin, Germany,  10785
            </p>
        </div>
        <div class="for">
            <h3>Invoice For</h3>
            <p>Antonio Moreno<br />
            Naucalpan de Juarez<br />
            Mexico D.F., Mexico, 53500
            </p>
        </div>

        <div class="from">
            <h3>From</h3>
            <p style="padding-bottom: 20px; border-bottom: 1px solid #e5e5e5;">Hanna Moos <br />
            Lutzowplatz 456<br />
            Berlin, Germany,  10785
            </p>
            <p style="padding-top: 20px;">
            Invoice ID: 23543<br />
            Invoice Date: 12.03.2014<br />
            Due Date: 27.03.2014
            </p>
        </div>
        <div class="pdf-body">
            <div id="grid"></div>
            <!-- <p style="color: blue;"> image </p>
            <img src="http://www.arabianhsr.com/en/images/footer.gif" style="width: 400px; height: 50px;">
            <p style="color: blue;"> backgroupd image </p> -->
            <div class="kakao"></div>
        </div>

        </div>
    </div>
    <div class="responsive-message"></div>
</div>

<?php
require_once "accounting.php";
require_once "programmer.php";

$emp1 = new Accounting("เจน", "บัญชี", 20000);
$emp1->showData();

$emp2 = new Programmer("เชษฐ์", "ติดต่อระหว่งประเทศ", 50000);
$emp2->showData();

?>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>

<script>
    function getPDF(selector) {
  kendo.drawing.drawDOM($(selector)).then(function(group){
    kendo.drawing.pdf.saveAs(group, "Invoice.pdf");
  });
}

function getPrint(selector) {
  w = window.open();
  w.document.write($(selector).html());
  w.print();
  w.close();
}

$(document).ready(function() {
  var data = [
    { productName: "QUESO CABRALES", unitPrice: 21, qty: 5 },
    { productName: "ALICE MUTTON", unitPrice: 39, qty: 7 },
    { productName: "GENEN SHOUYU", unitPrice: 15.50, qty: 3 },
    { productName: "CHARTREUSE VERTE", unitPrice: 18, qty: 1 },
    { productName: "MASCARPONE FABIOLI", unitPrice: 32, qty: 2 },
    { productName: "VALKOINEN SUKLAA", unitPrice: 16.25, qty: 3 }
  ];
  var schema = {
    model: {
      productName: { type: "string" },
      unitPrice: { type: "number", editable: false },
      qty: { type: "number" }
    },
    parse: function (data) {
      $.each(data, function(){
        this.total = this.qty * this.unitPrice;
      });
      return data;
    }
  };
  var aggregate = [
    { field: "qty", aggregate: "sum" },
    { field: "total", aggregate: "sum" }
  ];
  var columns = [
    { field: "productName", title: "Product", footerTemplate: "Total"},
    { field: "unitPrice", title: "Price", width: 120},
    { field: "qty", title: "Pcs.", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" },
    { field: "total", title: "Total", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" }
  ];
  var grid = $("#grid").kendoGrid({
    editable: false,
    sortable: true,
    dataSource: {
      data: data,
      aggregate: aggregate,
      schema: schema,
    },
    columns: columns
  });

  $("#paper").kendoDropDownList({
    change: function() {
      $(".pdf-page")
        .removeClass("size-a4")
        .removeClass("size-letter")
        .removeClass("size-executive")
        .addClass(this.value());
    }
  });
});
</script>