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
