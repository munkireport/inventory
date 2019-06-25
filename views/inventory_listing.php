<?php 

$this->view('listings/default',
[
  "i18n_title" => 'ard.listing.title',
  "js" => "
var getNameLink = function(colNumber, row){
    var cell = $('td:eq('+colNumber+')', row);
    var appName = cell.text();
    cell.html(
      $('<a>')
          .attr('href', appUrl+'/module/inventory/items/'+appName)
          .text(appName)
    )
}
var getVersionLink = function(colNumber, row){
  var cell = $('td:eq('+colNumber+')', row);
  var version = cell.text();
  var appName = $('td:eq('+(colNumber-1)+')', row).text();
  cell.html(
    $('<a>')
        .attr('href', appUrl+'/module/inventory/items/'+appName+'/'+version)
        .text(version)
  )
}
",
  "table" => [
    [
      "column" => "machine.computer_name",
      "i18n_header" => "listing.computername",
      "formatter" => "clientDetail",
    ],
    [
      "column" => "reportdata.serial_number",
      "i18n_header" => "serial",
    ],
    [
      "column" => "reportdata.long_username",
      "i18n_header" => "username",
    ],
    [
      "column" => "inventoryitem.name",
      "i18n_header" => "name",
      "formatter" => "getNameLink",
    ],
    [
      "column" => "inventoryitem.version",
      "i18n_header" => "version",
      "formatter" => "getVersionLink",
    ],
  ]
]);
