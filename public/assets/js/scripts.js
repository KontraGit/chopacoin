
//  Preloader
jQuery(window).on("load", function () {
    $('#preloader').fadeOut(500);
    $('#main-wrapper').addClass('show');
});


(function ($) {


    //  Header fixed
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.header').addClass("animated slideInDown fixed"), 3000;
        } else {
            $('.header').removeClass("animated slideInDown fixed"), 3000;
        }
    });

    $('select').niceSelect();

    $(function () {
        for (var nk = window.location,
            o = $(".menu a").filter(function () {
                return this.href == nk;
            })
                .addClass("active")
                .parent()
                .addClass("active"); ;) {
            // console.log(o)
            if (!o.is("li")) break;
            o = o.parent()
                .addClass("show")
                .parent()
                .addClass("active");
        }

    });

    $(function () {
        // var win_w = window.outerWidth;
        var win_h = window.outerHeight;
        var win_h = window.outerHeight;
        if (win_h > 0 ? win_h : screen.height) {
            $(".content-body").css("min-height", (win_h + 60) + "px");
        };
    });


})(jQuery);;




document.getElementById("copyAddress").addEventListener("click", function () {
    copyToClipboard(document.getElementById("copyTarget"));
});

function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA" || elem.id === "address";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;
    try {
        succeed = document.execCommand("copy");
        alert('Copied!')
    } catch (e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}


$('#buy-tab').on('click', function () {
    $('#buy-preview').removeClass('d-none');
    $('#sell-preview').addClass('d-none');
})

$('#sell-tab').on('click', function () {
    $('#sell-preview').removeClass('d-none');
    $('#buy-preview').addClass('d-none');
})

$('#send-val').on('change', function () {
    var sendVal = $('#send-val').val();
    $('#send-amt').val(toUSD(sendVal));
})

$('#send-amt').on('change', function () {
    var sendAmt = $('#send-amt').val();
    $('#send-val').val(toBTC(sendAmt));
})

$('#buy-val').on('change', function () {
    var buyVal = $('#buy-val').val();
    $('#buy-amt').val(toUSD(buyVal));
})

$('#buy-amt').on('change', function () {
    var buyAmt = $('#buy-amt').val();
    $('#buy-val').val(toBTC(buyAmt));
})

$('#sell-val').on('change', function () {
    var sellVal = $('#sell-val').val();
    $('#sell-amt').val(toUSD(sellVal));
})

$('#sell-amt').on('change', function () {
    var sellAmt = $('#sell-amt').val();
    $('#sell-val').val(toBTC(sellAmt));

})

function toBTC(amount) {
    $.ajax({
        url: "https://blockchain.info/ticker",
        type: 'GET',
        dataType: 'json', // added data type
        success: function (res) {
            val = parseFloat(amount) / parseFloat(res[document.querySelector('meta[name="currency"]').content]['last']);

            $('#send-val').val(val.toFixed(6));
            $('#buy-val').val(val.toFixed(6));
            $('#sell-val').val(val.toFixed(6));
        }
    });
}

function toUSD(value) {
    $.ajax({
        url: "https://blockchain.info/ticker",
        type: 'GET',
        dataType: 'json', // added data type
        success: function (res) {
            val = parseFloat(res[document.querySelector('meta[name="currency"]').content]['last']) * parseFloat(value);

            $('#send-amt').val(val.toFixed(2));
            $('#buy-amt').val(val.toFixed(2));
            $('#sell-amt').val(val.toFixed(2));
        }
    });
}


function isNumberKey(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
            return true;
        } else {
            return false;
        }
    } else {
        if (charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
    }
    return true;
}
