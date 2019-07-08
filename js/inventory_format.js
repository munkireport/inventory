// Global object to hold the variables
var inventoryVariables = {
  name: '',
  version: ''
}

// Init function
var initializeInventory = function(name, version){
  // Save the variables to the global space so the filter can use them
  inventoryVariables.name = name;
  inventoryVariables.version = version;
  if(name){
      // Set name on heading
      $('h3>span:first').text(name);

      if(version){
          // Add version to heading
          $('h3>span:first').text(name + ' ('+version+')');
      }
  }
}

// Filters
var inventoryFilter = function(colNumber, d){

  // Add where array to filter the results
  d.where = [];

  if(inventoryVariables.name){
      d.where.push({
          table: 'inventoryitem',
          column: 'name',
          value: inventoryVariables.name
      });

      if(inventoryVariables.version){
          d.where.push({
              table: 'inventoryitem',
              column: 'version',
              value: inventoryVariables.version
          });
      }
  }
}

// Formatters
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
