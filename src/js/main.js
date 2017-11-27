$(document).ready(()=>{
    $(".logo").click(()=> {
        console.log('clicked');
        $(".minimal-menu").toggleClass("floating-menu");
        // $(".menu-bar").slideToggle();
    });

    $(".activator").click(function(){
        let dataID = $(this).attr('data-id');
        let msg = $(this).parent();
        let row = $(this).closest('.trow');
        $.ajax({
            url: "activationpanel.php",
            method: "POST",
            data: "id=" + dataID,
            success: function () {
                $(msg).text('Approved !');
                $(row).fadeOut();
            }
        });
    });

    $('#insert_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "students_overview.php",
            method: "POST",
            data: $('#insert_form').serialize(),
            success: function (response) {
                $('#insert_form')[0].reset();
                $('.actions').html(`
                    <h3>Succeded !</h3> 
                    <a class="btn" href="students.php">Back</a>
                `);
            }
        });
    });
});

// Chart JS 
var datatable = {
    labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
    datasets: [
        {
            fillColor: "rgba(255,255,255,0.1)",
            strokeColor: "rgba(0,0,0,0.25)",
            pointColor: "rgba(255,255,255,1)",
            pointStrokeColor: "#FF6B6B",
            data: [135, 185, 225, 385, 275, 215, 265]
        }
    ]
}

var options = {
    scaleFontColor: "rgba(0,0,0,1)",
    scaleLineColor: "rgba(0,0,0,0.1)",
    scaleGridLineColor: "rgba(0,0,0,0.1)",
    scaleShowLabels: false,
    scaleShowHorizontalLines: false,
    bezierCurve: false,
    pointDot: true,
    pointDotRadius: 5,
    pointDotStrokeWidth: 2,
    scaleOverride: true,
    scaleSteps: 6,
    scaleStepWidth: 100,
    responsive: true,
    showTooltips: true,
    tooltipTemplate: "<%= value %> ",
    tooltipFontSize: 16,
    tooltipYPadding: 12,
    tooltipXPadding: 12,
    tooltipCornerRadius: 3,
    tooltipFillColor: "#008080",

    onAnimationComplete: function () {
        var arrSelector = [];
        this.datasets[0].points.forEach(function (point) {
            if (point.label == 'WED') {
                arrSelector.push(point);
            }
        });

        this.showTooltip(arrSelector, true);
    },
    tooltipEvents: []
}
new Chart(stat.getContext("2d")).Line(datatable, options);