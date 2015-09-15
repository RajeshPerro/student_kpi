<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/15/15
 * Time: 1:53 PM
 */?>
<html>
<head>
    <script type="text/javascript">
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>

</head>
<body>
<table id="testTable">
    <thead>
    <tr>
        <th>name</th>
        <th>place</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>adfas</td>
        <td>asdfasf</td>
    </tr>
    </tbody>
</table>
<input type="button" onclick="tableToExcel('testTable')" value="Export to Excel">
</body>
</html>

