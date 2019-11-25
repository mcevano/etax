function WholeNumWithComma(num) {
    if (num != 0) {
        return parseInt(num.replace(/,/g, ''), 10);
    } else {
        return parseInt(num, 10)
    }
}

function TrimAmountComma(num) {
    var temp = num.replace(/,/g, '');
    var number = Number(temp);
    var returnValue = {};
    var regExp = /^0[0-9].*$/

    if (isNaN(number) || num === "" || number === 0 || num.indexOf(0).toString() === "0") {
        returnValue = num;
    } else {
        returnValue = number;
    }

    return returnValue;
}

function NumWithParenthesis(num) {
    return num.replace('(', '-').replace(')', '');
}

function isNumeric(num) {
    return !isNaN(num)
}

function checkNumValue(num) {
    var isNumber = isNumeric(NumWithComma(NumWithParenthesis(num.value)));
    if (num.value === '' || num.value < 0 || !isNumber || NumWithComma(NumWithParenthesis(num.value)) < 0) {
        num.value = "0";
    } else {
        num.value = (num.value).replace(/^0+(?!\.|$)/, '').replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
}

function number(num) {
    var key;
    var keychar;

    if (window.event) {
        key = window.event.keyCode;
    } else if (num) {
        key = num.which;
    } else {
        return true;
    }
    keychar = String.fromCharCode(key);

    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
        return true;
    } else if ((("0123456789-").indexOf(keychar) > -1)) {
        return true;
    } else
        return false;
}

function addCommas(intNum) {
    return (intNum + '').replace(/(\d)(?=(\d{3})+$)/g, '$1,');
}

function NegativeValue(number) {
    var positveSign = true;
    var resultStr = '';
    num = number.toString().replace(/\$|\,/g, '');
    if ((num.indexOf('-') >= 0) && !isNaN(num)) {
        num = Math.abs(num).toString();
        positveSign = false;
    }
    if (positveSign == false) {
        if (num.indexOf('.') > 0 && num > 0) {
            var parts = num.toString().split('.');
            num = parts[0];
        }
        if (isNaN(num))
            num = "0";
        //alert(num);
        if ((num != "0") && (num != "0.00")) {
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
        } else {
            num = "0";
        }

        resultStr = (((positveSign) ? '' : '(') + num + ((positveSign) ? '' : ')'));
    } else
        resultStr = number;

    return resultStr;

}

function capitalize(a) {
    a.value = $.trim(a.value.toUpperCase());
}

function formatCurrencyWOC(number) {

    num = number.toString().replace(/\$|\,/g, '');
    if (num.indexOf('.') > 0 && num > 0) {
        var parts = num.toString().split('.');
        parts[0].length;
        if (parts[0].length > 16) {
            num = parts[0].substring(0, 16) + '.' + parts[1];
        }
    } else if (num.indexOf('.') > 0 && num < 0) {
        var parts = num.toString().split('.');
        parts[0].length;
        if (parts[0].length > 13) {
            num = parts[0].substring(0, 16) + '.' + parts[1];
        }
    } else {
        if (num > 0 && num.length > 16) {
            num = num.substring(0, 16);
        }
    }

    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' +
        num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num);

}

function formatDisplayAmount(a) {
    var controlValue = formatCurrencyWOC(a.value);
    a.value = formatCurrencyWOC(a.value);

}

function lettersOnly(e) {
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();

    // control keys
    if ((key == null) || (key == 0) || (key == 8) ||
        (key == 9) || (key == 13) || (key == 27))
        return true;

    // alphabets
    else if ((("abcdefghijklmnopqrstuvwxyz").indexOf(keychar) > -1))
        return true;
    else
        return false;
}

function moveToNext(elem, length) {
    if ($.trim(elem.value) !== "" && $.trim(elem.value).length === length) {
        $(elem).next().select();
    }
}

function dateMasking(elem) {
    var key;
    var v = elem.value;
    // alert(v);
    key = window.event.keyCode;
    if (key == 191) {
        // alert(elem.value.length);
        if (elem.value.length == 1) {
            elem.value = '0' + v;
        } else if (elem.value.length == 3) {

        }

    } else if (key != 8) {
        if (v.match(/^\d{2}$/) !== null) {
            elem.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            elem.value = v + '/';
        }
    }
}

function dateMaskingMonthYear(elem) {
    var key;
    var v = elem.value;
    // alert(v);
    key = window.event.keyCode;
    if (key == 191) {
        // alert(elem.value.length);
        if (elem.value.length == 1) {
            elem.value = '0' + v;
        } else if (elem.value.length == 3) {

        }

    } else if (key != 8) {
        if (v.match(/^\d{2}$/) !== null) {
            elem.value = v + '/';
        }
    }
}
// experimental don't use

