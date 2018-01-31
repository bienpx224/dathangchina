var page = require('webpage').create();
var system = require('system');
var url = system.args[1];
page.settings.userAgent = 'SpecialAgent';
page.open(url, function(status){
  //console.log("Status: " + status);
    page.onLoadFinished = function() {
      var link = page.evaluate(function() {
        return document.getElementById('J_PromoPriceNum').textContent;
      });
      console.log(link);
      phantom.exit();
    }
});
