var products = new Array();
products[7234] = {count: 1, price: 15};
products[456435] = {count: 10, price: 67};
products[9859643] = {count: 15, price: 23};
products[234] = {count: 7, price: 300};
products[15135] = {count: 1, price: 150};

function calculate() {
    var result = 0;
    for(var key in products) {
        if (typeof products[key] != 'undefined') {
            result += products[key].count * products[key].price;
        }
    }
    return result;
}

var myEvent = window.attachEvent || window.addEventListener;
var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload';

myEvent(chkevent, function(e) {
    var result = calculate();
    console.log(calculate());
    var confirmationMessage = result;
    (e || window.event).returnValue = confirmationMessage;
    return confirmationMessage;
});