function splitFullname(fullname) {
    var lastname = '';
    var firstname = '';
    var middleName = '';

    //alert(fullname);
    var Name = fullname.split(',');
    //alert(fullname);
    //  alert(Name[0] + ' ' + Name[1] + ' ' + Name[2]);
    lastname = Name[0];
    //  alert(Name.length);
    if (Name.length == 1) {
        Name = fullname.split(' ');
        //		alert(Name.length);	
        for (i = 0; i < Name.length - 1; i++) {
            if (i == 0) {
                lastname = Name[i];
            }
            if (i == 1) {
                firstname = Name[i];
            } else {
                firstname = firstname + ' ' + Name[i];
            }
        }
        if (Name.length > 1) {
            if (Name[Name.length - 1].length > 1) {
                middleName = Name[Name.length - 1].charAt(0);
            } else {
                middleName = Name[Name.length - 1];
            }
        }

    } else if (Name.length == 2) {
        nextname = Name[1].trim().split(' ');

        //alert(nextname.length);
        if (nextname.length == 1) {
            firstname = nextname[0];
        } else if (nextname.length >= 2) {
            for (i = 0; i < nextname.length - 1; i++) {
                if (i == 0) {
                    firstname = nextname[i];
                } else {
                    firstname = firstname + ' ' + nextname[i];
                }
            }

            if (nextname[nextname.length - 1].length > 1) {
                middleName = nextname[nextname.length - 1].charAt(0);
            } else {
                middleName = nextname[nextname.length - 1];
            }
        }
    } else if (Name.length >= 3) {
        firstname = Name[1];
        //alert(firstname);
        nextname = Name[2].trim().split(' ');
        // alert(nextname.length);
        if (nextname.length == 1) {
            if (nextname[0].length > 1) {
                middleName = nextname[0].charAt(0);
            } else {
                middleName = nextname[0];
            }
        } else if (nextname.length >= 2) {
            for (i = 0; i <= nextname.length - 1; i++) {

                if (nextname[i].length == 2 && i == 0) {
                    firstname += ' ' + nextname[i];
                } else if (nextname[i].length > 1 && i == 0) {
                    middleName = nextname[i].charAt(0);
                } else if (nextname[i].length == 1 && i == 0) {
                    middleName = nextname[i];
                }
            }
        }

    }


    return (lastname + ',' + firstname + ',' + middleName);
}
// Address: A-Z, 0-9, space,#-.,'\(\)

function Address(e) {
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();

    // control keys
    if ((key == null) || (key == 0) || (key == 8) ||
            (key == 9) || (key == 13) || (key == 27))
        return true;

    // alphas and numbers
    else if (((".,#@'()_- abcdefghijklmnopqrstuvwxyz0123456789").indexOf(keychar) > -1))
        return true;
    else
        return false;

}
//email address: A-Z,a-z,0-9,@_-.

function emailAddress(e) {
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();

    // control keys
    if ((key == null) || (key == 0) || (key == 8) ||
            (key == 9) || (key == 13) || (key == 27))
        return true;

    // alphas and numbers
    else if (((".,#@'()_- abcdefghijklmnopqrstuvwxyz0123456789").indexOf(keychar) > -1))
        return true;
    else
        return false;

}
//name: A-Z and space

function Name(e) {
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();

    // control keys
    if ((key == null) || (key == 0) || (key == 8) ||
            (key == 9) || (key == 13) || (key == 27))
        return true;

    // alphas and numbers
    else if (((".,#@'()_- abcdefghijklmnopqrstuvwxyz0123456789").indexOf(keychar) > -1))
        return true;
    else
        return false;

}
//Code: A-Z,0-9, space

function Code(e) {
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();

    // control keys
    if ((key == null) || (key == 0) || (key == 8) ||
        (key == 9) || (key == 13) || (key == 27))
        return true;

    // alphas and numbers
    else if (((".,#@'()_- abcdefghijklmnopqrstuvwxyz0123456789").indexOf(keychar) > -1))
        return true;
    else
        return false;

}

function splitAddressInfo(s, limit) {
    var ret = '';
    var x = 0;
    var l = 0;
    //alert(s);
    try {
        for (i = 0; i < s.length; i++) {
            if (x <= limit) {
                ret += s.charAt(i);
                l++;
                x++;
                if (x > (limit - 2) && s[i] == ' ') {
                    ret += '|';
                    x = 0;
                }
            } else {
                ret += s.charAt(i);
                ret += '|';
                x = 0;
            }

        }
    } catch (e) {
        //  alert('catch');
    }
    return ret;
}

