$(function () {

    var CountDownWidget = {
        selector: '.count-down-widget',
        textSelector: '.alert-text',
        init: function () {
            $.ajax({
                url: "/countdowns/active",
                success: function (result) {
                    // PARSE RESULT
                    let data = result.data;
                    if (data.length) {
                        CountDownWidget.startTimer(data[0])
                    }
                }
            });
        },
        startTimer: function (data) {

            // Set the date we're counting down to
            // var countDownDate = new Date(data.endDate).getTime();
            var countDownDate = Date.parse(data.endDate);
            let now = new Date().getTime();

            let distance = countDownDate - now;
            if (distance < 0 ){
                return
            }

            // Update the count down every 1 second
            var interval = setInterval(function () {
                // Get today's date and time
                let now = new Date().getTime();
                // Find the distance between now and the count down date
                let distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                let alertTextSelector = $(CountDownWidget.selector + ' ' + CountDownWidget.textSelector);

                // Display the result in the element
                alertTextSelector.html(days + " days " + hours + " hours " + minutes + " mins " + seconds + " seconds ");

                // If the count down is finished, write some text
                if (distance < 0) {
                    window.open(data.url, '_self');
                    alertTextSelector.html('Expired');
                    clearInterval(interval);
                }
                let alertSelector = $(CountDownWidget.selector);

                if (alertSelector.hasClass('hide')) {
                    alertSelector.toggleClass('hide');
                    alertSelector.toggleClass('show');
                }

            }, 1000);
        }
    };

    //
    CountDownWidget.init();
});
