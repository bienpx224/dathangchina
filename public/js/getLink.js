function filterGetNumber(str){
	var thenum = str.match(/[+-]?\d+(\.\d+)?/g); // "3"
	return thenum;
}
function formatVND(number){
	var num = ''+number.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	return num;
}