function roundBillion(number, dec) {

    if (isAmountWithinAllowedPrecision(number)) {

        num = number.value.toString().replace(/\$|\,/g, '');
        alert(num);
        if (num.indexOf('.') > 0) {
            var parts = num.toString().split('.');
            parts[0].length;
            if (parts[0].length > 12) {
                num = parts[0].substring(0, 12) + '.' + parts[1];
            }
        } else {
            if (num.length > 12) {
                num = num.substring(0, 12);
            }
        }

        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + ',' +
            num.substring(num.length - (4 * i + 3));
        number.value = (((sign) ? '' : '-') + num + '.' + cents);
    } else {
        alert("Value should not exceed Billion");
        number.value = "0.00";
    }
}

function roundDownWithAlert(number) {

    var amount = number.value.toString().replace(/\$|\,/g, '');

    if (isNaN(Number(amount))) {
        number.value = '0.00';
    } else {
        if (isAmountWithinAllowedPrecision(number)) {
            if (amount.indexOf('.') > -1) {
                var parts = amount.toString().split('.');

                if (parts[1].length === 1) {
                    amount = addCommas(Number(parts[0])) + '.' + parts[1] + '0';

                    number.value = amount;
                } else if (parts[1].length > 1) {
                    amount = addCommas(Number(parts[0])) + '.' + parts[1].substring(0, 2);

                    number.value = amount;
                } else if (parts[1].length == 0) {
                    number.value = addCommas(Number(amount)) + ".00";
                }
            } else {
                number.value = addCommas(Number(amount)) + ".00";
            }
        } else {
            alert("Value should not exceed Billion");
            number.value = "0.00";
            number.focus();
        }
    }
}

function roundDownComputation(val) {

    var amount = val.toString().replace(/\$|\,/g, '');
    var nAmount = '0.00';

    if (isNaN(Number(amount))) {
        nAmount = '0.00';
    } else {

        nAmount = parseFloat((amount * 1).toPrecision(14));
        
        if (nAmount.toString().indexOf('.') > -1) {
            var parts = nAmount.toString().split('.');

            if (parts[1].length === 1) {
                nAmount = addCommas(parts[0] != "-0" ? Number(parts[0]) : '-0') + '.' + parts[1] + '0';
            }
            else if (parts[1].length > 1) {
                nAmount = addCommas(parts[0] != "-0" ? Number(parts[0]) : '-0') + '.' + parts[1].substring(0, 2);
            }


        } else {
            nAmount = addCommas(Number(nAmount)) + ".00";
        }

    }
    return nAmount;
}

function setApplicableTaxrate(e) {
    if (!$(e).is('[readonly]')) {
        var isNumber = isNumeric(e.value);

        if (($.trim(e.value) === "") || !isNumber) {
            e.value = "0.00";
            e.select();
        } else if ((Number(e.value) < 0) || (Number(e.value) > 999.99)) {

            //alert("Percentage cannot be greater than or equal to 100%");
            e.value = "0.00";
            e.onblur();
            e.select();
        } else {
            var temp = e.value.split('.');
            if (temp.length === 2) {

                if (temp[1].length > 1) {
                    e.value = Number(temp[0]) + '.' + temp[1].substring(0, 2);
                } else if (temp[1].length == 1) {

                    e.value = addCommas(Number(temp[0])) + "." + temp[1] + "0";
                } else if (temp[1].length == 0) {
                    e.value = addCommas(Number(temp[0])) + ".00";
                }
            } else if (temp[0].length > 0 && (temp.length === 1)) {

                e.value = addCommas(Number(temp[0])) + ".00";
            }
        }
    }
}

if (!Date.prototype.toISOString) {
    (function () {

        function pad(number) {
            if (number < 10) {
                return '0' + number;
            }
            return number;
        }

        Date.prototype.toISOString = function () {
            return this.getUTCFullYear() +
                '-' + pad(this.getUTCMonth() + 1) +
                '-' + pad(this.getUTCDate()) +
                'T' + pad(this.getUTCHours()) +
                ':' + pad(this.getUTCMinutes()) +
                ':' + pad(this.getUTCSeconds()) +
                '.' + (this.getUTCMilliseconds() / 1000).toFixed(3).slice(2, 5) +
                'Z';
        };

    } ());
}
