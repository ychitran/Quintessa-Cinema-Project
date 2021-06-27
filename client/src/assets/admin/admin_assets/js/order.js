$(".seatNumber").click(function () {
    var selectedSeats = parseInt($(".seatSelected").length);
    if (selectedSeats == $("#Numseats").val()) {
        if ($(this).hasClass("seatSelected")) {
            var thisName = $(this).attr('value');
            $(this).removeClass("seatSelected");
            $(".seatList." + thisName).remove();
        }
    } else {
        if (!$(this).hasClass("seatDisable")) {
            if ($(this).hasClass("seatSelected")) {
                var thisName = $(this).attr('value');
                $(this).removeClass("seatSelected");
                $(".seatList." + thisName).remove();
            } else {
                $(this).addClass("seatSelected");
                var thisName = $(this).attr('value');
                $(".seatList").append('<span class=' + thisName + '>' + thisName + "&nbsp;," + '</span>');
            }
        }
    }
});


$(".btnClear").click(function () {
    $(".seatSelected").removeClass("seatSelected");
    $(".seatList span").remove();
});

$(".tt").click(function () {
    if ($("#Numseats").val() == 0) {
        alert('Vui lòng chọn số lượng vé');
    } else {
        $('.booking').addClass('tieptuc');
        $('.seatbooking').addClass('showseat');
    }
});



var allseat = [];
$(".order-ticket").click(function () {
    var selectedSeats = parseInt($(".seatSelected").length);
    if ($("#Numseats").val() == selectedSeats) {
        $(".seatSelected").each(function () {
            allseat.push($(this).attr('id'));
        });
        var url = `/ajaxorderticket`;
        var screening_id = $('.screening_id').val();
        var user_id = $('.user_id').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: $('[name="_token"]').val(),
                screeningid: screening_id,
                userid: user_id,
                allseats: allseat,
                price: ticket_price,
                totalprice: tongtv,
            },
            success: function (response) {
                alert("đặt vé thành công");
            }
        })
    } else {
        alert('Vui lòng chọn đủ số lượng vé')
    }
});

var ticket_price = document.getElementById('ticket_price').innerHTML;
var ticket_count = document.getElementsByClassName('ticket_count');
var total_price = document.getElementsByClassName('total_price');
var prices = [65000, 80000, 150000];
var units = document.getElementsByClassName('units-class');
var subs = document.getElementsByClassName('subtotal-class');
var grand = document.getElementById('total');
ticketPrice();
var tongtv = ticketPrice();

function ticketPrice() {
    for (i = 0; i < total_price.length; i++) {
        total_prc = ticket_count[i].value * ticket_price;
        total_price[i].innerHTML = total_prc;
    }
    grand.innerHTML = total_prc;
}